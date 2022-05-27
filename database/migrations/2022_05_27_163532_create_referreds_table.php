<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referred', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner')->unsigned()->index();
            $table->foreign('owner')->references('id')
                ->on('livestock')->onDelete('cascade')->onUpdate('cascade');
            $table->string('amount')->nullable();
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
        Schema::dropIfExists('referreds');
    }
}
