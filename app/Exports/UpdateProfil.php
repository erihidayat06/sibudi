<?php

namespace App\Exports;

use App\Models\LaporanSemester;
use App\Models\UpdateProfil as ModelUpdateProfil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class UpdateProfil implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('updateProfil.export', [
            'updates' => ModelUpdateProfil::all()
        ]);
    }
}
