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
        Schema::create('laporanSemesters', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan');
            $table->string('desa');
            $table->enum('capaian', ['untung', 'rugi']);
            $table->integer('nilai');
            $table->text('permasalahan');
            $table->enum('rencana', ['ada', 'tidak']);
            $table->string('unit_usaha');
            $table->string('surat');
            $table->string('laporan_semester');
            $table->string('file_rancangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporanSemesters');
    }
};
