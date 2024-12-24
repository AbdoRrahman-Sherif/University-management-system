<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("INSERT INTO majors (faculty_id, major_code, major_name, created_at, updated_at) 
        VALUES (1, 'CNC', 'Computer Networks and Cybersecurity', NOW(), NOW()), 
               (1, 'CS', 'Computer Science', NOW(), NOW()), 
               (2, 'EE', 'Electrical Engineering', NOW(), NOW()),
               (2, 'CE', 'Computer Engineering', NOW(), NOW())
    ");
    }
}
