<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PackageModel extends Model
{
    use HasFactory;
    protected $fillable = [
        '',
    ];
    protected $table = 'package_models';
}
