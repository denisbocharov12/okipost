<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoServices extends Model
{
    use HasFactory;
    protected $fillable = ['fio','phone','email','comment','service'];
}
