<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin account
        User::updateOrCreate(
            [
                'email' => 'admin@cibedug1.test',
            ],
            [
                'name' => 'admin',
                'password' => Hash::make('123'),
                'is_admin' => true,
            ]
        );

        // Create a user account for every student using NIS as username & password
        $students = Student::whereNull('user_id')->get();

        foreach ($students as $student) {
            $user = User::updateOrCreate(
                [
                    'email' => $student->nis.'@student.cibedug1.test',
                ],
                [
                    'name' => $student->name,
                    'password' => Hash::make($student->nis),
                    'is_admin' => false,
                ]
            );

            $student->update(['user_id' => $user->id]);
        }
    }
}
