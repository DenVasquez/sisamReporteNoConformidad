<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisam_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name');
            $table->string('user_first_name');
            $table->string('user_last_name');
            $table->string('user_ci');
            $table->string('user_photo')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('user_access_count')->default(0);
            $table->integer('user_attemps')->nullable();
            $table->date('user_date_attemps')->nullable();
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('sisam_roles');
            $table->bigInteger('responsible_id')->unsigned()->nullable();
            $table->foreign('responsible_id')->references('id')->on('sisam_users');
            $table->bigInteger('user_types_id')->unsigned();
            $table->foreign('user_types_id')->references('id')->on('sisam_user_types');
            $table->integer('user_state');
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
        Schema::dropIfExists('sisam_users');
    }
}
