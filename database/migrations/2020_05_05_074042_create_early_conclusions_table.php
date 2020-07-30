<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarlyConclusionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_early_conclusions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('conclusion_id')->unsigned();
            $table->foreign('conclusion_id')->references('id')->on('sisam_conclusions');
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
        Schema::dropIfExists('sisam_early_conclusions');
    }
}
