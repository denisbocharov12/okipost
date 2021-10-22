<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'email',
        'status',
        'birthday',
        'regdate',
        'gender',
        'last_ip',
        'IDNP',
        'photo',
        'info',
        'money',
        'blocked',
        'first_name',
        'last_name',
        'phone',
        'address',
        'first_name_en',
        'last_name_en',
        'token',
        'country',
        'city',
        'type',
        'user_id',
        'bonus_code',
        'orgname',
        'orgnumber',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
