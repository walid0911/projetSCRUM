<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePRODUITsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PRODUITs', function (Blueprint $table) {
            $table->id('ID_PRODUIT');
            $table->unsignedBigInteger("ID_MENU");
            $table->foreign('ID_MENU')->references('ID_MENU')->on('MENU')->onUpdate('cascade')->onDelete('cascade');
            $table->string('NOM_PRODUIT');
            $table->string('TYPE_PRODUIT');
            $table->string('DESCRIPTION');
            $table->decimal('PRIX');
            $table->string('IMG_PRODUIT')->nullable();
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
        Schema::dropIfExists('PRODUITs');
    }
}
