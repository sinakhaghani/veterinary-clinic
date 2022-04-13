<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirthCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('serial')->unique();
            $table->string('name');
            $table->integer('owner')->unsigned();
            $table->foreign('owner')->references('id')->on('livestock');
            $table->string('type_livestock')->nullable();
            $table->string('race')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('sex')->nullable();
            $table->string('color')->nullable();
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
        Schema::dropIfExists('birth_certificates');
    }
}
