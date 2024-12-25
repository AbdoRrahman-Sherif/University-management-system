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
        DB::statement("CREATE TABLE FacultyCourses (
        FacultyID BIGINT UNSIGNED NOT NULL,
        CourseCode VARCHAR(7) NOT NULL,
        PRIMARY KEY (FacultyID, CourseCode),
        FOREIGN KEY (FacultyID) REFERENCES faculties(id) ON DELETE CASCADE,
        FOREIGN KEY (CourseCode) REFERENCES Courses(CourseCode) ON DELETE CASCADE
    );
");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FacultyCourses');
    }
};
