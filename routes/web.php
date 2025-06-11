<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/schedule/data', [ScheduleController::class, 'getData'])->name('schedule.data');

    Route::resource('schedule', ScheduleController::class)->except([
        'create', 'edit'
    ]);
    
    Route::patch('/schedule/{schedule}/complete', [ScheduleController::class, 'markAsCompleted'])->name('schedule.complete');
        
    Route::get('/report', function () {
        return view('report');
    })->name('report');
});

require __DIR__ . '/auth.php';