<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Menyediakan data jadwal dalam format JSON, sekarang dengan fungsionalitas pencarian.
     */
    public function getData(Request $request)
    {
        $user = Auth::user();
        /** @var \App\Models\User $user */
        $userTimezone = $user->timezone ?? config('app.timezone');

        $query = Schedule::where('user_id', $user->id);

        // Filter berdasarkan tipe
        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        // Filter berdasarkan tanggal
        if ($request->filled('date') && $request->date !== 'all') {
            switch ($request->date) {
                case 'today':
                    $query->whereDate('start_time', today($userTimezone));
                    break;
                case 'week':
                    $startOfWeek = now($userTimezone)->startOfWeek();
                    $endOfWeek = now($userTimezone)->endOfWeek();
                    $query->whereBetween('start_time', [$startOfWeek, $endOfWeek]);
                    break;
                case 'month':
                    $query->whereMonth('start_time', now($userTimezone)->month)
                          ->whereYear('start_time', now($userTimezone)->year);
                    break;
            }
        }
        
        // PERBAIKAN: Tambahkan logika pencarian
        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';
            // Mencari di beberapa kolom sekaligus
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                  ->orWhere('description', 'like', $searchTerm)
                  ->orWhere('location', 'like', $searchTerm)
                  ->orWhere('instructor', 'like', $searchTerm);
            });
        }

        $schedules = $query->orderBy('start_time')->get();

        return ScheduleResource::collection($schedules);
    }
    
    // ... sisa controller lainnya (tidak perlu diubah) ...
    public function index()
    {
        $schedules = Schedule::where('user_id', Auth::id())->orderBy('start_time')->get();
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
        
        $validated['type'] = strtolower($validated['type']);
        
        $schedule = $user->schedules()->create($validated);

        return new ScheduleResource($schedule);
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