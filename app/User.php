<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * {@inheritDoc}
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
