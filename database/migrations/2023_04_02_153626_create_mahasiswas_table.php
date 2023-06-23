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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('Nim', 16)->unique();
            $table->string('Nama', 64);
            $table->string('Kelas', 16);
            $table->string('Jurusan', 32);
            $table->string('No_Handphone', 16);
            $table->string('Email', 64);
            $table->date('Tanggal_Lahir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
