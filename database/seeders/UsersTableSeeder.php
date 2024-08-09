<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',

            ],
            [
                'name' => 'John Doe',
                'email' => 'student@example.com',
                'password' => bcrypt('student'),
                'role' => 'student',

            ],
            [
                'name' => 'John Doe',
                'email' => 'teacher@example.com',
                'password' => bcrypt('teacher'),
                'role' => 'teacher',

            ]
        ]);
    }
}
