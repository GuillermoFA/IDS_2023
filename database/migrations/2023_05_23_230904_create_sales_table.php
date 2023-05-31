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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('concertId');
            $table->integer("reservationNumber");
            $table->string("paymentMethod");
            $table->integer('totalSale');
            $table->integer('quantity');
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('concertId')->references('id')->on('concerts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
