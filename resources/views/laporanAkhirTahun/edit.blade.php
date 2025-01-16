@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Form Laporan Akhir Tahun
                    </div>

                    <form action="/laporan-akhir/{{ $laporan->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Kecamatan --}}
                        <label class="mt-3" for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"
                            id="kecamatan" value="{{ old('kecamatan', auth()->user()->kecamatan) }}" readonly>
                        @error('kecamatan')
                            <div class="invalid-feedback" style="font-size: 12px;">{{ $message }}</div>
                        @enderror

                        {{-- Desa --}}
                        <label class="mt-3" for="desa">Desa</label>
                        <input type="text" class="form-control @error('desa') is-invalid @enderror" name="desa"
                            id="desa" value="{{ old('desa', auth()->user()->desa) }}" readonly>
                        @error('desa')
                            <div class="invalid-feedback" style="font-size: 12px;">{{ $message }}</div>
                        @enderror

                        {{-- unit_usaha --}}
                        <label class="mt-3" for="unit_usaha">Pendapatan / Omset satu tahun</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="unit_usaha">Rp</span>
                            <input type="number" class="form-control @error('unit_usaha') is-invalid @enderror"
                                value="{{ old('unit_usaha', $laporan) }}" name="unit_usaha" id="unit_usaha"
                                aria-describedby="unit_usaha">
                        </div>

                        {{-- Capaian --}}
                        <label class="mt-3" for="capaian">Capaian Satu Tahun</label><br>
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="capaian" id="capaian_untung" value="untung"
                                {{ old('capaian', $laporan->capaian) == 'untung' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="capaian_untung">Untung</label>

                            <input type="radio" class="btn-check" name="capaian" id="capaian_rugi" value="rugi"
                                {{ old('capaian', $laporan->capaian) == 'rugi' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="capaian_rugi">Rugi</label>
                        </div>
                        @error('capaian')
                            <div class="invalid-feedback" style="font-size: 12px;">{{ $message }}</div>
                        @enderror
                        <br>

                        {{-- Nilai --}}
                        <label class="mt-3" for="nilai">Nilai</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control @error('nilai') is-invalid @enderror" name="nilai"
                                id="nilai" value="{{ old('nilai', $laporan->nilai) }}">
                        </div>
                        @error('nilai')
                            <div class="invalid-feedback" style="font-size: 12px;">{{ $message }}</div>
                        @enderror

                        {{-- PADes --}}
                        <label class="mt-3" for="pades">PADes</label>
                        <input type="number" class="form-control @error('pades') is-invalid @enderror" name="pades"
                            id="pades" value="{{ old('pades', $laporan->pades) }}">
                        @error('pades')
                            <div class="invalid-feedback" style="font-size: 12px;">{{ $message }}</div>
                        @enderror

                        {{-- Nilai Aset --}}
                        <label class="mt-3" for="nilai_aset">Nilai Aset Akhir Tahun</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control @error('nilai_aset') is-invalid @enderror"
                                name="nilai_aset" id="nilai_aset" value="{{ old('nilai_aset', $laporan->nilai_aset) }}">
                        </div>
                        @error('nilai_aset')
                            <div class="invalid-feedback" style="font-size: 12px;">{{ $message }}</div>
                        @enderror

                        {{-- Uploads --}}
                        @php
                            $fileFields = [
                                'surat' => 'Surat',
                                'laporan_akhir' => 'Laporan Akhir Tahun',
                                'program_kerja' => 'Program Kerja',
                                'berita_acara' => 'Berita Acara',
                                'bukti_setor' => 'Bukti Setor',
                            ];
                        @endphp

                        @foreach ($fileFields as $field => $label)
                            <div class="mb-3">
                                <label for="{{ $field }}" class="form-label">{{ $label }}</label><br>
                                @if ($laporan->$field)
                                    <a href="{{ asset('storage/' . $laporan->$field) }}" target="_blank">
                                        {{ $laporan->$field }}
                                    </a>
                                @endif
                                <input class="form-control @error($field) is-invalid @enderror" id="{{ $field }}"
                                    type="file" name="{{ $field }}">
                                @error($field)
                                    <div class="invalid-feedback" style="font-size: 12px;">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach

                        <div class="card-footer">
                            <button class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
