<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineLiveStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_live_stock', function (Blueprint $table) {
            $table->id();
            $table->integer('livestock_id')->unsigned();
            $table->foreign('livestock_id')->references('id')->on('type_livestock');
            $table->integer('medicine_id')->unsigned();
            $table->foreign('medicine_id')->references('id')->on('medicines');
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
        Schema::dropIfExists('medicine_live_stocks');
    }
}
