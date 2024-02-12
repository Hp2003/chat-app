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

    /*
     *  @param $uuid string, string (uuid) of user in user table
     *  @return array, array of users friend1 = currnet login user friend2 = the user current user is friend to
     *          in some cases friend1 is requester and friend2 is person getting request
    */
    public static function getFriends($uuid)
    {
        $friend1 = Friend::where('uuid', $uuid)->first();
        $friend2 = Friend::where('friend_id', $friend1->user_id)->where('user_id',$friend1->friend_id )->first();

        return [
            $friend1, $friend2,
        ];
    }

}
