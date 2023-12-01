<?php

namespace App\Exports;

use App\Models\KanalPengaduan;
use App\User;
use Maatwebsite\Excel\Concerns\Exportable;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Kanal implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('kanalPanduan.export', [
            'kanals' => KanalPengaduan::all()
        ]);
    }
}
