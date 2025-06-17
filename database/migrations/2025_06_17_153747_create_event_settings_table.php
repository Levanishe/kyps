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
        Schema::create('event_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_halloween_enabled')->default(false);
            $table->date('halloween_start_date')->nullable(); // Дата начала Хэллоуина
            $table->date('halloween_end_date')->nullable();   // Дата окончания Хэллоуина
            $table->boolean('is_snow_enabled')->default(false);
            $table->date('snow_start_date')->nullable();      // Дата начала снега
            $table->date('snow_end_date')->nullable();        // Дата окончания снега
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_settings');
    }
};