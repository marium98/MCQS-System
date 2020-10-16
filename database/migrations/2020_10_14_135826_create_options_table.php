<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('option_text');
            $table->unsignedInteger('question_id')->nullable();
            $table->integer('points')->nullable();

            $table->foreign('question_id')
                    ->references('id')
                    ->on('questions')
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
        Schema::dropIfExists('options');
    }
}