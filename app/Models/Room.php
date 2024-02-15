<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'room_img',
        'is_admin',
        'user_id',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];
}
