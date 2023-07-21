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
        Schema::create('prayer_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id');
            $table->integer('order_index');
            $table->string('title_pt');
            $table->string('title_en');
            $table->string('title_es');
            $table->string('title_it');
            $table->longText('body_pt');
            $table->longText('body_en');
            $table->longText('body_es');
            $table->longText('body_it');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prayer_days');
    }
};
