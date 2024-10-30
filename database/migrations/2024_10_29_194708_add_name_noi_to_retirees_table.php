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
        Schema::table('retirees', function (Blueprint $table) {
            $table->string('noi_number', 255)->nullable()->after('file_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('retirees', function (Blueprint $table) {
            $table->dropColumn('noi_number');
        });
    }
};
