<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
  
        // Majors Seeder
        DB::table('majors')->insert([
            [
                'faculty_id' => 1,
                'major_code' => 'CS',
                'major_name' => 'Computer Science',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        // Professors Seeder
        DB::table('professors')->insert([
            [
                'name' => 'Ahmed',
                'university_email' => 'ahmed@university.com',
                'national_id' => '1234567890',
                'password' => Hash::make('professor123'),
                'date_of_birth' => '1970-05-15',
                'gender' => 'Male',
                'faculty_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Staff Seeder
        DB::table('staff')->insert([
            [
                'name' => 'Hassan',
                'university_email' => 'hassan@university.com',
                'national_id' => '2234567890',
                'password' => Hash::make('staff123'),
                'date_of_birth' => '1985-03-25',
                'sex' => 'Male',
                'staff_type' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Undergraduate Students Seeder
        DB::table('ug_students')->insert([
            [
                'name' => 'Omar',
                'university_email' => 'omar@university.com',
                'national_id' => '3234567890',
                'password' => Hash::make('student123'),
                'date_of_birth' => '2000-04-15',
                'sex' => 'Male',
                'section' => 1,
                'status' => 'Active',
                'allowed_credit_hours' => 18,
                'faculty_id' => 1,
                'major_code' => 'CS', // Valid major for faculty_id 1
                'academic_advisor' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
