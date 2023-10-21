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
        Schema::create('p_d_f_records', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('filename')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrat   ions.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_d_f_records');
    }
};
