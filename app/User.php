<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
      return $this->hasOne('App\Profile');
    }

    public function matapilihs(){
        return $this->hasMany('App\Matapilih');
    }

    public function counters(){
        return $this->hasMany('App\Counter');
    }
}
