<?php

use App\Models\BukaFitur;

function bukaFitur($i)
{
    $buka = BukaFitur::where('halaman', $i)->first();
    $now = new DateTime();

    // Tentukan dua tanggal untuk perbandingan
    $date1 = new DateTime($buka->dari); // Tengah hari tanggal 1
    $date2 = new DateTime($buka->sampai); // Tengah hari tanggal 2

    // Periksa apakah kedua tanggal berada di tengah hari saat ini
    if ($now >= $date1 && $now <= $date2) {
        return false;
    } else {
        return true;
    }
}
