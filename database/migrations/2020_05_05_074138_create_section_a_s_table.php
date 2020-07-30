<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_section_a_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('form_id')->unsigned();
            $table->foreign('form_id')->references('id')->on('sisam_improvement_action_forms');
            $table->date('section_fill_date');
            $table->string('section_consequences');
            $table->string('section_nonconformities');
            $table->integer('section_state');
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
        Schema::dropIfExists('sisam_section_a_s');
    }
}
