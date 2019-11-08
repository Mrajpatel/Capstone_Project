<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanoutsTable extends Migration
{
    /**
     * Run the migrations.
     * Table attributes and dependencies
     * @return void
     */
    public function up()
    {
        Schema::create('loanouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('tech_id')->unsigned();

            $table->string('due_time');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tech_id')->references('id')->on('technologies');

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
        //
        Schema::dropIfExists('loanouts');
    }
}
