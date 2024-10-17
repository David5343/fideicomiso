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
        Schema::create('vacation', function (Blueprint $table) {
            $table->id();
            $table->string('folio', 255)->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->date('request_date')->nullable();
            $table->date('start_vacation')->nullable();
            $table->date('end_vacation')->nullable();
            $table->unsignedTinyInteger('first_period')->nullable();
            $table->unsignedTinyInteger('second_period')->nullable();
            $table->string('note', 255)->nullable();
            $table->unsignedTinyInteger('vacation_bag')->nullable();
            $table->enum('status', ['active', 'inactive', 'deleted']);
            $table->string('modified_by', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacation');
    }
};
