<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staffName = 'ahmed';
        
        $staffId = DB::selectOne('SELECT IFNULL(MAX(id), 0) + 1 as id FROM combined_users')->id;
        
        
        $email = strtolower($staffName) . '.' . $staffId . '@ejust.edu.eg';
        $password = bcrypt('123');
        
        DB::statement("INSERT INTO staff (id, name, university_email, national_id, password, date_of_birth, sex, staff_type, created_at, updated_at) 
            VALUES ($staffId, '$staffName', '$email', '123456789', '$password', '1980-01-01', 'Male', 'Admin', NOW(), NOW())
        ");
    }
}
