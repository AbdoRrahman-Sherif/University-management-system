<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professorName = 'mahmoud';
        $professorId = DB::selectOne('SELECT IFNULL(MAX(id), 0) + 1 as id FROM combined_users')->id;
        $email = strtolower($professorName) . '.' . $professorId . '@ejust.edu.eg';
        $password = bcrypt('123');

        DB::statement("
            INSERT INTO professors (id, name, university_email, national_id, password, date_of_birth, gender, faculty_id, created_at, updated_at)
            VALUES ($professorId, '$professorName', '$email', '223344556', '$password', '1975-1-1', 'Male', 1, NOW(), NOW())
        ");
    }
}
