<?php

namespace App\Http\Controllers;

use App\Exports\LaporanAkhir as ExportsLaporanAkhir;
use GuzzleHttp\Client;
use App\Models\LaporanAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (bukaFitur(2)) {
            return view('bukaFitur.halamanTutup');
        }

        $class = LaporanAkhir::latest()->where('user_id', auth()->user()->id);
        $data = $class->get();
        return view('laporanAkhirTahun.index', [
            'laporans' => $data,
        ]);
    }

    public function admin()
    {
        if (bukaFitur(2)) {
            return view('bukaFitur.halamanTutup');
        }

        return view('laporanAkhirTahun.admin', [
            'laporans' => LaporanAkhir::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (bukaFitur(2)) {
            return view('bukaFitur.halamanTutup');
        }

        return view('laporanAkhirTahun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validateData = $request->validate([
            'kecamatan' => 'required',
            'desa' => 'required',
            'capaian' => 'required',
            'nilai' => 'required',
            'pades' => '',
            'permasalahan' => 'required',
            'unit_usaha' => '',
            'rencana' => 'required',
            'nilai2' => 'required',
            'unit_usaha_permodalan' => '',
            'surat' => 'required|mimes:pdf|max:10240',
            'laporan_akhir' => 'required|mimes:pdf|max:10240',
            'program_kerja' => 'required|mimes:pdf|max:10240',
            'berita_acara' => 'required|mimes:pdf|max:10240',
            'bukti_setor' => 'mimes:pdf|max:10240',

        ]);
        $validateData['user_id'] = auth()->user()->id;


        if ($request->hasFile('surat')) {

            $validateData['surat'] = $request->file('surat')->store('pdfs');
        }
        if ($request->hasFile('laporan_akhir')) {


            $validateData['laporan_akhir'] = $request->file('laporan_akhir')->store('pdfs');
        }
        if ($request->hasFile('program_kerja')) {

            $validateData['program_kerja'] = $request->file('program_kerja')->store('pdfs');
        }
        if ($request->hasFile('berita_acara')) {

            $validateData['berita_acara'] = $request->file('berita_acara')->store('pdfs');
        }
        if ($request->hasFile('bukti_setor')) {

            $validateData['bukti_setor'] = $request->file('bukti_setor')->store('pdfs');
        }

        LaporanAkhir::create($validateData);
        return redirect('/laporan-akhir')->with('success', 'berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanAkhir $LaporanAkhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanAkhir $LaporanAkhir)
    {
        if (bukaFitur(2)) {
            return view('bukaFitur.halamanTutup');
        }

        return view('laporanAkhirTahun.edit', [
            'laporan' => $LaporanAkhir
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanAkhir $LaporanAkhir)
    {

        $validateData = $request->validate([
            'kecamatan' => 'required',
            'desa' => 'required',
            'capaian' => 'required',
            'nilai' => 'required',
            'pades' => '',
            'permasalahan' => 'required',
            'unit_usaha' => '',
            'rencana' => 'required',
            'nilai2' => 'required',
            'unit_usaha_permodalan' => '',
            'surat' => 'mimes:pdf|max:10240',
            'laporan_akhir' => 'mimes:pdf|max:10240',
            'program_kerja' => 'mimes:pdf|max:10240',
            'berita_acara' => 'mimes:pdf|max:10240',
            'bukti_setor' => 'mimes:pdf|max:10240',

        ]);

        if ($request->hasFile('surat')) {
            // Update file PDF jika ada yang diunggah
            Storage::delete($LaporanAkhir->surat);
            $validateData['surat'] = $request->file('surat')->store('pdfs');
        }
        if ($request->hasFile('laporan_akhir')) {
            // Update file PDF jika ada yang diunggah
            Storage::delete($LaporanAkhir->laporan_akhir);
            $validateData['laporan_akhir'] = $request->file('laporan_akhir')->store('pdfs');
        }
        if ($request->hasFile('program_kerja')) {
            // Update file PDF jika ada yang diunggah
            Storage::delete($LaporanAkhir->program_kerja);
            $validateData['program_kerja'] = $request->file('program_kerja')->store('pdfs');
        }
        if ($request->hasFile('berita_acara')) {
            // Update file PDF jika ada yang diunggah
            Storage::delete($LaporanAkhir->berita_acara);
            $validateData['berita_acara'] = $request->file('berita_acara')->store('pdfs');
        }
        if ($request->hasFile('bukti_setor')) {
            // Update file PDF jika ada yang diunggah
            Storage::delete($LaporanAkhir->bukti_setor);
            $validateData['bukti_setor'] = $request->file('bukti_setor')->store('pdfs');
        }


        LaporanAkhir::where('id', $LaporanAkhir->id)->update($validateData);
        return redirect('/laporan-akhir')->with('success', 'berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanAkhir $LaporanAkhir)
    {


        Storage::delete($LaporanAkhir->surat);

        Storage::delete($LaporanAkhir->laporan_akhir);

        Storage::delete($LaporanAkhir->program_kerja);

        Storage::delete($LaporanAkhir->berita_acara);

        if ($LaporanAkhir->bukti_setor) {
            Storage::delete($LaporanAkhir->bukti_setor);
        }


        $LaporanAkhir->delete();

        return redirect('/laporan-akhir')->with('error', 'berhasil dihapus!');
    }

    public function laporanExcel()
    {
        return (new ExportsLaporanAkhir)->download('laporan-akhir-tahun.xlsx');
    }
}
