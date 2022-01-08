<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRESERVARTIONTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RESERVARTION', function (Blueprint $table) {
            $table->id('ID_RESERVATION');
            $table->unsignedBigInteger('ID_CLIENT');
            $table->foreign('ID_CLIENT')->references('ID_CLIENT')->on('CLIENT')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger("ID_TABLE");
            $table->foreign('ID_TABLE')->references('ID_TABLE')->on('TABLE')->onUpdate('cascade')->onDelete('cascade');
            $table->date('DATE_RESERVATION');
            $table->integer('DUREE');
            $table->string('RESERVE_POUR');
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
        Schema::dropIfExists('RESERVARTION');
    }
}
