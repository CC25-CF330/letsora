<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Schedule;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil pengguna pertama sebagai pemilik jadwal, atau buat jika tidak ada.
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Contoh User',
                'email' => 'user@example.com',
            ]);
        }

        // Hapus jadwal lama milik user ini untuk menghindari duplikasi
        Schedule::where('user_id', $user->id)->delete();

        // Data jadwal contoh
        $schedules = [
            // --- Jadwal untuk Hari Ini ---
            [
                'title' => 'Rapat Tim Mingguan',
                'description' => 'Membahas progres proyek sprint ini.',
                'start_time' => today($user->timezone)->setHour(9),
                'end_time' => today($user->timezone)->setHour(10)->setMinutes(30),
                'location' => 'Ruang Rapat A',
                'instructor' => 'Manajer Proyek',
                'type' => 'meeting',
            ],
            [
                'title' => 'Kelas Pemrograman Web Lanjutan',
                'description' => 'Materi tentang Laravel dan Vue.js.',
                'start_time' => today($user->timezone)->setHour(13),
                'end_time' => today($user->timezone)->setHour(15),
                'location' => 'Lab Komputer 3',
                'instructor' => 'Pak Budi',
                'type' => 'class',
            ],
            // --- Jadwal untuk Besok ---
            [
                'title' => 'Waktunya Olahraga',
                'description' => 'Jogging di taman kota.',
                'start_time' => today($user->timezone)->addDay()->setHour(16),
                'end_time' => today($user->timezone)->addDay()->setHour(17),
                'location' => 'Taman Kota',
                'instructor' => 'Diri Sendiri',
                'type' => 'personal',
            ],
            // --- Jadwal untuk Kemarin ---
            [
                'title' => 'Presentasi Klien',
                'description' => 'Demo fitur baru kepada klien X.',
                'start_time' => today($user->timezone)->subDay()->setHour(10),
                'end_time' => today($user->timezone)->subDay()->setHour(11),
                'location' => 'Kantor Klien X',
                'instructor' => 'Tim Sales',
                'type' => 'meeting',
            ],
        ];

        // Masukkan data ke database
        foreach ($schedules as $scheduleData) {
            $scheduleData['user_id'] = $user->id; // Pastikan user_id terisi
            Schedule::create($scheduleData);
        }
    }
}