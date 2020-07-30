<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClauseActionFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_clause_action_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('clause_id')->unsigned();
            $table->foreign('clause_id')->references('id')->on('sisam_clauses');
            $table->bigInteger('form_id')->unsigned();
            $table->foreign('form_id')->references('id')->on('sisam_improvement_action_forms');
            $table->integer('clause_form_state');
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
        Schema::dropIfExists('sisam_clause_action_forms');
    }
}
