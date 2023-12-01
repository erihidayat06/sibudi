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
        Schema::create('kanal_pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 150);
            $table->text('deskripsi');
            $table->text('keadaan_terjadi');
            $table->text('keadaan_harapan');
            $table->string('surat_aduan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kanal_pengaduans');
    }
};
