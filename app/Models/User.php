<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Atribut yang boleh diisi massal.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'gender_encoded',
        'attendance_percentage',
        'mental_health_rating',
        'exam_score',
        'profile_photo', // Tambahan penting
    ];

    /**
     * Atribut yang disembunyikan saat serialisasi.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atribut yang akan dikonversi secara otomatis.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi satu user memiliki banyak jadwal.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
