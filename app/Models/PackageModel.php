<?php

namespace App\Models;

use App\Services\UserService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PackageModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'country',
        'track',
        'price',
        'currency',
        'comment',
        'url',
        'type',
        'additional_services',
        'info',
        'details',
        'delivery_method',
        'addressid',
        'address1',
        'name',
        'surname',
        'phone',
        'passport',
        'city',
        'code'
    ];
    protected $table = 'package_models';
    public static function address($code){
        $address = Adresses::where('code',$code)->first();
        return $address;
    }
    public static function payed($track){
        $payed = PayedModel::where('track',$track)->first();
        return $payed;
    }
    public function user(){
        return $this->hasOne(User::class,'code','code');
    }
}
