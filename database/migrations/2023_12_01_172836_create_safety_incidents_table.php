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
        Schema::create('safety_incidents', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('incident_type')->nullable();
            $table->date('occurred_on')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('casualities')->nullable();
            $table->string('description')->nullable();
            $table->json('misc')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safety_incidents');
    }
};
