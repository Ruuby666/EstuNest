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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->integer('rooms_available');
            $table->string('description');
            $table->decimal('price', 10, 2);
            $table->string('city');
            $table->string('address');
            $table->string('dni_landlord'); // casero
            $table->timestamps();

            // Definir una clave foránea para relacionar el propietario con la tabla de usuarios (opcional)
            $table->foreign('dni_landlord')->references('dni')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
