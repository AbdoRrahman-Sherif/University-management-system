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
        DB::statement("
        CREATE TABLE ug_students (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            university_email VARCHAR(255) NOT NULL UNIQUE,
            national_id VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            date_of_birth DATE NOT NULL,
            sex VARCHAR(255) NOT NULL,
            section INT NOT NULL,
            status VARCHAR(255) NOT NULL,
            allowed_credit_hours INT NOT NULL,
            faculty_id BIGINT UNSIGNED NOT NULL,
            major_code VARCHAR(255) NOT NULL,
            academic_advisor BIGINT UNSIGNED NOT NULL,
            created_at TIMESTAMP NULL DEFAULT NULL,
            updated_at TIMESTAMP NULL DEFAULT NULL,
            FOREIGN KEY (faculty_id, major_code) REFERENCES majors(faculty_id, major_code),
            FOREIGN KEY (academic_advisor) REFERENCES professors(id)
        );
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ug_students');
    }
};
