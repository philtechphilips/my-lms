<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbookfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebookfiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ebook_id')->unsigned();
            $table->string('ebook_files');
            $table->foreign('ebook_id')
            ->references('id')
            ->on('ebooks')
            ->onDelete('cascade');
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
        Schema::dropIfExists('ebookfiles');
    }
}
