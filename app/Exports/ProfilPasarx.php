<?php

namespace App\Exports;

use App\Models\ProfilPasar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ProfilPasarx implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('profilPasar.export', [
            'profils' => ProfilPasar::latest()->get()
        ]);
    }
}
