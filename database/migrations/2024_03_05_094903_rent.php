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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('dni_tenant');
            $table->unsignedBigInteger('id_property');
            $table->string('start_month');
            $table->string('end_month');
            $table->timestamps();

            $table->foreign('dni_tenant')->references('dni')->on('users')->onDelete('cascade');
            $table->foreign('id_property')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
