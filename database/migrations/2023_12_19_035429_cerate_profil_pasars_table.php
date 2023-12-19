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
        Schema::create('profil_pasars', function (Blueprint $table) {
            $table->id();
            $table->string('status_pengelola');
            $table->integer('no_perdes');
            $table->integer('no_sk');
            $table->integer('kepemilikan_tanah');
            $table->integer('luas');
            $table->integer('kondisi_bangunan');
            $table->integer('luas_bangunan');
            $table->enum('kantor_pasar', ['Ada', 'Tidak']);
            $table->enum('parkiran', ['Ada', 'Tidak']);
            $table->enum('musola', ['Ada', 'Tidak']);
            $table->integer('jml_kios');
            $table->integer('jml_los');
            $table->integer('jml_toilet');
            $table->integer('jml_pedagang');
            $table->integer('sumber_pembiayaan');
            $table->integer('hasi_retibusi_tahunan');
            $table->integer('kontribusi_pades');
            $table->integer('kondisi_fisik_pasar');
            $table->text('kendala');
            $table->string('profil_persar');
            $table->string('perdes');
            $table->string('sk_pengelola');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_pasars');
    }
};
