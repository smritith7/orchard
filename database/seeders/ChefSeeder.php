<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =User::create([
            'email'=>'chef@email.com',
            'password'=>'123456789' ,
            // 'is_chef'=>true,
            'role_id'=>1

        ]);
        $user->chefInfo()->create([
            "first_name"=>'firstname',
            "last_name"=>'lastname',
            "gender"=>'male',
            "phone_no"=>'9822412345',

            "level"=>'First'
            ]);

    }
}
