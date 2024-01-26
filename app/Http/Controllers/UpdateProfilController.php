<?php

namespace App\Http\Controllers;

use App\Exports\UpdateProfil as ExportsUpdateProfil;
use App\Models\UpdateProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (bukaFitur(3)) {
            return view('bukaFitur.halamanTutup');
        }
        $class = UpdateProfil::latest()->where('user_id', auth()->user()->id);
        $data = $class->get();

        return view('updateProfil.index', [
            'updates' => $data
        ]);
    }

    public function admin()
    {
        return view('updateProfil.admin', [
            'updates' => UpdateProfil::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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

        if (bukaFitur(3)) {
            return view('bukaFitur.halamanTutup');
        }
        return view('updateProfil.create', [
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
            'nomor_perdes' => 'required',
            'nomor_sk' => 'required',
            'nomor_badan' => 'required',
            'nama_direktur' => 'required',
            'nomor_hp_direktur' => 'required',
            'nama_sekertaris' => 'required',
            'nomor_hp_sekertaris' => 'required',
            'nama_bendahara' => 'required',
            'nomor_hp_bendahara' => 'required',
            'nama_pengawas' => 'required',
            'nama_penasehat' => 'required',
            'bidang_usaha_dijalankan' => '',
            'bidang_usaha_utama' => 'required',
            'perdes_pendiri' => '',
            'sk_pengelola' => '',
            'setifikat_badan' => '',
        ]);

        $validateData['bidang_usaha_dijalankan'] = implode(',', $request->bidang_usaha_dijalankan);

        $validateData['user_id'] = auth()->user()->id;

        if ($request->hasFile('perdes_pendiri')) {
            $validateData['perdes_pendiri'] = $request->file('perdes_pendiri')->store('post');
        } else {
            $validateData['perdes_pendiri'] = '0';
        }

        if ($request->hasFile('sk_pengelola')) {
            $validateData['sk_pengelola'] = $request->file('sk_pengelola')->store('post');
        } else {
            $validateData['sk_pengelola'] = '0';
        }

        if ($request->hasFile('setifikat_badan')) {
            $validateData['setifikat_badan'] = $request->file('setifikat_badan')->store('post');
        } else {
            $validateData['setifikat_badan'] = '0';
        }

        UpdateProfil::create($validateData);

        return redirect('/update-profil')->with('success', 'berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(UpdateProfil $updateProfil)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpdateProfil $updateProfil)
    {
        $bidang_usaha_dijalankan = [
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

        if (bukaFitur(3)) {
            return view('bukaFitur.halamanTutup');
        }
        return view('updateProfil.edit', [
            'update' => $updateProfil,
            'bidang_usaha_dijalankan' => $bidang_usaha_dijalankan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UpdateProfil $updateProfil)
    {

        $validateData = $request->validate([
            'kecamatan' => 'required',
            'desa' => 'required',
            'nomor_perdes' => 'required',
            'nomor_sk' => 'required',
            'nomor_badan' => 'required',
            'nama_direktur' => 'required',
            'nomor_hp_direktur' => 'required',
            'nama_sekertaris' => 'required',
            'nomor_hp_sekertaris' => 'required',
            'nama_bendahara' => 'required',
            'nomor_hp_bendahara' => 'required',
            'nama_pengawas' => 'required',
            'nama_penasehat' => 'required',
            'bidang_usaha_dijalankan' => '',
            'bidang_usaha_utama' => 'required',
            'perdes_pendiri' => '',
            'sk_pengelola' => '',
            'setifikat_badan' => '',
        ]);

        $validateData['bidang_usaha_dijalankan'] = implode(',', $request->bidang_usaha_dijalankan);


        if ($request->hasFile('perdes_pendiri')) {
            // Update file PDF jika ada yang diunggah
            Storage::delete($updateProfil->perdes_pendiri);
            $validateData['perdes_pendiri'] = $request->file('perdes_pendiri')->store('post');
        }

        if ($request->hasFile('sk_pengelola')) {
            // Update file PDF jika ada yang diunggah
            Storage::delete($updateProfil->sk_pengelola);
            $validateData['sk_pengelola'] = $request->file('sk_pengelola')->store('post');
        }

        if ($request->hasFile('setifikat_badan')) {
            // Update file PDF jika ada yang diunggah
            Storage::delete($updateProfil->setifikat_badan);
            $validateData['setifikat_badan'] = $request->file('setifikat_badan')->store('post');
        }


        UpdateProfil::where('id', $updateProfil->id)->update($validateData);

        return redirect('/update-profil')->with('success', 'berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UpdateProfil $updateProfil)
    {


        Storage::delete($updateProfil->perdes_pendiri);

        Storage::delete($updateProfil->sk_pengelola);

        Storage::delete($updateProfil->setifikat_badan);

        $updateProfil->delete();

        return redirect()->back()->with('error', 'berhasil dihapus!');
    }

    public function laporanExcel()
    {
        return (new ExportsUpdateProfil)->download('update-profil-BUMDes.xlsx');
    }
}
