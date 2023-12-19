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
        Schema::create('timeoff', function (Blueprint $table) {
            $table->id();
            $table->string('folio',255)->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->unsignedTinyInteger('required_time');
            $table->date('required_date')->nullable();
            $table->string('segment_day',255)->nullable();
            $table->string('reason',255)->nullable();
            $table->string('other',255)->nullable();
            $table->unsignedTinyInteger('required_time');
            $table->unsignedTinyInteger('monthly_bag');
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
        Schema::dropIfExists('timeoff');
    }
};
