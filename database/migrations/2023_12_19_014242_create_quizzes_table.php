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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_content_id')->nullable();
            $table->foreignId('course_id');
            $table->string('title');
            $table->string('description');
            $table->timestamps();


            // $table->foreign('quiz_id')->references('id')->on('quiz_questions')->onDelete('cascade');
            // $table->foreign('quiz_id')->references('id')->on('quiz_answers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
