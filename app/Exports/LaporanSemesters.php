<?php

namespace App\Exports;

use App\Models\LaporanSemester;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class LaporanSemesters implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('laporanSemester.export', [
            'laporans' => LaporanSemester::latest()->get()
        ]);
    }
}
