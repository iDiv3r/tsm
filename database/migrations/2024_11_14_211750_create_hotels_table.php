<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->tinyInteger('estrellas');
            $table->float('calificacion');
            $table->float('distancia');
            $table->text('descripcion');
            $table->integer('num_huespedes');
            $table->float('precio');
            $table->text('politicas');
            $table->text('direccion');

            $table->unsignedBigInteger('city_id');

            $table->foreign('city_id')->references('id')->on('cities');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
