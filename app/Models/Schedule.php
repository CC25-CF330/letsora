<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'start_time',
        'end_time',
        'location',
        'instructor',
        'type',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    /**
     * Get the user that owns the schedule.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function color(): Attribute
    {
        return Attribute::make(
            get: fn () => match ($this->type) {
                'class' => '#4F46E5',    // Biru/Indigo untuk Kelas
                'meeting' => '#F59E0B',  // Oranye/Kuning untuk Rapat
                'personal' => '#10B981', // Hijau untuk Pribadi
                default => '#6B7280',     // Abu-abu sebagai default
            },
        );
    }
}