<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonAccordanceActionFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_non_accordance_action_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('accordance_id')->unsigned();
            $table->foreign('accordance_id')->references('id')->on('sisam_non_accordance_reports');
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
        Schema::dropIfExists('sisam_non_accordance_action_forms');
    }
}
