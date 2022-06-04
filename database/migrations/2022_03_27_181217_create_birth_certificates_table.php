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
            $table->id()->unsigned();
            $table->string('serial')->unique()->index();
            $table->string('name');
            $table->foreignId('owner')->unsigned()->index()->nullable();
            $table->foreign('owner')->references('id')
                ->on('livestock')->onDelete('cascade')->onUpdate('cascade');
            $table->string('type_livestock')->nullable();
            $table->string('race')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('sex')->nullable();
            $table->string('color')->nullable();
            $table->date('next_visit')->nullable();
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
