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
            $table->text('title_es')->after('title_en')->nullable();
            $table->text('title_it')->after('title_es')->nullable();
            $table->text('description_es')->after('description_en')->nullable();
            $table->text('description_it')->after('description_es')->nullable();
        });

        Schema::table('visit_locations', function (Blueprint $table) {
            $table->text('description_es')->after('description_en')->nullable();
            $table->text('description_it')->after('description_es')->nullable();
        });

        Schema::table('accommodation_locations', function (Blueprint $table) {
            $table->text('description_es')->after('description_en')->nullable();
            $table->text('description_it')->after('description_es')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entry_days', function (Blueprint $table) {
            $table->dropColumn('title_es');
            $table->dropColumn('title_it');
            $table->dropColumn('description_es');
            $table->dropColumn('description_it');
        });

        Schema::table('visit_locations', function (Blueprint $table) {
            $table->dropColumn('description_es');
            $table->dropColumn('description_it');
        });

        Schema::table('accommodation_locations', function (Blueprint $table) {
            $table->dropColumn('description_es');
            $table->dropColumn('description_it');
        });
    }
};
