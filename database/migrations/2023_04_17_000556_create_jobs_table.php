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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_user_id');
            $table->unsignedBigInteger('last_modifier_user_id')->nullable();

            $table->string('title');
            $table->text('description');
            $table->json('qualifications');
            $table->json('specializations');
            $table->json('experience_years_per_qualification');
            $table->json('extra_requirements')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            
            $table->timestamps();

            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('last_modifier_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
