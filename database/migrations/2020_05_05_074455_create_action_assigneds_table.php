<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionAssignedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_assigneds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('sisam_action_plans');
            $table->bigInteger('assigned_id')->unsigned();
            $table->foreign('assigned_id')->references('id')->on('sisam_users');
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
        Schema::dropIfExists('sisam_action_assigneds');
    }
}
