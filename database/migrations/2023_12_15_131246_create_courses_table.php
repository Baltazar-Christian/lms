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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained();
            $table->string('title');
            $table->text('description');
            $table->string('slug')->unique();
            $table->decimal('price', 8, 2);
            $table->unsignedInteger('duration_in_minutes');
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->string('cover_image');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
