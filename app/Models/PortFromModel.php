<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortFromModel extends Model
{
    use HasFactory;
    protected $fillable = ['short_name_of_port', 'name_of_port'];
}
