<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleResource;
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
        $user = Auth::user();
        /** @var \App\Models\User $user */

        $this->prepareTimezonesForValidation($request, $user->timezone);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'location' => 'nullable|string|max:255',
            'instructor' => 'nullable|string|max:255',
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
        // Authorize that the user can view this schedule
        $this->authorize('view', $schedule);

        return response()->json($schedule);
    }
    
    public function update(Request $request, Schedule $schedule)
    {
        if ($schedule->user_id !== Auth::id()) {
            abort(403, 'This action is unauthorized.');
        }

        $user = Auth::user();
        /** @var \App\Models\User $user */
        
        $this->prepareTimezonesForValidation($request, $user->timezone);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'start_time' => 'sometimes|required|date',
            'end_time' => 'sometimes|required|date|after_or_equal:start_time',
            'location' => 'sometimes|nullable|string|max:255',
            'instructor' => 'sometimes|nullable|string|max:255',
            'type' => 'sometimes|required|in:class,meeting,personal'
        ]);

        if (isset($validated['type'])) {
            $validated['type'] = strtolower($validated['type']);
        }

        $schedule->update($validated);

        return new ScheduleResource($schedule);
    }
    
    protected function prepareTimezonesForValidation(Request $request, ?string $timezone)
    {
        if ($timezone) {
            if ($request->filled('start_time')) {
                $request->merge(['start_time' => Carbon::parse($request->start_time, $timezone)->utc()]);
            }
            if ($request->filled('end_time')) {
                $request->merge(['end_time' => Carbon::parse($request->end_time, $timezone)->utc()]);
            }
        }
    }
    
    public function show(Schedule $schedule)
    {
        if ($schedule->user_id !== Auth::id()) abort(403);
        return new ScheduleResource($schedule);
    }

    public function destroy(Schedule $schedule)
    {
        if ($schedule->user_id !== Auth::id()) abort(403);
        $schedule->delete();
        return response()->json(['message' => 'Schedule deleted successfully']);
    }
}