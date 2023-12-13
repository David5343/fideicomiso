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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('last_name_1',255)->nullable();
            $table->string('last_name_2',255)->nullable();
            $table->string('name',255)->nullable();
            $table->date('start_date')->nullable();
            $table->date('birthday')->nullable();
            $table->string('birthplace',255)->nullable();
            $table->string('sex',255)->nullable();
            $table->string('rfc',255)->nullable();
            $table->string('curp',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('emergency_name',255)->nullable();
            $table->string('emergency_number',255)->nullable();
            $table->string('emergency_address',255)->nullable();
            $table->string('state',255)->nullable();
            $table->string('county',255)->nullable();
            $table->string('neighborhood',255)->nullable();
            $table->string('roadway_type',255)->nullable();
            $table->string('street',255)->nullable();
            $table->string('outdoor_number',255)->nullable();
            $table->string('interior_number',255)->nullable();
            $table->string('cp',255)->nullable();
            $table->string('locality',255)->nullable();
            $table->string('photo',255)->nullable();
            $table->string('signature',255)->nullable();
            $table->string('account_number',255)->nullable();
            $table->string('clabe',255)->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->unsignedBigInteger('place_id')->nullable()->unique();
            $table->foreign('place_id')->references('id')->on('places');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->unsignedBigInteger('user_id')->nullable()->unique();
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status', ['active', 'inactive','re-entry','deleted']);
            $table->string('modified_by',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
