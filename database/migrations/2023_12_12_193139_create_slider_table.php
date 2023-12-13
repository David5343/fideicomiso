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
        Schema::create('slider', function (Blueprint $table) {
            $table->id();
            $table->string('img_1',255)->nullable();
            $table->string('title_1',255)->nullable();
            $table->string('text_1',255)->nullable();
            $table->string('img_2',255)->nullable();
            $table->string('title_2',255)->nullable();
            $table->string('text_2',255)->nullable();
            $table->string('img_3',255)->nullable();
            $table->string('title_3',255)->nullable();
            $table->string('text_3',255)->nullable();
            $table->enum('status', ['active', 'inactive','deleted']);
            $table->string('modified_by',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider');
    }
};
