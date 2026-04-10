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
        Schema::create('input_aspirases', function (Blueprint $table) {
            $table->id('id_pelaporan');
            $table->string('nis', 10); 
            $table->unsignedBigInteger('id_kategori'); // relasi ke kategori
            $table->string('lokasi', 50);
            $table->text('ket');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('nis')->references('nis')->on('siswas')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_aspirases');
    }
};
