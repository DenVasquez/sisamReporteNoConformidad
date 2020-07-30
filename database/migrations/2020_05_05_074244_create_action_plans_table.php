<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_action_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sisam_section_a_s');
            $table->date('plan_deadline_date');
            $table->bigInteger('responsable_id')->unsigned();
            $table->foreign('responsable_id')->references('id')->on('sisam_users');
            $table->string('correction')->null();
            $table->integer('plan_state');
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
        Schema::dropIfExists('sisam_action_plans');
    }
}
