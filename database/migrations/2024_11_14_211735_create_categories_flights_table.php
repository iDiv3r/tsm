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
        Schema::create('categories_flights', function (Blueprint $table) {
            $table->id();
            $table->string('precio');
            $table->integer('disponibles');
            $table->string('categoria');
            // $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('flight_date_id');


            // $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('flight_date_id')->references('id')->on('flights_dates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_flights');
    }
};
