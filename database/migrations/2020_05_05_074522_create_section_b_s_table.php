<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_section_b_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('section_b_check_date');
            $table->string('section_b_effectiveness')->null();
            $table->date('section_b_deadline_date');
            $table->date('section_b_effectiveness_check_date');
            $table->bigInteger('conclusion_id')->unsigned()->null();
            $table->foreign('conclusion_id')->references('id')->on('sisam_conclusions');
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
        Schema::dropIfExists('sisam_section_b_s');
    }
}
