<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
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
                'phone'=>'+37362100005',
                'country'=>'Moldova',
                'city'=>'Comrat',
                'email'=>'vlah.vita@okipost.md',
                'password'=>Hash::make('34KL@aMN2a'),
                'status'=>'active'
            ],
            [
                'first_name'=>'Marianna',
                'last_name'=>'Pirau',
                'phone'=>'+37379389105',
                'country'=>'Moldova',
                'city'=>'Comrat',
                'email'=>'marianna.pirau@okipost.md',
                'password'=>Hash::make('JWsa!32NN21'),
                'status'=>'active'
            ],
        ]);
    }
}
