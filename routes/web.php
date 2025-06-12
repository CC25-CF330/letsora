<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

//Api
use App\Http\Controllers\PredictionController;

Route::middleware(['auth'])->post('/predict', [PredictionController::class, 'predictFromUser']);


Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // 1. RUTE BARU: Tambahkan rute ini untuk diambil oleh fungsi refreshScheduleData() di JS.
    Route::get('/schedule/data', [ScheduleController::class, 'getData'])->name('schedule.data');

    // 2. Gunakan Route::resource untuk rute lainnya agar lebih rapi.
    Route::resource('schedule', ScheduleController::class)->except([
        'create', 'edit'
    ]);
});

require __DIR__ . '/auth.php';