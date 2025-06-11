<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ScheduleController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $schedules = Schedule::where('user_id', Auth::id())
            ->orderBy('start_time')
            ->get();

        return view('schedule', compact('schedules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'type' => 'required|in:class,meeting,personal'
        ]);

        $schedule = Schedule::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'start_time' => Carbon::parse($validated['start_time']),
            'end_time' => Carbon::parse($validated['end_time']),
            'location' => $validated['location'],
            'instructor' => $validated['instructor'],
            'type' => $validated['type']
        ]);

        return response()->json([
            'message' => 'Schedule created successfully',
            'schedule' => $schedule
        ]);
    }

    public function show(Schedule $schedule)
    {
        $this->authorize('view', $schedule);

        return response()->json($schedule);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $this->authorize('update', $schedule);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'type' => 'required|in:class,meeting,personal'
        ]);

        $schedule->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'start_time' => Carbon::parse($validated['start_time']),
            'end_time' => Carbon::parse($validated['end_time']),
            'location' => $validated['location'],
            'instructor' => $validated['instructor'],
            'type' => $validated['type']
        ]);

        return response()->json([
            'message' => 'Schedule updated successfully',
            'schedule' => $schedule
        ]);
    }

    public function destroy(Schedule $schedule)
    {
        $this->authorize('delete', $schedule);

        $schedule->delete();

        return response()->json([
            'message' => 'Schedule deleted successfully'
        ]);
    }
}

//