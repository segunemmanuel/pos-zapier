<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('member_press_course_completed_users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->string('nicename')->nullable();
            $table->timestamp('registered_at')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('display_name')->nullable();
            // Define a JSON column for the 'course' field
            $table->json('courseData')->nullable();
            $table->integer('courseId')->nullable();
            $table->string('courseName')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('registrationDate')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_press_course_completed_users');
    }
};
