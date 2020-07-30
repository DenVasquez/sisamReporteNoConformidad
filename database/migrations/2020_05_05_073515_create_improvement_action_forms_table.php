<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImprovementActionFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_improvement_action_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('form_statement');
            $table->string('form_finding');
            $table->date('fill_date');
            $table->bigInteger('source_id')->unsigned();
            $table->foreign('source_id')->references('id')->on('sisam_sources');
            $table->bigInteger('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('sisam_areas');
            $table->bigInteger('coordinator_id')->unsigned();
            $table->foreign('coordinator_id')->references('id')->on('sisam_users');
            $table->integer('form_state');
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
        Schema::dropIfExists('sisam_improvement_action_forms');
    }
}
