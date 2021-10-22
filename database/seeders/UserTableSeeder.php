<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'first_name'=>'VITA',
                'last_name'=>'VLAH',
                'phone'=>'+37360060232',
                'country'=>'Moldova',
                'city'=>'Comrat',
                'email'=>'admin@example.com',
                'password'=>Hash::make('admin'),
                'status'=>'active'
            ]
        ]);
        DB::table('users')->insert([
            [
                'code' => '111572',
                'email'=>'denisbocharov12@gmail.com',
                'status'=>'active',
                'birthday' => '13.11.2000',
                'regdate' => '03.08.2021',
                'gender' => 'male',
                'last_ip' => '192.168.0.1',
                'photo' => '',
                'info' => 'I am a test user from Moldova',
                'money' => 0.00,
                'blocked' => 0.00,
                'first_name'=>'Bocearov',
                'last_name'=>'Denis',
                'phone'=>'+37377777777',
                'address'=>'Comrat, Cotovsckogo 46/2',
                'first_name_en'=>'Bocearov',
                'last_name_en'=>'Denis',
                'token'=>'',
                'country'=>'Moldova',
                'city'=>'Comrat',
                'type'=>'fizical',
                'user_id'=>'OKI2224444',
                'bonus_code'=>'DENIS01',
                'orgname'=>'',
                'orgmobile'=>'',
                'password'=>Hash::make('YIP3b9F1WM'),
            ],
            [
                'code' => '111672',
                'email'=>'services@okipost.md',
                'status'=>'active',
                'birthday' => '13.11.2000',
                'regdate' => '03.08.2021',
                'gender' => 'male',
                'last_ip' => '192.168.0.1',
                'photo' => '',
                'info' => 'I am a test user from Moldova',
                'money' => 0.00,
                'blocked' => 0.00,
                'first_name'=>'RunPay',
                'last_name'=>'Check',
                'phone'=>'37360060232',
                'address'=>'Comrat, Cotovsckogo 46/2',
                'first_name_en'=>'RunPay',
                'last_name_en'=>'Check',
                'token'=>'',
                'country'=>'Moldova',
                'city'=>'Comrat',
                'type'=>'fizical',
                'user_id'=>'111672',
                'bonus_code'=>'TEST01',
                'orgname'=>'',
                'orgmobile'=>'',
                'password'=>Hash::make('YIP3b9F1WM'),
            ]
        ]);
    }
}
