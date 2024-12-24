<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdmissionApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pass=bcrypt('123');

        DB::statement("INSERT INTO admission_applications (applicant_email, name, national_id, password, date_of_birth, fees_paid, application_type, exam_date, exam_status, created_at, updated_at) 
        VALUES ('samer@gmail.com', 'samer', '63549648', '$pass', '2005-1-1', TRUE, 'CS', '2024-06-15', 'Pending', NOW(), NOW())
    ");
    }
}
