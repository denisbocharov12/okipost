<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientToModel extends Model
{
    use HasFactory;
    protected $fillable = ['country','name','short_name'];
}
