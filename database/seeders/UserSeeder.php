<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Superadmin',
                'email'=>'Superadmin@gmail.com',
                'role'=>'superadmin',
                'password'=>bcrypt('superadmin123'),
                'is_active' => true,
            ],
            [
                'name'=>'Admin',
                'email'=>'Admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('admin123'),
                'is_active' => true,
            ],
            [
                'name'=>'Agent',
                'email'=>'Agent@gmail.com',
                'role'=>'agent',
                'password'=>bcrypt('agent123'),
                'is_active' => true,
            ],
            [
                'name'=>'Client',
                'email'=>'Client@gmail.com',
                'role'=>'client',
                'password'=>bcrypt('client123'),
                'is_active' => true,
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}


