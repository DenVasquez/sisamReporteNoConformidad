<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionRootsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_action_roots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('root_id')->unsigned();
            $table->foreign('root_id')->references('id')->on('sisam_cause_roots');
            $table->bigInteger('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('sisam_action_plans');
            $table->string('action_root_description');
            $table->string('action_root_evidence');
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
        Schema::dropIfExists('sisam_action_roots');
    }
}
