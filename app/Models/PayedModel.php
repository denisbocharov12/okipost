<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayedModel extends Model
{
    use HasFactory;
    protected $fillable = ['code','track','currency','needed_sum','payed'];
    public function user(){
        return $this->hasOne(User::class, 'code', 'code');
    }
}
