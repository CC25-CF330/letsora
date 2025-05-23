<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Schedule Routes
    Route::get('/schedule', function () {
        return view('schedule');
    })->name('schedule');

    // Chatbot Routes
    Route::get('/chatbot', function () {
        return view('chatbot');
    })->name('chatbot');

    // Settings Routes
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');
});

require __DIR__ . '/auth.php';
