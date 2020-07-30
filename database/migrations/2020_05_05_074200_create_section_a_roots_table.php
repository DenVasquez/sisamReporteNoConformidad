<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionARootsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_a_roots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sisam_section_a_s');
            $table->bigInteger('root_id')->unsigned();
            $table->foreign('root_id')->references('id')->on('sisam_cause_roots');
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
        Schema::dropIfExists('sisam_section_a_roots');
    }
}
