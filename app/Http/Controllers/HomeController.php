<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
// use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        // Get today's schedules
        $schedules = Schedule::where('user_id', auth()->id())
            ->whereDate('start_time', Carbon::today())
            ->orderBy('start_time')
            ->get();

        // Get weekly activities
        // $activities = Activity::where('user_id', auth()->id())
        //     ->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        //     ->get()
        //     ->groupBy(function ($activity) {
        //         return Carbon::parse($activity->date)->format('l');
        //     });

        return view('homepage', compact('schedules'));
    }
}
