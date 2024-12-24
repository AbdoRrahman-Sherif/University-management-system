<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UgStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentName = 'mohamed';
        $studentId = DB::selectOne('SELECT IFNULL(MAX(id), 0) + 1 as id FROM combined_users')->id;
        $email = strtolower($studentName) . '.' . $studentId . '@ejust.edu.eg';
        $password = bcrypt('123');


        DB::statement("
            INSERT INTO ug_students (id, name, university_email, national_id, password, date_of_birth, sex, section, status, allowed_credit_hours, faculty_id, major_code, academic_advisor, created_at, updated_at)
            VALUES ($studentId, '$studentName', '$email', '987654321', '$password', '2000-05-10', 'Male', 1, 'Active', 20, 1, 'CNC', 2, NOW(), NOW())
        ");
    }
}
