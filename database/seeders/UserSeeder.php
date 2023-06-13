<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'Super Admin',
            'username' => 'Super_Admin',
            'email' => 'admin@finalproject.com',
            'role' => User::ROLE_ADMIN,
            'password' => Hash::make(123456789),
            'email_verified_at' => now(),
            'remember_token' => '1234567890',
        ]);
        User::insert([
            'name' => 'Template User 1',
            'username' => 'tempuser01',
            'email' => 'tempuser01@finalproject.com',
            'role' => User::ROLE_USER,
            'level' => 'N5',
            'point' => 0,
            'password' => Hash::make(123456789),
            'email_verified_at' => now(),
            'remember_token' => '1234567890',
        ]);
        User::insert([
            'name' => 'Template User 2',
            'username' => 'tempuser02',
            'email' => 'tempuser02@finalproject.com',
            'role' => User::ROLE_USER,
            'level' => 'N2',
            'point' => 7000,
            'password' => Hash::make(123456789),
            'email_verified_at' => now(),
            'remember_token' => '1234567890',
        ]);
        User::insert([
            'name' => 'Template User 3',
            'username' => 'tempuser03',
            'email' => 'tempuser03@finalproject.com',
            'role' => User::ROLE_USER,
            'level' => 'N3',
            'point' => 4000,
            'password' => Hash::make(123456789),
            'email_verified_at' => now(),
            'remember_token' => '1234567890',
        ]);
        User::insert([
            'name' => 'Template User 4',
            'username' => 'tempuser04',
            'email' => 'tempuser04@finalproject.com',
            'role' => User::ROLE_USER,
            'level' => 'N4',
            'point' => 2000,
            'password' => Hash::make(123456789),
            'email_verified_at' => now(),
            'remember_token' => '1234567890',
        ]);
        User::insert([
            'name' => 'Template User 5',
            'username' => 'tempuser05',
            'email' => 'tempuser05@finalproject.com',
            'role' => User::ROLE_USER,
            'level' => 'N5',
            'point' => 1000,
            'password' => Hash::make(123456789),
            'email_verified_at' => now(),
            'remember_token' => '1234567890',
        ]);
    }
}
