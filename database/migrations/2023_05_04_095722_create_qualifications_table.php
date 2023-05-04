<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resume_id');

            $table->string('degree');
            $table->string('title');
            $table->string('institution');
            $table->date('start_date')->nullable();
            $table->date('end_date');
            $table->float('grade')->nullable();

            $table->timestamps();

            $table->foreign('resume_id')->references('user_id')->on('resumes')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};