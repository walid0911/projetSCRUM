<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRESTAURANTsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RESTAURANTs', function (Blueprint $table) {
            $table->id('ID_REST');
            $table->unsignedBigInteger("ID_GERANT");
            $table->foreign('ID_GERANT')->references('ID_GERANT')->on('GERANTs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('MATRICULE');
            $table->string('NOM_REST');
            $table->string('ADRESSE');
            $table->decimal('POURCENTAGE_REDUCTION');
            $table->string('IMG1_REST')->nullable();
            $table->string('IMG2_REST')->nullable();
            $table->string('IMG3_REST')->nullable();
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
        Schema::dropIfExists('RESTAURANTs');
    }
}
