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
        Schema::create('update_profils', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('nomor_nerdes');
            $table->string('nomor_sk');
            $table->string('nomor_badan');
            $table->string('nama_direktur');
            $table->string('nomor_hp_direktur');
            $table->string('nama_sekertaris');
            $table->string('nomor_hp_sekertaris');
            $table->string('nama_bendahara');
            $table->string('nomor_hp_bendahara');
            $table->string('nama_pengawas');
            $table->string('nama_penasehat');
            $table->boolean('bidang_usaha_dijalankan')->default(False);
            $table->string('bidang_usaha_utama');
            $table->string('perdes_pendiri');
            $table->string('sk_pengelola');
            $table->string('setifikat_badan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_profils');
    }
};
