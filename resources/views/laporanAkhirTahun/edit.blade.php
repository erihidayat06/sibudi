@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Edit Laporan Pertanggungjawaban
                    </div>

                    <form action="/laporan-akhir/{{ $laporan->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Kecamatan --}}
                        <label class="mt-3" for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror disabled"
                            name="kecamatan" id="kecamatan" value="{{ $laporan->kecamatan ?? auth()->user()->kecamatan }}">
                        @error('kecamatan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Desa --}}
                        <label class="mt-3" for="desa">Desa</label>
                        <input type="text" class="form-control @error('desa') is-invalid @enderror disabled"
                            name="desa" id="desa" value="{{ $laporan->desa ?? auth()->user()->desa }}">
                        @error('desa')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Pendapatan/Omset --}}
                        <label class="mt-3" for="unit_usaha">Pendapatan/Omset Satu Tahun</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="unit_usaha" id="unit_usaha1"
                                value="Pendapatan" {{ $laporan->unit_usaha == 'Pendapatan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="unit_usaha1">Pendapatan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="unit_usaha" id="unit_usaha2"
                                value="Omset satu tahun" {{ $laporan->unit_usaha == 'Omset satu tahun' ? 'checked' : '' }}>
                            <label class="form-check-label" for="unit_usaha2">Omset satu tahun</label>
                        </div>
                        @error('unit_usaha')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Capaian --}}
                        <label class="mt-3" for="capaian">Capaian Satu Tahun</label><br>
                        <div class="btn-group" role="group" aria-label="Small radio toggle button group">
                            <input type="radio" class="btn-check @error('capaian') is-invalid @enderror" name="capaian"
                                id="capaian1" value="untung" {{ $laporan->capaian == 'untung' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="capaian1">Untung</label>

                            <input type="radio" class="btn-check @error('capaian') is-invalid @enderror" name="capaian"
                                id="capaian2" value="rugi" {{ $laporan->capaian == 'rugi' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="capaian2">Rugi</label>
                        </div><br>
                        @error('capaian')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Nilai --}}
                        <label class="mt-3" for="nilai">Nilai</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nilai">Rp</span>
                            <input type="number" class="form-control @error('nilai') is-invalid @enderror"
                                value="{{ $laporan->nilai ?? old('nilai') }}" name="nilai" id="nilai"
                                aria-describedby="nilai">
                        </div>
                        @error('nilai')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- PADes --}}
                        <label class="mt-3" for="pades">PADes</label>
                        <input type="number" class="form-control @error('pades') is-invalid @enderror"
                            value="{{ $laporan->pades ?? old('pades') }}" name="pades" id="pades">
                        @error('pades')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Nilai Aset Akhir Tahun --}}
                        <label class="mt-3" for="nilai_aset">Nilai Aset Akhir Tahun</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nilai_aset">Rp</span>
                            <input type="number" class="form-control @error('nilai_aset') is-invalid @enderror"
                                value="{{ $laporan->nilai_aset ?? old('nilai_aset') }}" name="nilai_aset" id="nilai_aset"
                                aria-describedby="nilai_aset">
                        </div>
                        @error('nilai_aset')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Laporan Keuangan lengkap --}}
                        <div class="mb-3 mt-3">
                            <label for="surat" class="form-label">Laporan Keuangan Lengkap</label>
                            <input class="form-control @error('surat') is-invalid @enderror form-control-sm"
                                id="surat" type="file" name="surat">
                            @if ($laporan->surat)
                                <small class="form-text">File saat ini: <a
                                        href="{{ asset('storage/' . $laporan->surat) }}" target="_blank">Lihat
                                        File</a></small>
                            @endif
                        </div>
                        @error('surat')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="card-footer">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
