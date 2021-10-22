<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsOkipost extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['balance_before','balance_after','done','user','value'];
}
