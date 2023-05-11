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
        Schema::create('ventas', function (Blueprint $table) {
            $table->integer("Numero_de_Venta")->primary();
            $table->String('Medio_de_Pago');
            $table->integer('Total_Venta');
            $table->integer('Cantidad_Entradas');
            $table->String('Usuario_Correo');
            $table->Date('Concierto_Fecha');

            $table->foreign('Usuario_Correo')->references('correo')->on('usuarios');
            $table->foreign('Concierto_Fecha')->references('Fecha_Concierto')->on('conciertos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
