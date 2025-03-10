@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Form Laporan Pertanggung jawaban
                    </div>

                    <form action="/laporan-akhir" method="POST" enctype="multipart/form-data">
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


                        {{-- unit_usaha --}}
                        <label class="mt-3" for="unit_usaha">Pendapatan / Omset satu tahun</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="unit_usaha">Rp</span>
                            <input type="number" class="form-control @error('unit_usaha') is-invalid @enderror"
                                value="{{ old('unit_usaha') }}" name="unit_usaha" id="unit_usaha"
                                aria-describedby="unit_usaha">
                        </div>


                        @error('unit_usaha')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- capaian --}}
                        <label class="mt-3" for="capaian">Capaian satu tahun</label><br>
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
                        <label class="mt-3" for="nilai">Nilai</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nilai">Rp</span>
                            <input type="number" class="form-control @error('nilai') is-invalid @enderror"
                                value="{{ old('nilai') }}" name="nilai" id="nilai" aria-describedby="nilai">
                        </div>

                        @error('nilai')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- pades --}}
                        <label class="mt-3" for="pades">PADes</label>
                        <input type="number" class="form-control @error('pades') is-invalid @enderror"
                            value="{{ old('pades') }}" name="pades" id="pades">
                        @error('pades')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nilai_aset --}}
                        <label class="mt-3" for="nilai_aset">Nilai Aset Akhir Tahun</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nilai_aset">Rp</span>
                            <input type="number" class="form-control @error('nilai_aset') is-invalid @enderror"
                                value="{{ old('nilai_aset') }}" name="nilai_aset" id="nilai_aset"
                                aria-describedby="nilai_aset">
                        </div>

                        @error('nilai_aset')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Permasalahan --}}
                        {{-- <label class="mt-3" for="permasalahan">Permasalahan yang Mempengaruhi Usaha</label>

                        <textarea class="form-control @error('permasalahan') is-invalid @enderror" name="permasalahan" id="permasalahan"
                            cols="20" rows="5">{{ old('permasalahan') }}</textarea>
                        @error('permasalahan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>

                        @enderror

                        {{-- unit usaha --}}
                        {{-- <label class="mt-3" for="unit_usaha">Unit Usaha yang Akan di Jalankan</label>
                        @foreach ($unit_usaha as $unit)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $unit }}"
                                    name="unit_usaha[]" id="{{ $unit }}">
                                <label class="form-check-label" for="{{ $unit }}">
                                    {{ $unit }}
                                </label>
                            </div>
                        @endforeach



                        @error('unit_usaha')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror


                        <label class="mt-3" for="rencana">Rencana Penambahan Modal</label><br>

                        <div class="btn-group" role="group" aria-label="Small radio toggle button group">
                            <input type="radio" class="btn-check @error('rencana') is-invalid @enderror" name="rencana"
                                id="rencana1" value="ada" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="rencana1">Ada</label>

                            <input type="radio" class="btn-check @error('rencana') is-invalid @enderror" name="rencana"
                                id="rencana2" value="tidak" autocomplete="off"
                                {{ old('rencana') == 'tidak' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="rencana2">Tidak</label>

                        </div> <br>

                        @error('rencana')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}


                        {{-- <label class="mt-3" for="nilai2">nilai Pengajuan</label>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nilai2">Rp</span>
                            <input type="number" class="form-control @error('nilai2') is-invalid @enderror"
                                value="{{ old('nilai2') }}" name="nilai2" id="nilai2" aria-describedby="nilai2">
                        </div>
                        @error('nilai2')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}



                        {{-- <label class="mt-3" for="unit_usaha_permodalan">Unit Usaha yang dikembangkan dengan

                            permodalan</label>
                        <input type="text" class="form-control @error('unit_usaha_permodalan') is-invalid @enderror"
                            value="{{ old('unit_usaha_permodalan') }}" name="unit_usaha_permodalan"
                            id="unit_usaha_permodalan">
                        @error('unit_usaha_permodalan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}


                        {{-- surat --}}
                        <div class="mb-3 mt-3">
                            <label for="surat" class="form-label">Laporan Keuangan</label>
                            <input class="form-control @error('surat') is-invalid @enderror form-control-sm"
                                id="surat" type="file" name="surat">
                        </div>



                        {{-- laporan akhir --}}
                        <div class="mb-3 mt-3">
                            <label for="laporan_akhir" class="form-label">Laporan Penanggung Jawaban/label>
                                <input class="form-control @error('laporan_akhir') is-invalid @enderror form-control-sm"
                                    id="laporan_akhir" type="file" name="laporan_akhir">
                        </div>

                        @error('laporan_akhir')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Program Kerja --}}
                        <div class="mb-3 mt-3">
                            <label for="program_kerja" class="form-label">Program Kerja yang di Sahkan</label>
                            <input class="form-control @error('program_kerja') is-invalid @enderror form-control-sm"
                                id="program_kerja" type="file" name="program_kerja">
                        </div>
                        @error('program_kerja')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Berita Acara --}}
                        <div class="mb-3 mt-3">
                            <label for="berita_acara" class="form-label">Berita Acara Musdes</label>
                            <input class="form-control @error('berita_acara') is-invalid @enderror form-control-sm"
                                id="berita_acara" type="file" name="berita_acara">
                        </div>
                        @error('berita_acara')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Bukti Setoran --}}
                        <div class="mb-3 mt-3">
                            <label for="bukti_setor" class="form-label">Bukti Setor PADes</label>
                            <input class="form-control @error('bukti_setor') is-invalid @enderror form-control-sm"
                                id="bukti_setor" type="file" name="bukti_setor">
                        </div>
                        @error('bukti_setor')
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
