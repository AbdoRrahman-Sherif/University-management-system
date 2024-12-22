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
        CREATE TABLE faculties (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            faculty_name VARCHAR(255) NOT NULL,
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
        Schema::dropIfExists('faculties');
    }
};
