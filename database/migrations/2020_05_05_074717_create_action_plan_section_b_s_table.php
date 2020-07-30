<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionPlanSectionBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_action_plan_section_b_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('sisam_action_plans');
            $table->bigInteger('section_b__id')->unsigned();
            $table->foreign('section_b__id')->references('id')->on('sisam_section_b_s');
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
        Schema::dropIfExists('sisam_action_plan_section_b_s');
    }
}
