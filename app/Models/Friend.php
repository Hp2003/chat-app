<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'friend_id',
        'status',
    ];

    public function getUser()
    {
        return User::where('id', $this->friend_id);
    }

}
