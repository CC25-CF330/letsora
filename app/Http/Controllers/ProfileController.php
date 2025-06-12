<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman pengaturan.
     */
    public function settings(Request $request)
    {
        return view('settings', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Menampilkan form edit profil (jika menggunakan Inertia).
     */
    public function edit(Request $request)
    {
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

        // Tambahkan validasi tambahan untuk timezone, data diri, dan foto profil
        $validatedData = array_merge($validatedData, $request->validate([
            'timezone' => ['nullable', 'string', 'timezone:all'],
            'age' => ['nullable', 'integer', 'min:17', 'max:30'],
            'gender_encoded' => ['nullable', 'in:0,1'],
            'attendance_percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'mental_health_rating' => ['nullable', 'numeric', 'min:1', 'max:10'],
            'exam_score' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'profile_photo' => ['nullable', 'image', 'max:2048'],
        ]));

        if ($request->hasFile('profile_photo')) {
        $file = $request->file('profile_photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('profile_photos', $filename, 'public');

        // Tambahkan path ke data yang akan di-fill
        $validatedData['profile_photo'] = $path;
        }




        // Update atribut user
        $request->user()->fill($validatedData);

        // Reset verifikasi email jika email berubah
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Simpan ke database
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
