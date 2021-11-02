<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresses extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'city',
        'address',
        'name',
        'surname',
        'phone',
        'passport'
    ];
}
