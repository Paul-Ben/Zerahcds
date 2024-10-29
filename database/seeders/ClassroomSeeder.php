<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classrooms')->insert([
            [
                'name' => 'IT Support Professional',
            ],
            [
                'name' => 'Graphics Design(UI/UX)',
            ],
            [
                'name' => 'Data Analytics',
            ],
            [
                'name' => 'Digital Marketing and E-Commerce',
            ]
        ]);
    }
}
