<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\LaporanAkhir;
use Illuminate\Http\Request;
use App\Exports\LaporanAkhirs;
use Maatwebsite\Excel\Facades\Excel;
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

        $unit_usaha = [
            'Pinjaman Bergulir',
            'Pengelolaan Sampah',
            'Pengelolaan Pasar Desa',
            'Pengelolaan Wisata',
            'Perdagangan',
            'Peternakan',
            'Pertanian',
            'Jasa Pembayaran',
            'Jasa Sewa',
            'Jasa Pemasaran UMKM',
            'Produksi',
            'Internet Desa',
            'Lainnya'
        ];

        return view('laporanAkhirTahun.create', [
            'unit_usaha' => $unit_usaha
        ]);
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
            'nilai' => 'required|max:11',
            'pades' => '',
            'nilai_aset' => 'required|max:11',
            'surat' => '',

        ]);

        $validateData['unit_usaha_permodalan'] = $request->unit_usaha;
        $validateData['permasalahan'] = $request->unit_usaha;
        $validateData['unit_usaha'] = $request->unit_usaha;
        $validateData['user_id'] = auth()->user()->id;

        if ($request->hasFile('surat')) {
            $validateData['surat'] = $request->file('surat')->store('post');
        } else {
            $validateData['surat'] = '0';
        }
        if ($request->hasFile('laporan_akhir')) {


            $validateData['laporan_akhir'] = $request->file('laporan_akhir')->store('post');
        } else {
            $validateData['laporan_akhir'] = '0';
        }

        if ($request->hasFile('program_kerja')) {

            $validateData['program_kerja'] = $request->file('program_kerja')->store('post');
        } else {
            $validateData['program_kerja'] = '0';
        }

        if ($request->hasFile('berita_acara')) {

            $validateData['berita_acara'] = $request->file('berita_acara')->store('post');
        } else {
            $validateData['berita_acara'] = '0';
        }

        if ($request->hasFile('bukti_setor')) {

            $validateData['bukti_setor'] = $request->file('bukti_setor')->store('post');
        } else {
            $validateData['bukti_setor'] = '0';
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

        $unit_usaha = [
            'Pinjaman Bergulir',
            'Pengelolaan Sampah',
            'Pengelolaan Pasar Desa',
            'Pengelolaan Wisata',
            'Perdagangan',
            'Peternakan',
            'Pertanian',
            'Jasa Pembayaran',
            'Jasa Sewa',
            'Jasa Pemasaran UMKM',
            'Produksi',
            'Internet Desa',
            'Lainnya'
        ];

        return view('laporanAkhirTahun.edit', [
            'laporan' => $LaporanAkhir,
            'unit_usaha' => $unit_usaha
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
            'nilai' => 'required|max:11',
            'pades' => '',
            'nilai_aset' => 'required|max:11',
            'unit_usaha' => '',
            'surat' => '',
        ]);

        $validateData['unit_usaha_permodalan'] = $request->unit_usaha;
        $validateData['permasalahan'] = $request->unit_usaha;
        $validateData['unit_usaha'] = $request->unit_usaha;

        if ($request->hasFile('surat')) {
            // Update file PDF jika ada yang diunggah
            if ($LaporanAkhir->surat) {
                Storage::delete($LaporanAkhir->surat);
            }
            $validateData['surat'] = $request->file('surat')->store('post');
        }
        if ($request->hasFile('laporan_akhir')) {
            // Update file PDF jika ada yang diunggah
            if ($LaporanAkhir->Laporan_akhir) {
                Storage::delete($LaporanAkhir->laporan_akhir);
            }
            $validateData['laporan_akhir'] = $request->file('laporan_akhir')->store('post');
        }
        if ($request->hasFile('program_kerja')) {
            // Update file PDF jika ada yang diunggah
            if ($LaporanAkhir->program_kerja) {
                Storage::delete($LaporanAkhir->program_kerja);
            }
            $validateData['program_kerja'] = $request->file('program_kerja')->store('post');
        }
        if ($request->hasFile('berita_acara')) {
            // Update file PDF jika ada yang diunggah
            if ($LaporanAkhir->berita_acara) {
                Storage::delete($LaporanAkhir->berita_acara);
            }
            $validateData['berita_acara'] = $request->file('berita_acara')->store('post');
        }
        if ($request->hasFile('bukti_setor')) {
            // Update file PDF jika ada yang diunggah
            if ($LaporanAkhir->bukti_setor) {
                Storage::delete($LaporanAkhir->bukti_setor);
            }
            $validateData['bukti_setor'] = $request->file('bukti_setor')->store('post');
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
        return Excel::download(new LaporanAkhirs, 'Laporan-Akhir-Tahun.xlsx');
    }
}
