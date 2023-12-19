<?php

namespace App\Http\Controllers;

use App\Exports\ProfilPasarx;
use App\Models\ProfilPasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilPasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profilPasar.index', [
            'profils' => ProfilPasar::latest()->get()
        ]);
    }

    public function admin()
    {
        $profilPasar = ProfilPasar::latest()->get();
        return view('profilPasar.admin', [
            'profils' => $profilPasar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profilPasar.created');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valiadateData = $request->validate([
            'status_pengelola' => 'required',
            'no_perdes' => 'required',
            'no_sk' => 'required',
            'kepemilikan_tanah' => 'required',
            'luas' => 'required',
            'kondisi_bangunan' => 'required',
            'luas_bangunan' => 'required',
            'kantor_pasar' => 'required',
            'parkiran' => 'required',
            'musola' => 'required',
            'jml_kios' => 'required',
            'jml_los' => 'required',
            'jml_toilet' => 'required',
            'jml_pedagang' => 'required',
            'sumber_pembiayaan' => 'required',
            'hasi_retibusi_tahunan' => 'required',
            'kontribusi_pades' => 'required',
            'kondisi_fisik_pasar' => 'required',
            'kendala' => 'required',
            'profil_persar' => 'required|max:10240',
            'perdes' => 'required|max:10240',
            'sk_pengelola' => 'required|max:10240',
        ]);


        if ($request->hasFile('profil_persar')) {
            $valiadateData['profil_persar'] = $request->file('profil_persar')->store('post');
        }

        if ($request->hasFile('perdes')) {
            $valiadateData['perdes'] = $request->file('perdes')->store('post');
        }

        if ($request->hasFile('sk_pengelola')) {
            $valiadateData['sk_pengelola'] = $request->file('sk_pengelola')->store('post');
        }

        ProfilPasar::create($valiadateData);

        return redirect('/profil-pasar')->with('success', 'Laporan Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfilPasar $profilPasar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfilPasar $profilPasar)
    {
        return view('profilPasar.edit', [
            'profil' => $profilPasar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfilPasar $profilPasar)
    {
        $valiadateData = $request->validate([
            'status_pengelola' => 'required',
            'no_perdes' => 'required',
            'no_sk' => 'required',
            'kepemilikan_tanah' => 'required',
            'luas' => 'required',
            'kondisi_bangunan' => 'required',
            'luas_bangunan' => 'required',
            'kantor_pasar' => 'required',
            'parkiran' => 'required',
            'musola' => 'required',
            'jml_kios' => 'required',
            'jml_los' => 'required',
            'jml_toilet' => 'required',
            'jml_pedagang' => 'required',
            'sumber_pembiayaan' => 'required',
            'hasi_retibusi_tahunan' => 'required',
            'kontribusi_pades' => 'required',
            'kondisi_fisik_pasar' => 'required',
            'kendala' => 'required',
            'profil_persar' => 'max:10240',
            'perdes' => 'max:10240',
            'sk_pengelola' => 'max:10240',
        ]);


        if ($request->hasFile('profil_persar')) {
            Storage::delete($profilPasar->profil_persar);
            $valiadateData['profil_persar'] = $request->file('profil_persar')->store('post');
        }

        if ($request->hasFile('perdes')) {
            Storage::delete($profilPasar->perdes);
            $valiadateData['perdes'] = $request->file('perdes')->store('post');
        }

        if ($request->hasFile('sk_pengelola')) {
            Storage::delete($profilPasar->sk_pengelola);
            $valiadateData['sk_pengelola'] = $request->file('sk_pengelola')->store('post');
        }

        ProfilPasar::where('id', $profilPasar->id)->update($valiadateData);

        return redirect('/profil-pasar')->with('success', 'Laporan Berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilPasar $profilPasar)
    {
        if ($profilPasar->profil_persar) {
            Storage::delete($profilPasar->profil_persar);
        }

        if ($profilPasar->perdes) {
            Storage::delete($profilPasar->perdes);
        }

        if ($profilPasar->sk_pengelola) {
            Storage::delete($profilPasar->sk_pengelola);
        }

        $profilPasar->delete();

        return redirect()->back()->with('error', 'berhasil dihapus!');
    }


    public function laporanExcel()
    {
        $tgl = date('d_F_Y');
        return (new ProfilPasarx)->download("updating_profil_pasar_desa_$tgl.xlsx");
    }
}
