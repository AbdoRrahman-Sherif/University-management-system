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
        DB::statement("CREATE TABLE ProfessorsTeachesCourses (
            ProfessorID BIGINT UNSIGNED NOT NULL,
            CourseCode VARCHAR(7) NOT NULL,
            PRIMARY KEY (ProfessorID, CourseCode),
            FOREIGN KEY (ProfessorID) REFERENCES professors(id) ON DELETE CASCADE,
            FOREIGN KEY (CourseCode) REFERENCES Courses(CourseCode) ON DELETE CASCADE
        );");
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ProfessorsTeachesCourses');
    }
};
