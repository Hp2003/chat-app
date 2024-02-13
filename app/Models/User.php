<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_name',
        'profile_img',
        'uuid',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /*
        @search string
        @status array
    */

    public function getFriends($search = null, $status)
    {
        $friends =  $this->hasMany(Friend::class, 'user_id', $this->user_id)->whereIn('status', $status)->get();
        $friends = Arr::pluck($friends, ['friend_id']);

        $friends = $this->whereIn('id', $friends)->when($search, function($query, $search){
            $query->where(DB::raw('LOWER(user_name)'), 'like', '%' . trim(strtolower($search)) . '%');
        });

        return $friends;
    }

    public function getFriendInstance()
    {
        return $this->hasOne(Friend::class, 'friend_id', $this->user_id)->where('user_id', auth()->user()->id);
    }
}
