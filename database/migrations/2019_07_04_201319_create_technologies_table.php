<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('technologies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->longText('description');
            $table->string('condition');
            $table->timestamps();
            $table->string('tech_type');
            $table->string('due_time')->default(""); 
            $table->boolean('loaned')->default(false);
                      
            
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
        Schema::drop('technologies');
    }
}
