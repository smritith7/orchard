<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //-- Create a User
        $user = User::Create([
            'email' => 'mamta@admin.com',
            'password' => Hash::make('1234567890'),
            'role_id'=>1
        ]);
        $user->adminInfo()->create([
            "first_name" => 'firstname',
            "last_name" => 'lastname',
            "gender" => 'male',
            "phone_no" => '9822412345',
            "address" => 'kathmandu',
            "nationality" => 'nepali'
        ]);

        $admin = User::Create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@gmail.com'),
            'role_id'=>1,
        ]);
        $admin->adminInfo()->create([
            "first_name" => 'admin',
            "last_name" => 'shrestha',
            "gender" => 'male',
            "phone_no" => '9822412345',
            "address" => 'kathmandu',
            "nationality" => 'nepali'
        ]);





    }
}
