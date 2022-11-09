<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => '281099',
            'name' => 'superadmin',
            'email' => 'saptarino.ti@gmail.com',
            'email_verified_at' => date('y-m-d'),
            'password' => Hash::make('superadmin'),
            'level' => 'superadmin',
        ]);
        User::create([
            'username' => '2022001',
            'name' => 'hurin hanifa',
            'email' => 'hurin.hanifa@gmail.com',
            'email_verified_at' => date('y-m-d'),
            'password' => Hash::make('laboran123'),
            'level' => 'laboran',
        ]);
        User::create([
            'username' => '111111',
            'name' => 'administrator',
            'email' => 'adminemodul@gmail.com',
            'email_verified_at' => date('y-m-d'),
            'password' => Hash::make('admin123'),
            'level' => 'admin',
        ]);
    }
}
