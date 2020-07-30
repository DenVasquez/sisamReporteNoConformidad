<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonAccordanceReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_non_accordance_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('report_description');
            $table->date('report_date');
            $table->integer('report_state')->nullable();
            $table->string('report_correction_description')->nullable();
            $table->string('report_correction_deadline')->nullable();
            $table->date('report_closing_check')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('sisam_users');
            $table->bigInteger('collaborator_id')->unsigned();
            $table->foreign('collaborator_id')->references('id')->on('sisam_users');
            $table->bigInteger('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('sisam_areas');
            $table->bigInteger('process_id')->unsigned();
            $table->foreign('process_id')->references('id')->on('sisam_accordance_processes');
            $table->bigInteger('action_type_id')->unsigned()->nullable();
            $table->foreign('action_type_id')->references('id')->on('sisam_action_types');
            $table->bigInteger('source_id')->unsigned();
            $table->foreign('source_id')->references('id')->on('sisam_non_accordance_sources');
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
        Schema::dropIfExists('sisam_non_accordance_reports');
    }
}
