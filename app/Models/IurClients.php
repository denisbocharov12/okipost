<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IurClients extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'address',
        'company_person',
        'service_id',
        'name',
        'IDNO',
        'contracts',
        'email',
        'phone',
        'requisit_address',
        'requisit_IDNO',
        'requisit_nds',
        'requisit_IBAN',
        'requisit_BANK',
        'requisit_CODE'
    ];
    public function service(){
        return $this->hasOne(IurServices::class, 'id', 'service_id');
    }
}
