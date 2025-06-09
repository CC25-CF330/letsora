<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function getCurrentDate()
    {
        $today = Carbon::now();
        return response()->json([
            'date' => $today->format('m/d/Y'),
            'day' => $today->format('l'),
            'month' => $today->format('F'),
            'year' => $today->format('Y')
        ]);
    }
}
