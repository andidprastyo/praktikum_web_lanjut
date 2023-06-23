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
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id')->nullable();
            $table->unsignedBigInteger('matakuliah_id')->nullable();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nilai', 3)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
};
