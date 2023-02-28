<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('school');
            $table->string('learn');
            $table->string('audience');
            $table->string('requirement');
            $table->string('source');
            $table->string('url')->nullable();
            $table->string('author');
            $table->string('tag');
            $table->longText('description');
            $table->string('hour');
            $table->string('minute');
            $table->string('seconds');
            $table->string('material');
            $table->string('real_price');
            $table->string('ini_price');
            $table->string('image')->nullable();
            $table->string('un_id');
            $table->string('status')->default('unpublished');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
