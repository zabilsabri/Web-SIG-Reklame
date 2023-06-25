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
        Schema::create('penyewaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reklame_id');
            $table->string('nama');
            $table->string('perusahaan');
            $table->string('jenis');
            $table->date('tgl_pasang');
            $table->date('tgl_jatuh_tempo');
            $table->bigInteger('total_harga'); // Berapa banyak yang akan dibayar tergantung dari lama pemasangan ( / bulan )
            $table->timestamps();

            $table->foreign('reklame_id')->references('id')->on('reklames');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaans');
    }
};
