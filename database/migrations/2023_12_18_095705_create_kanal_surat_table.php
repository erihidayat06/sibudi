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
        Schema::create('kanal_surat', function (Blueprint $table) {
            $table->id();
            $table->string('judul_surat');
            $table->string('dari');
            $table->string('kepada');
            $table->string('tembusan');
            $table->text('isi_ringkasan');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kanal_surat');
    }
};
