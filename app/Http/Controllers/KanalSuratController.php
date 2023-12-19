<?php

namespace App\Http\Controllers;

use App\Exports\Kanal;
use App\Exports\KanalSurats;
use App\Models\KanalSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KanalSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kanalSurat = KanalSurat::where('user_id', auth()->user()->id)->latest()->get();
        return view('kanalSurat.index', [
            'kanal_surats' => $kanalSurat
        ]);
    }

    public function admin()
    {
        $kanalSurat = KanalSurat::latest()->get();
        return view('kanalSurat.admin', [
            'kanal_surats' => $kanalSurat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kanalSurat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul_surat' => 'required',
            'dari' => 'required',
            'kepada' => 'required',
            'tembusan' => 'required',
            'isi_ringkasan' => 'required',
            'file' => 'required|max:10240'
        ]);

        $validateData['file'] = $request->file('file')->store('post');

        $validateData['user_id'] = auth()->user()->id;


        KanalSurat::create($validateData);

        return redirect('/kanal-surat')->with('success', 'berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(KanalSurat $kanalSurat)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KanalSurat $kanalSurat)
    {
        return view('kanalSurat.edit', [
            'kanal' => $kanalSurat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KanalSurat $kanalSurat)
    {
        $validateData = $request->validate([
            'judul_surat' => 'required',
            'dari' => 'required',
            'kepada' => 'required',
            'tembusan' => 'required',
            'isi_ringkasan' => 'required',
            'file' => 'max:10240'
        ]);

        if ($request->hasFile('file')) {
            Storage::delete($kanalSurat->file);
            $validateData['file'] = $request->file('file')->store('post');
        }

        $validateData['user_id'] = auth()->user()->id;


        KanalSurat::where('id', $kanalSurat->id)->update($validateData);

        return redirect('/kanal-surat')->with('success', 'berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KanalSurat $kanalSurat)
    {

        Storage::delete($kanalSurat->file);

        $kanalSurat->delete();

        return redirect()->back()->with('error', 'berhasil dihapus!');
    }

    public function laporanExcel()
    {
        $tgl = date('d_F_Y');
        return (new KanalSurats)->download("Kanal_Persuratan_$tgl.xlsx");
    }
}
