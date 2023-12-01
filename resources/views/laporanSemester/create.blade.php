@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Form Laporan Semester
                    </div>

                    <form action="/laporan-semester" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Kecamatan --}}
                        <label class="mt-3" for="kecamatan">kecamatan</label>
                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror disabled"
                            name="kecamatan" id="kecamatan" value="{{ auth()->user()->kecamatan }}">
                        @error('kecamatan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- desa --}}
                        <label class="mt-3" for="desa">Desa</label>
                        <input type="text" class="form-control @error('desa') is-invalid @enderror disabled"
                            name="desa" id="desa" value="{{ auth()->user()->desa }}">
                        @error('desa')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- capaian --}}
                        <label class="mt-3" for="capaian">capaian</label><br>
                        <div class="btn-group" role="group" aria-label="Small radio toggle button group">
                            <input type="radio" class="btn-check @error('capaian') is-invalid @enderror" name="capaian"
                                id="capaian1" value="untung" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="capaian1">Untung</label>

                            <input type="radio" class="btn-check @error('capian') is-invalid @enderror" name="capaian"
                                id="capaian2" value="rugi" autocomplete="off"
                                {{ old('capaian') == 'rugi' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="capaian2">Rugi</label>

                        </div> <br>

                        @error('capian')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nilai --}}
                        <label class="mt-3" for="nilai">nilai</label>
                        <input type="number" class="form-control @error('nilai') is-invalid @enderror" name="nilai"
                            id="nilai" value="{{ old('nilai') }}">
                        @error('nilai')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Permasalahan --}}
                        <label class="mt-3" for="permasalahan">Permasalahan</label>
                        <textarea class="form-control @error('permasalahan') is-invalid @enderror" name="permasalahan" id="permasalahan"
                            cols="20" rows="5">{{ old('permasalahan') }}</textarea>

                        @error('permasalahan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- rencana --}}
                        <label class="mt-3" for="rencana">rencana</label><br>
                        <div class="btn-group" role="group" aria-label="Small radio toggle button group">
                            <input type="radio" class="btn-check" name="rencana" id="rencana1" value="ada"
                                autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="rencana1">Ada</label>

                            <input type="radio" class="btn-check @error('rencana') is-invalid @enderror" name="rencana"
                                id="rencana2" value="tidak" autocomplete="off"
                                {{ old('rencana') == 'tidak' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="rencana2">Tidak</label>

                        </div> <br>

                        @error('rencana')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nilai2 --}}
                        <label class="mt-3" for="nilai2">nilai2</label>
                        <input type="number" class="form-control @error('nilai2') is-invalid @enderror"
                            value="{{ old('nilai2') }}" name="nilai2" id="nilai2">
                        @error('nilai2')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- unit usaha --}}
                        <label class="mt-3" for="unit_usaha">unit_usaha</label>
                        <input type="text" class="form-control @error('unit_usaha') is-invalid @enderror"
                            name="unit_usaha" id="unit_usaha" value="{{ old('unit_usaha') }}">
                        @error('unit_usaha')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- surat --}}

                        <div class="mb-3 mt-3">
                            <label for="surat" class="form-label">Surat</label>
                            <input class="form-control @error('surat') is-invalid @enderror form-control-sm"
                                id="surat" type="file" accept=".pdf" name="surat">
                        </div>

                        @error('surat')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- laporan semester --}}

                        <div class="mb-3 mt-3">
                            <label for="laporan_semester" class="form-label">Laporan Semester</label>
                            <input class="form-control @error('laporan_semester') is-invalid @enderror form-control-sm"
                                id="laporan_semester" type="file" accept=".pdf" name="laporan_semester">
                        </div>

                        @error('laporan_semester')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- file rancangan --}}

                        <div class="mb-3 mt-3">
                            <label for="file_rancangan" class="form-label">File Rancangan</label>
                            <input class="form-control @error('file_rancangan') is-invalid @enderror form-control-sm"
                                id="file_rancangan" type="file" accept=".pdf" name="file_rancangan">
                        </div>
                        @error('file_rancangan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror


                        <div class="card-footer">
                            <button class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
