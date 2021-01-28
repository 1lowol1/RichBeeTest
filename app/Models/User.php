<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
      'userName', 'email', 'password'
    ];

    protected $hidden = [
      'password', 'remember_token'
    ];

    // protected $casts = [
    //
    // ];
    public function orders() {
      return $this->hasMany('App\Models\Order', 'userId');
    }
    public function setPasswordAttribute ($password) {
      $this->attributes['password'] = Hash::make($password);
    }
}
