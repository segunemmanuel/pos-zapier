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
        Schema::create('member_press_quiz_completed_records', function (Blueprint $table) {
                $table->id();
                $table->integer('quizId')->nullable();
                $table->integer('courseId')->nullable();
                $table->string('quizName')->nullable();
                $table->string('courseName')->nullable();
                $table->string('quizScore')->nullable();
                $table->string('totalScorePossible')->nullable();
                $table->string('username')->nullable();
                $table->string('lastName')->nullable();
                $table->string('firstName')->nullable();
                $table->string('email')->nullable();
                $table->dateTime('completedDate')->nullable();
                $table->string('completionStatus')->nullable();
                $table->dateTime('startDate')->nullable();
                $table->integer('quizAttemptId')->nullable();
                $table->json('miscData')->nullable();
                $table->integer('quizPointsScored')->nullable();
                $table->integer('quizPointsPossible')->nullable();
                $table->string('fullname')->nullable();
                $table->integer('user_id')->nullable();
                $table->timestamps();

            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_press_quiz_completed_records');
    }
};
