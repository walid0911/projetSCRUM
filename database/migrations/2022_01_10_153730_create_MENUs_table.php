<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMENUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MENUs', function (Blueprint $table) {
            $table->id('ID_MENU');
            $table->unsignedBigInteger('ID_REST');
            $table->foreign('ID_REST')->references('ID_REST')->on('RESTAURANT')->onUpdate('cascade')->onDelete('cascade');
            $table->string('IMG_MENU')->nullable();
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
        Schema::dropIfExists('MENUs');
    }
}
