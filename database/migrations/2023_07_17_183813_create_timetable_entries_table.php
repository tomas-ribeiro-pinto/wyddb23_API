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
        Schema::create('timetable_entries', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_pt');
            $table->string('title_es');
            $table->string('title_it');
            $table->string('description_en')->nullable();
            $table->string('description_pt')->nullable();
            $table->string('description_es')->nullable();
            $table->string('description_it')->nullable();
            $table->string('location');
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetable_entries');
    }
};
