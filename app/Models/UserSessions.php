<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSessions extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'login',
        'status',
        'dob',
        'regdate',
        'gender',
        'last_ip',
        'number',
        'photo',
        'info',
        'bonuses',
        'blocked',
        'name',
        'surname',
        'mobile',
        'fname',
        'adress',
        'name_en',
        'surname_en',
        'token',
        'country',
        'city',
        'userid',
        'bonus_code',
        'orgname',
        'orgnumber',
    ];
}
