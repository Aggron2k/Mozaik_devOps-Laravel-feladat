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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->year('year');
            $table->json('available_languages')->nullable();
            $table->integer('points_correct_answer')->default(0);
            $table->integer('points_wrong_answer')->default(0);
            $table->integer('points_empty_answer')->default(0);
            $table->timestamps();

            $table->unique(['name', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
