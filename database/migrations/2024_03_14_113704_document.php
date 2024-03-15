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
        // its going to have id and to strings
        Schema::create('documents', function (Blueprint $table): void {
            $table->id();
            $table->string('dni_user');
            $table->string('image', 255)->nullable();
            $table->timestamps();
        });

        // add foreign key constraint on users
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('documents');
    }
};
