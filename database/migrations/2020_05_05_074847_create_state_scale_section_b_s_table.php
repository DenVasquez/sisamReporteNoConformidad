<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateScaleSectionBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_state_scale_section_b_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('sisam_state_scales');
            $table->bigInteger('section_b_id')->unsigned();
            $table->foreign('section_b_id')->references('id')->on('sisam_section_b_s');
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
        Schema::dropIfExists('sisam_state_scale_section_b_s');
    }
}
