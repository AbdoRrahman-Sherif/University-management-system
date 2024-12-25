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
        DB::statement("CREATE TABLE Courses (
                    CourseCode VARCHAR(7) PRIMARY KEY NOT NULL,
                    CourseName VARCHAR(50) NOT NULL,
                    CreditHours INT NOT NULL CHECK (CreditHours BETWEEN 1 AND 5),
                    CourseStatus ENUM('accepting registrations', 'closed registrations', 'suspended', 'under review') NOT NULL DEFAULT 'under review'
                );
            ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Courses');
    }
};
