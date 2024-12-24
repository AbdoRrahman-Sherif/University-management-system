<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE TABLE pg_students (
            id BIGINT UNSIGNED PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            university_email VARCHAR(255) NOT NULL UNIQUE,
            national_id VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            date_of_birth DATE NOT NULL,
            gender VARCHAR(255) NOT NULL,
            status VARCHAR(255) NOT NULL,
            section INT NOT NULL,
            graduate_program VARCHAR(255) NOT NULL,
            is_TA BOOLEAN NOT NULL,
            allowed_credit_hours INT NOT NULL,
            faculty_id BIGINT UNSIGNED NOT NULL,
            major_code VARCHAR(255) NOT NULL,
            created_at TIMESTAMP NULL DEFAULT NULL,
            updated_at TIMESTAMP NULL DEFAULT NULL,
            FOREIGN KEY (faculty_id, major_code) REFERENCES majors(faculty_id, major_code)
        );
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pg_students');
    }
};
