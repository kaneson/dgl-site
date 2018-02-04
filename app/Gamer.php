<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Gamer extends Authenticatable
{
    //
    use Notifiable;

    protected $table = 'gamers';
    protected $fillable = [
        'email', 'password', 'alias', 'fname', 'lname', 'dob',
        'steamid', 'battlenetid', 'discordid',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}