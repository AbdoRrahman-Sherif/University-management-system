<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PgStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $studentName = 'ahmed';
         $studentId = DB::selectOne('SELECT IFNULL(MAX(id), 0) + 1 as id FROM combined_users')->id;
         $email = strtolower($studentName) . '.' . $studentId . '@ejust.edu.eg';
         $password = bcrypt('123');
 
         DB::statement("
             INSERT INTO pg_students (id, name, university_email, national_id, password, date_of_birth, gender, status, section, graduate_program, is_TA, allowed_credit_hours, faculty_id, major_code, created_at, updated_at)
             VALUES ($studentId, '$studentName', '$email', '112233445', '$password', '1999-1-1', 'Male', 'Active', 1, 'Master', true, 18, 1, 'CS', NOW(), NOW())
         ");
    }
}
