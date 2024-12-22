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
        CREATE TABLE admission_applications (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            applicant_email VARCHAR(255) NOT NULL UNIQUE,
            name VARCHAR(255) NOT NULL,
            national_id VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            date_of_birth DATE NOT NULL,
            fees_paid BOOLEAN NOT NULL,
            application_type VARCHAR(255) NOT NULL,
            exam_date DATE NOT NULL,
            exam_status VARCHAR(255) NOT NULL,
            created_at TIMESTAMP NULL DEFAULT NULL,
            updated_at TIMESTAMP NULL DEFAULT NULL
        );
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_applications');
    }
};
