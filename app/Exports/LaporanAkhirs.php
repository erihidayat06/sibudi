<?php

namespace App\Exports;

use App\Models\LaporanAkhir;
use Maatwebsite\Excel\Concerns\Exportable;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanAkhirs implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('laporanAkhirTahun.export', [
            'laporans' => LaporanAkhir::latest()->get()
        ]);
    }
}
