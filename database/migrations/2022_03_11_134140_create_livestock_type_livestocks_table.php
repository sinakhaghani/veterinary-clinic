<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivestockTypeLivestocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livestock_type_livestocks', function (Blueprint $table) {
            $table->id();
            $table->integer('livestock_id')->unsigned();
            $table->foreign('livestock_id')->references('id')->on('livestock');
            $table->integer('type_livestock_id')->unsigned();
            $table->foreign('type_livestock_id')->references('id')->on('type_livestock');
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
        Schema::dropIfExists('livestock_type_livestocks');
    }
}
