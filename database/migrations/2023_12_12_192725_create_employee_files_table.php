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
        Schema::create('employee_files', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('job_application', 255)->nullable();
            $table->string('cv_resume', 255)->nullable();
            $table->string('birth_certificate', 255)->nullable();
            $table->string('ine', 255)->nullable();
            $table->string('rfc', 255)->nullable();
            $table->string('military_card', 255)->nullable();
            $table->string('proof_residency', 255)->nullable();
            $table->string('sketch_home', 255)->nullable();
            $table->string('no_disqualification', 255)->nullable();
            $table->string('criminal_record', 255)->nullable();
            $table->string('educational_level', 255)->nullable();
            $table->string('profesional_ID', 255)->nullable();
            $table->string('recommendation_letter_1', 255)->nullable();
            $table->string('recommendation_letter_2', 255)->nullable();
            $table->string('checkup_medical', 255)->nullable();
            $table->string('work_contract', 255)->nullable();
            $table->unsignedBigInteger('employee_id')->nullable()->unique();
            $table->foreign('employee_id')->references('id')->on('employees');
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
        Schema::dropIfExists('employee_files');
    }
};
