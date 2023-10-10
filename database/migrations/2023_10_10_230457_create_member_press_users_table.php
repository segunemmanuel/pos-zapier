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
        Schema::create('member_press_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('school')->nullable();
            $table->string('schoolAddress')->nullable();
            $table->string('userAddress')->nullable();
            $table->string('membershipID')->nullable();
            $table->string('enrollment')->nullable();
            $table->string('geolocation')->nullable();
            $table->string('squareFeet')->nullable();
            $table->string('schoolAcres')->nullable();
            $table->string('schoolCountry')->nullable();
            $table->string('level')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_press_users');
    }
};
