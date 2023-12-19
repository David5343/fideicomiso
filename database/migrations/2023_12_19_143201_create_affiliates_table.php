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
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->string('file_number',255)->nullable();
            $table->unsignedBigInteger('dependency_id')->nullable();
            $table->foreign('dependency_id')->references('id')->on('dependencies');
            $table->date('start_date')->nullable();
            $table->string('work_place',255)->nullable();
            $table->string('last_name_1',255)->nullable();
            $table->string('last_name_2',255)->nullable();
            $table->string('name',255)->nullable();
            $table->date('birthday')->nullable();
            $table->string('birthplace',255)->nullable();
            $table->string('sex',255)->nullable();
            $table->string('marital_status',255)->nullable();
            $table->string('rfc',255)->nullable();
            $table->string('curp',255)->nullable();           
            $table->string('phone',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('state',255)->nullable();
            $table->string('county',255)->nullable();
            $table->string('neighborhood',255)->nullable();
            $table->string('roadway_type',255)->nullable();
            $table->string('street',255)->nullable();
            $table->string('outdoor_number',255)->nullable();
            $table->string('interior_number',255)->nullable();
            $table->string('cp',255)->nullable();
            $table->string('locality',255)->nullable();
            $table->date('inactive_date')->nullable();
            $table->string('inactive_motive',255)->nullable();
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
        Schema::dropIfExists('affiliates');
    }
};
