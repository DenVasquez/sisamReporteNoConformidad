<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackUpRootsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_back_up_roots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('back_document');
            $table->bigInteger('root_id')->unsigned();
            $table->foreign('root_id')->references('id')->on('sisam_cause_roots');
            $table->integer('back_state');
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
        Schema::dropIfExists('sisam_back_up_roots');
    }
}
