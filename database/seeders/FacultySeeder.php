<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("INSERT INTO faculties (id, faculty_name, created_at, updated_at) 
        VALUES (1, 'Computer Science', NOW(), NOW()), 
               (2, 'Engineering', NOW(), NOW())
    ");
    }
}
