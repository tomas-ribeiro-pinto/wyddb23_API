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
        Schema::table('entry_days', function (Blueprint $table) {
            $table->text('description_en')->after('title_en')->nullable();
            $table->text('description_pt')->after('title_pt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entry_days', function (Blueprint $table) {
            $table->dropColumn('description_en');
            $table->dropColumn('description_pt');
        });
    }
};
