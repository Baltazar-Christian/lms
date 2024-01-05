<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseContentsTable extends Migration
{
    public function up()
    {
        Schema::create('course_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['pdf', 'image', 'video']);
            $table->string('file_path');
            $table->unsignedInteger('duration')->nullable();
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            // $table->foreign('parent_id')->references('id')->on('course_contents')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_contents');
    }
}
