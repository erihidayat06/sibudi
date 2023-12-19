<?php

namespace App\Exports;


use App\User;
use App\Models\KanalSurat as kanal;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class KanalSurats implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('kanalSurat.export', [
            'kanal_surats' => kanal::latest()->get()
        ]);
    }
}
