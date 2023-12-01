<?php

namespace App\Exports;

use App\Models\LaporanAkhir as ModelsLaporanAkhir;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class LaporanAkhir implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('laporanAkhirTahun.export', [
            'laporans' => ModelsLaporanAkhir::all()
        ]);
    }
}
