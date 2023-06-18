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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('concert_id');
            $table->integer("reservation_number");
            $table->integer("payment_method");
            $table->integer('total');
            $table->integer('quantity');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('concert_id')->references('id')->on('concerts');

            $table->string('pdf_name')->nullable();;
            $table->string('path')->nullable();;
            $table->date('date')->nullable();;
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
