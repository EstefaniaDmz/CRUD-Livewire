<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->char('telefono',10);
            $table->string('calle');
            $table->string('colonia');
            $table->char('cp',5);
            $table->string('ciudad');
            $table->string('estado');
            $table->string('pais');
            $table->integer('numeroPlazas');

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
        Schema::dropIfExists('hotels');
    }
};
