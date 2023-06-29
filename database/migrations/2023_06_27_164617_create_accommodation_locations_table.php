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
        Schema::create('accommodation_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('address_line1');
            $table->string('address_line2');
            $table->string('contact');
            $table->text('description_en')->nullable();
            $table->text('description_pt')->nullable();
            $table->string('picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodation_locations');
    }
};
