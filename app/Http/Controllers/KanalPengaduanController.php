<?php

namespace App\Http\Controllers;

use App\Exports\Kanal;
use App\Models\BukaFitur;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\KanalPengaduan;
use App\Providers\BukaFiturProvider;
use DateTime;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class KanalPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (bukaFitur(4)) {
            return view('bukaFitur.halamanTutup');
        }

        $class = KanalPengaduan::latest()->where('user_id', auth()->user()->id);
        $data = $class->get();

        return view('kanalPanduan.index', [
            'kanals' => $data,
        ]);
    }

    public function admin()
    {

        return view('kanalPanduan.admin', [
            'kanals' => KanalPengaduan::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (bukaFitur(4)) {
            return view('bukaFitur.halamanTutup');
        }

        return view('kanalPanduan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'keadaan_terjadi' => 'required',
            'keadaan_harapan' => 'required',
            'surat_aduan' => 'required|max:10240'
        ]);

        $validateData['surat_aduan'] = $request->file('surat_aduan')->store('post');

        $validateData['user_id'] = auth()->user()->id;


        KanalPengaduan::create($validateData);

        return redirect('/kanal-pengaduan')->with('success', 'berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(KanalPengaduan $kanalPengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KanalPengaduan $kanalPengaduan)
    {
        if (bukaFitur(4)) {
            return view('bukaFitur.halamanTutup');
        }

        return view('kanalPanduan.edit', [
            'kanal' => $kanalPengaduan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KanalPengaduan $kanalPengaduan)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'keadaan_terjadi' => 'required',
            'keadaan_harapan' => 'required',
            'surat_aduan' => 'max:10240'
        ]);

        if ($request->hasFile('surat_aduan')) {
            Storage::delete($kanalPengaduan->surat_aduan);
            $validateData['surat_aduan'] = $request->file('surat_aduan')->store('post');
        }


        KanalPengaduan::where('id', $kanalPengaduan->id)->update($validateData);

        return redirect('/kanal-pengaduan')->with('success', 'berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KanalPengaduan $kanalPengaduan)
    {

        Storage::delete($kanalPengaduan->surat_aduan);

        $kanalPengaduan->delete();

        return redirect()->back()->with('error', 'berhasil dihapus!');
    }


    public function laporanExcel()
    {
        return (new Kanal)->download('kanal.xlsx');
    }
}
