<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_form_processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('process_id')->unsigned();
            $table->foreign('process_id')->references('id')->on('sisam_action_processes');
            $table->bigInteger('form_id')->unsigned();
            $table->foreign('form_id')->references('id')->on('sisam_improvement_action_forms');
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
        Schema::dropIfExists('sisam_form_processes');
    }
}
