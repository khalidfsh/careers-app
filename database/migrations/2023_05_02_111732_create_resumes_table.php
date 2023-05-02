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
        Schema::create('resumes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary();

            $table->string('full_name');
            $table->string('phone_code');
            $table->string('phone');
            $table->string('national_id');
            $table->boolean('is_saudi');
            $table->string('nationality')->nullable();
            $table->boolean('is_single');
            $table->boolean('is_male');
            $table->date('birth_date');
            $table->json('address');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
