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
        CREATE TABLE pg_student_thesis_supervisor (
            faculty_id BIGINT UNSIGNED NOT NULL,
            professor_id BIGINT UNSIGNED NOT NULL,
            PRIMARY KEY (faculty_id, professor_id),
            FOREIGN KEY (faculty_id) REFERENCES faculties(id) ON DELETE CASCADE,
            FOREIGN KEY (professor_id) REFERENCES professors(id) ON DELETE CASCADE
        );
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pg_student_thesis_supervisor');
    }
};
