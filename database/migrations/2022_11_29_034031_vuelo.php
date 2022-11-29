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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->time('hora');
            $table->integer('numeroPlazas');
            $table->string('ciudadOrigen');
            $table->string('estadoOrigen');
            $table->string('paisOrigen');
            $table->string('ciudadDestino');
            $table->string('estadoDestino');
            $table->string('paisDestino');

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
        Schema::dropIfExists('vuelos');
    }
};
