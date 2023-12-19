<?php

namespace App\Http\Controllers;

use App\Exports\LaporanSemesters;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\LaporanSemester;
use Illuminate\Support\Facades\Storage;

class LaporanSemesterController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (bukaFitur(1)) {
            return view('bukaFitur.halamanTutup');
        }

        $class = LaporanSemester::latest()->where('user_id', auth()->user()->id);
        $data = $class->get();
        return view('laporanSemester.index', [
            'laporans' => $data,
        ]);
    }


    public function admin()
    {

        return view('laporanSemester.admin', [
            'laporans' => LaporanSemester::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (bukaFitur(1)) {
            return view('bukaFitur.halamanTutup');
        }

        return view('laporanSemester.create', [
            'kecamatans' => app('kecamatan')
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
            'nilai' => '',
            'permasalahan' => 'required',
            'rencana' => 'required',
            'nilai2' => '',
            'unit_usaha' => '',
            'surat' => 'required|max:10240',
            'laporan_semester' => 'required|max:10240',
            'file_rancangan' => 'required|max:10240',

        ]);

        $validateData['user_id'] = auth()->user()->id;


        foreach (app('kecamatan') as $kec) {
            if ($request->kecamatan == $kec['id']) {
                $validateData['kecamatan'] = $kec['name'];
            }
        }


        $validateData['surat'] = $request->file('surat')->store('post');
        $validateData['laporan_semester'] = $request->file('laporan_semester')->store('post');
        $validateData['file_rancangan'] = $request->file('file_rancangan')->store('post');




        LaporanSemester::create($validateData);
        return redirect('/laporan-semester')->with('success', 'berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanSemester $laporanSemester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanSemester $laporanSemester)
    {
        if (bukaFitur(1)) {
            return view('bukaFitur.halamanTutup');
        }

        return view('laporanSemester.edit', [
            'laporan' => $laporanSemester,
            'kecamatans' => app('kecamatan')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanSemester $laporanSemester)
    {

        $validateData = $request->validate([
            'kecamatan' => 'required',
            'desa' => 'required',
            'capaian' => 'required',
            'nilai' => '',
            'permasalahan' => 'required',
            'rencana' => 'required',
            'nilai2' => '',
            'unit_usaha' => '',
            'surat' => '',
            'laporan_semester' => '',
            'file_rancangan' => '',
        ]);

        foreach (app('kecamatan') as $kec) {
            if ($request->kecamatan == $kec['id']) {
                $validateData['kecamatan'] = $kec['name'];
            }
        }

        if ($request->hasFile('surat')) {
            // Update file PDF jika ada yang diunggah
            Storage::delete($laporanSemester->surat);
            $validateData['surat'] = $request->file('surat')->store('post');
        }

        if ($request->hasFile('laporan_semester')) {
            // Update file PDF jika ada yang diunggah
            Storage::delete($laporanSemester->laporan_semester);
            $validateData['laporan_semester'] = $request->file('laporan_semester')->store('post');
        }
        if ($request->hasFile('file_rancangan')) {
            // Update file PDF jika ada yang diunggah
            Storage::delete($laporanSemester->file_rancangan);
            $validateData['file_rancangan'] = $request->file('file_rancangan')->store('post');
        }


        LaporanSemester::where('id', $laporanSemester->id)->update($validateData);
        return redirect('/laporan-semester')->with('success', 'berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanSemester $laporanSemester)
    {
        Storage::delete($laporanSemester->surat);

        Storage::delete($laporanSemester->laporan_semester);

        Storage::delete($laporanSemester->file_rancangan);


        $laporanSemester->delete();

        return redirect('/laporan-semester')->with('success', 'berhasil dihapus!');
    }

    public function laporanExcel()
    {
        return (new LaporanSemesters)->download('laporan-semester.xlsx');
    }
}
