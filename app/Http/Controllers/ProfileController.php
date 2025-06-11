<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

// Catatan: Jika Anda tidak menggunakan Inertia, 
// beberapa 'use' statement di atas mungkin berbeda. 
// Fokus pada logika di dalam method.

class ProfileController extends Controller
{
    /**
     * Method BARU: Menampilkan halaman pengaturan.
     */
    public function settings(Request $request)
    {
        return view('settings', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Menampilkan form edit profil (ini method bawaan Breeze, kita biarkan saja).
     */
    public function edit(Request $request)//: Response
    {
        // Kode ini mungkin berbeda jika Anda tidak pakai Inertia.
        // Anda bisa mengarahkannya ke halaman settings jika mau.
        return view('profile.edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Memperbarui informasi profil pengguna.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Ambil data yang sudah divalidasi dari ProfileUpdateRequest
        $validatedData = $request->validated();
        
        // TAMBAHKAN VALIDASI UNTUK TIMEZONE
        $validatedData = array_merge($validatedData, $request->validate([
            'timezone' => ['nullable', 'string', 'timezone:all'],
        ]));

        // Isi data user dengan data yang sudah divalidasi
        $request->user()->fill($validatedData);

        // Reset verifikasi email jika email diubah
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Simpan semua perubahan
        $request->user()->save();

        return Redirect::route('settings')->with('status', 'profile-updated');
    }

    /**
     * Menghapus akun pengguna.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
