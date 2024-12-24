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
        $this->call(FacultySeeder::class);
        $this->call(MajorSeeder::class);
        

        $this->call(StaffSeeder::class);
        $this->call(ProfessorSeeder::class);
        $this->call(UgStudentSeeder::class);
        $this->call(PgStudentSeeder::class);

        $this->call(AdmissionApplicationSeeder::class);


    }
}
