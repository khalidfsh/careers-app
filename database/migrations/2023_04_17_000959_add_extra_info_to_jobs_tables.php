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
        Schema::table('jobs', function (Blueprint $table) {
            $table->integer('salary')->nullable();
            $table->integer('number_of_positions')->nullable();
            $table->string('location')->nullable();
            $table->string('type')->nullable();
            $table->string('category')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('salary');
            $table->dropColumn('number_of_positions');
            $table->dropColumn('location');
            $table->dropColumn('type');
            $table->dropColumn('category');
        });
    }
};
