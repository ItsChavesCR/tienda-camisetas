<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('camiseta_tallas', function (Blueprint $table) {
            $table->id('id_camisa_talla');
            $table->unsignedBigInteger('id_camiseta');
            $table->unsignedBigInteger('id_talla');
            $table->timestamps();

            $table->foreign('id_camiseta')->references('id_camiseta')->on('camisetas')->cascadeOnDelete();
            $table->foreign('id_talla')->references('id_talla')->on('tallas')->cascadeOnDelete();
            $table->unique(['id_camiseta', 'id_talla']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('camiseta_tallas');
    }
};
