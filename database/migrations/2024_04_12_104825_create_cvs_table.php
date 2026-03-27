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
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->text('summary')->nullable();
            $table->text('work_experience')->nullable();
            $table->text('education')->nullable();
            $table->text('skills')->nullable();
            $table->text('certifications')->nullable();
            $table->text('languages')->nullable();
            $table->text('associations')->nullable();
            $table->text('extra_training')->nullable();
            $table->text('conferences')->nullable();
            $table->text('publications')->nullable();
            $table->text('awards')->nullable();
            $table->string('photo')->nullable(); // Path to the profile photo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
