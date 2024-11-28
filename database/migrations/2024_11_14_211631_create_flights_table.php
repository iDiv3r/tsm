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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->time('duracion');
            $table->integer('pasajeros');
            $table->string('escalas');
            $table->unsignedBigInteger('airline_id');
            $table->unsignedBigInteger('destination_id');
            $table->unsignedBigInteger('origin_id');

            $table->foreign('airline_id')->references('id')->on('airlines');
            $table->foreign('destination_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('origin_id')->references('id')->on('cities')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
