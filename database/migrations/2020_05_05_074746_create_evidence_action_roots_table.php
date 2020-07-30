<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidenceActionRootsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_evidence_action_roots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('action_root_id')->unsigned();
            $table->foreign('action_root_id')->references('id')->on('sisam_action_roots');
            $table->bigInteger('section_b_id')->unsigned();
            $table->foreign('section_b_id')->references('id')->on('sisam_section_b_s');
            $table->string('evidence_action_root_document');
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
        Schema::dropIfExists('sisam_evidence_action_roots');
    }
}
