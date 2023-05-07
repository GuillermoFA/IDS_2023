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
        Schema::create('usuario_conciertos', function (Blueprint $table) {
            $table->String('Usuario_Correo');
            $table->date('Concierto_Fecha_Concierto');
        
            $table->foreign('Usuario_Correo')->references('correo')->on('usuarios');
            $table->foreign('Concierto_Fecha_Concierto')->references('Fecha_Concierto')->on('conciertos');

            $table->primary(['Usuario_Correo', 'Concierto_Fecha_Concierto']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_conciertos');
    }
};
