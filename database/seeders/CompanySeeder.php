<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iur_clients')->insert([
            [
                'name'=>'BeYond Solutions',
                'type'=>'SRL',
                'company_person' => 'Denis Bocearov',
                'address'=>'Ленина 204А,Комрат, Гагаузия',
                'IDNO'=>'1312312312321321',
                'requisit_address'=>'Молдова, Ленина 204А,Комрат, Гагаузия',
                'requisit_IDNO'=>'1312312312321321',
                'requisit_nds'=>'23423',
                'requisit_IBAN'=>'12065',
                'requisit_BANK'=>'MAIB',
                'requisit_CODE'=>'2054',
                'email'=>'email@email.com',
                'phone'=>'37360060232',
                'service_id'=>'1',
                'status'=>'active'
            ],
            [
                'name'=>'OKIPOST Company',
                'type'=>'II',
                'company_person' => 'Denis Bocearov',
                'address'=>'Победа 23,Комрат, Гагаузия',
                'IDNO'=>'567567565634',
                'requisit_address'=>'Молдова, Победа 23,Комрат, Гагаузия',
                'requisit_IDNO'=>'34543634',
                'requisit_nds'=>'8967',
                'requisit_IBAN'=>'67867',
                'requisit_BANK'=>'MAIB',
                'requisit_CODE'=>'2234',
                'email'=>'email@email.com',
                'phone'=>'37377777776',
                'service_id'=>'2',
                'status'=>'active'
            ],
            [
                'name'=>'CTLC Company',
                'type'=>'SRL',
                'company_person' => 'Denis Bocearov',
                'address'=>'Котовского 57,Комрат, Гагаузия',
                'IDNO'=>'123121111111',
                'requisit_address'=>'Молдова, Котовского 57,Комрат, Гагаузия',
                'requisit_IDNO'=>'878787',
                'requisit_nds'=>'4345',
                'requisit_IBAN'=>'2344444',
                'requisit_BANK'=>'Moldincombank',
                'requisit_CODE'=>'10542',
                'email'=>'email@email.com',
                'phone'=>'37377564676',
                'service_id'=>'2',
                'status'=>'active'
            ]
        ]);
        DB::table('iur_services')->insert([
            [
                'service_name'=>'Транспортировка груза',
                'status'=>'active'
            ],
            [
                'service_name'=>'Консолидация',
                'status'=>'active'
            ],
        ]);
    }
}
