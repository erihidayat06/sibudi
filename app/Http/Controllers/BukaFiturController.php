<?php

namespace App\Http\Controllers;

use App\Models\BukaFitur;
use Illuminate\Http\Request;

class BukaFiturController extends Controller
{

    public function index()
    {

        return view('bukaFitur.index', [
            'bukaFiturs' => BukaFitur::get()
        ]);
    }

    public function update(Request $request, BukaFitur $bukaFitur)
    {

        $validateData = $request->validate([
            'dari' => '',
            'sampai' => ''
        ]);

        BukaFitur::where('id', $bukaFitur->id)->update($validateData);

        return redirect()->back()->with('success', 'Berhasil di Rubah');
    }
}
