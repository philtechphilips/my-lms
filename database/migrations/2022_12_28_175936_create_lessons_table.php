<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('topic_id')->unsigned();
            $table->string('source');
            $table->string('url');
            $table->string('duration');
            $table->longText('content');
            $table->string('file')->nullable();
            $table->timestamps();
            $table->foreign('topic_id')
            ->references('id')
            ->on('topics')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
