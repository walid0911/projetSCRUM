<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTABLEsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TABLEs', function (Blueprint $table) {
            $table->id('ID_TABLE');
            $table->unsignedBigInteger('ID_REST');
            $table->foreign('ID_REST')->references('ID_REST')->on('RESTAURANTs')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('NBR_PLACES');
            $table->string('IMG_TABLE', 1024)->nullable();
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
        Schema::dropIfExists('TABLEs');
    }
}
