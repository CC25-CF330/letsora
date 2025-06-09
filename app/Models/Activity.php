<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'task_count',
        'completed_tasks'
    ];

    protected $casts = [
        'date' => 'date',
        'task_count' => 'integer',
        'completed_tasks' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
