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
        Schema::create('affiliate_families', function (Blueprint $table) {
            $table->id();
            $table->string('file_number',255)->nullable();
            $table->string('last_name_1',255)->nullable();
            $table->string('last_name_2',255)->nullable();
            $table->string('name',255)->nullable();
            $table->date('birthday')->nullable();
            $table->string('sex',255)->nullable();
            $table->string('rfc',255)->nullable();
            $table->string('curp',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('account_number',255)->nullable();
            $table->string('clabe',255)->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->string('relationship',255)->nullable();
            $table->string('representative_name',255)->nullable();
            $table->string('representative_rfc',255)->nullable();
            $table->string('representative_curp',255)->nullable();
            $table->string('representative_relationship',255)->nullable();
            $table->date('inactive_date')->nullable();
            $table->string('inactive_motive',255)->nullable();
            $table->date('reentry_date')->nullable();
            $table->string('photo',255)->nullable();
            $table->string('family_status',255)->nullable();
            $table->unsignedBigInteger('affiliate_id')->nullable();
            $table->foreign('affiliate_id')->references('id')->on('affiliates');
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
        Schema::dropIfExists('affiliate_families');
    }
};
