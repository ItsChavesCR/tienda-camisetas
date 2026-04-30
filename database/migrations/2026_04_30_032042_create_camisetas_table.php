<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('camisetas', function (Blueprint $table) {
            $table->id('id_camiseta');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('version');
            $table->string('genero');
            $table->string('temporada');
            $table->decimal('precio', 10, 2);
            $table->string('material');
            $table->string('tipo_manga');
            $table->unsignedInteger('numero')->nullable();
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_marca');
            $table->unsignedBigInteger('id_equipo');
            $table->timestamps();

            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->cascadeOnDelete();
            $table->foreign('id_marca')->references('id_marca')->on('marcas')->cascadeOnDelete();
            $table->foreign('id_equipo')->references('id_equipo')->on('equipos')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('camisetas');
    }
};
