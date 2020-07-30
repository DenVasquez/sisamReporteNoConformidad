<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionSectionBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_question_section_b_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('section_b_id')->unsigned();
            $table->foreign('section_b_id')->references('id')->on('sisam_section_b_s');
            $table->bigInteger('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('sisam_questions');
            $table->bigInteger('answer_id')->unsigned();
            $table->foreign('answer_id')->references('id')->on('sisam_answers');
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
        Schema::dropIfExists('sisam_question_section_b_s');
    }
}
