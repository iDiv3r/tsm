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
        Schema::create('flights_dates', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('fecha_salida');
            $table->string('fecha_regreso');
            $table->string('hora_salida');
            $table->unsignedBigInteger('flight_id');

            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights_dates');
    }
};
