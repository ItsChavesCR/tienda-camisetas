<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id('id_equipo');
            $table->string('nombre');
            $table->unsignedBigInteger('id_liga');
            $table->timestamps();

            $table->foreign('id_liga')->references('id_liga')->on('ligas')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
