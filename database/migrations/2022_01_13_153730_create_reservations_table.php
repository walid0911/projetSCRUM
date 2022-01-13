<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_CLIENT');
            $table->foreign('ID_CLIENT')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger("ID_TABLE");
            $table->foreign('ID_TABLE')->references('id')->on('tables')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('reservations');
    }
}
