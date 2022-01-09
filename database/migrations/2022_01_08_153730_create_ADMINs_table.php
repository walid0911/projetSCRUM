<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateADMINsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ADMINs', function (Blueprint $table) {
            $table->id('ID_ADMIN');
            $table->string('USERNAME')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('NOM');
            $table->string('TEL')->nullable();
            $table->string('PAYS')->nullable();
            $table->string('VILLE')->nullable();
            $table->string('IMG_USER')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('ADMINs');
    }
}
