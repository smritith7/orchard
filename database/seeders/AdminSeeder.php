<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'email' => 'admin@gmail.com',
        'full_name'=>"admin",
        'phone_no'=> '986023762',
        'password' => Hash::make('1234567890'),

        ]);
    }
}
