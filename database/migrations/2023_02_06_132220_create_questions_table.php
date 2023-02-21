<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->integer('quiz_id');
            $table->integer('quest_number');
            $table->integer('point');
            $table->longText('question');
            $table->longText('description')->nullable();
            $table->longText('option_a');
            $table->longText('option_b');
            $table->longText('option_c')->nullable();
            $table->longText('option_d')->nullable();
            $table->longText('c_option');
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
        Schema::dropIfExists('questions');
    }
}
