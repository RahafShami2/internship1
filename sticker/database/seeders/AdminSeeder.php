<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::create(
            ['username' =>'admin1', 'first_name'=>'rahaf', 'last_name'=>'shami',
             'region'=> 'Nablus' , 'phone_num'=>'0594597731',
            'id'=>'1' , 'type'=>'Admin','password'=>Hash::make('admincap2022')]);
    }
}

