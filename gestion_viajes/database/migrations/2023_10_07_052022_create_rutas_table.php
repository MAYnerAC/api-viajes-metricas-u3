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
        Schema::create('rutas', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('origen');
            $table->string('destino');
            $table->time('duracion')->nullable();
            $table->decimal('distancia', 10, 2)->nullable();
            $table->string('medio_transporte')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutas');
    }
};
