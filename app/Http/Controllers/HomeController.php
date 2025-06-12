<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (homepage) dengan jadwal untuk hari ini.
     */
    public function index()
    {
        $user = Auth::user();
        /** @var \App\Models\User $user */
        
        $userTimezone = $user->timezone ?? config('app.timezone');

        $startOfDay = now($userTimezone)->startOfDay();
        $endOfDay = now($userTimezone)->endOfDay();

        $schedulesToday = Schedule::where('user_id', $user->id)
        ->orderBy('start_time')
        ->get();


        // Kirim jadwal DAN zona waktu pengguna ke view
        return view('homepage', [
            'schedules' => $schedulesToday,
            'userTimezone' => $userTimezone, // <-- TAMBAHKAN INI
        ]);
    }
}