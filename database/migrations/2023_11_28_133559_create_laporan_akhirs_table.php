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
        Schema::create('laporan_akhirs', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan');
            $table->string('desa');
            $table->enum('capaian', ['untung', 'rugi']);
            $table->integer('nilai');
            $table->integer('pades');
            $table->text('permasalahan');
            $table->string('unit_usaha');
            $table->enum('rencana', ['ada', 'tidak']);
            $table->integer('nilai2');
            $table->string('unit_usaha_permodalan');
            $table->string('surat');
            $table->string('laporan_akhir');
            $table->string('program_kerja');
            $table->string('berita_acara');
            $table->string('bukti_setor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_akhirs');
    }
};
