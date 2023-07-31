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
        Schema::create('sent_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title_pt');
            $table->string('title_en');
            $table->string('title_es');
            $table->string('title_it');
            $table->text('body_pt');
            $table->text('body_en');
            $table->text('body_es');
            $table->text('body_it');
            $table->text('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sent_notifications');
    }
};
