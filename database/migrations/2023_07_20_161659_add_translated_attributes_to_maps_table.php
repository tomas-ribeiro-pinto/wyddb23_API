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
        Schema::table('maps', function (Blueprint $table) {
            $table->dropColumn('url');
            $table->string('url_pt')->after('id')->nullable();
            $table->string('url_en')->after('url_pt')->nullable();
            $table->string('url_es')->after('url_en')->nullable();
            $table->string('url_it')->after('url_es')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('maps', function (Blueprint $table) {
            $table->renameColumn('url_pt', 'url');
            $table->dropColumn('url_en');
            $table->dropColumn('url_es');
            $table->dropColumn('url_it');
        });
    }
};
