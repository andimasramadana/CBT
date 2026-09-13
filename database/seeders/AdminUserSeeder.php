<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@cibedug1.test',
            ],
            [
                'name' => 'admin',
                'password' => Hash::make('admin'),
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            [
                'email' => 'dimas@cibedug1.test',
            ],
            [
                'name' => 'dimas',
                'password' => Hash::make('123'),
                'is_admin' => false,
            ]
        );
    }
}
