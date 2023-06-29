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
        Schema::create('visit_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address_line1');
            $table->string('address_line2');
            $table->text('description_en');
            $table->text('description_pt');
            $table->string('picture');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_locations');
    }
};
