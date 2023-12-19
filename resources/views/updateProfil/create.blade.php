@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Form Update Profil BUMDes
                    </div>

                    <form action="/update-profil" method="POST" enctype="multipart/form-data">
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

                        {{-- nomor_perdes --}}
                        <label class="mt-3" for="nomor_perdes">Nomor Perdes Pendiri BUMDesa</label>
                        <input type="text" class="form-control @error('nomor_perdes') is-invalid @enderror "
                            name="nomor_perdes" id="nomor_perdes" value="{{ old('nomor_perdes') }}">

                        @error('nomor_perdes')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nomor_sk --}}
                        <label class="mt-3" for="nomor_sk">Nomor SK Pengelola</label>
                        <input type="text" class="form-control @error('nomor_sk') is-invalid @enderror " name="nomor_sk"
                            id="nomor_sk" value="{{ old('nomor_sk') }}">

                        @error('nomor_sk')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nomor_badan --}}
                        <label class="mt-3" for="nomor_badan">Nomor Badan Hukum</label>
                        <input type="text" class="form-control @error('nomor_badan') is-invalid @enderror "
                            name="nomor_badan" id="nomor_badan" value="{{ old('nomor_badan') }}">

                        @error('nomor_badan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nama_direktur --}}
                        <label class="mt-3" for="nama_direktur">Nama Direktur</label>
                        <input type="text" class="form-control @error('nama_direktur') is-invalid @enderror "
                            name="nama_direktur" id="nama_direktur" value="{{ old('nama_direktur') }}">

                        @error('nama_direktur')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nomor_hp_direktur --}}
                        <label class="mt-3" for="nomor_hp_direktur">Nomor Hp</label>
                        <input type="number" class="form-control @error('nomor_hp_direktur') is-invalid @enderror"
                            name="nomor_hp_direktur" id="nomor_hp_direktur" value="{{ old('nomor_hp_direktur') }}">

                        @error('nomor_hp_direktur')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nama_sekertaris --}}
                        <label class="mt-3" for="nama_sekertaris">Nama Sekertaris</label>
                        <input type="text" class="form-control @error('nama_sekertaris') is-invalid @enderror "
                            name="nama_sekertaris" id="nama_sekertaris" value="{{ old('nama_sekertaris') }}">

                        @error('nama_sekertaris')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nomor_hp_sekertaris --}}
                        <label class="mt-3" for="nomor_hp_sekertaris">Nomor HP</label>
                        <input type="number" class="form-control @error('nomor_hp_sekertaris') is-invalid @enderror "
                            name="nomor_hp_sekertaris" id="nomor_hp_sekertaris" value="{{ old('nomor_hp_sekertaris') }}">

                        @error('nomor_hp_sekertaris')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nama_bendahara --}}
                        <label class="mt-3" for="nama_bendahara">Nama Bendahara </label>
                        <input type="text" class="form-control @error('nama_bendahara') is-invalid @enderror "
                            name="nama_bendahara" id="nama_bendahara" value="{{ old('nama_bendahara') }}">

                        @error('nama_bendahara')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nomor_hp_bendahara --}}
                        <label class="mt-3" for="nomor_hp_bendahara">Nomor HP</label>
                        <input type="number" class="form-control @error('nomor_hp_bendahara') is-invalid @enderror "
                            name="nomor_hp_bendahara" id="nomor_hp_bendahara" value="{{ old('nomor_hp_bendahara') }}">

                        @error('nomor_hp_bendahara')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nama_pengawas --}}
                        <label class="mt-3" for="nama_pengawas">Nama Pengawas </label>
                        <input type="text" class="form-control @error('nama_pengawas') is-invalid @enderror "
                            name="nama_pengawas" id="nama_pengawas" value="{{ old('nama_pengawas') }}">

                        @error('nama_pengawas')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- nama_penasehat --}}
                        <label class="mt-3" for="nama_penasehat">Nama Penasehat</label>
                        <input type="text" class="form-control @error('nama_penasehat') is-invalid @enderror"
                            name="nama_penasehat" id="nama_penasehat" value="{{ old('nama_penasehat') }}">

                        @error('nama_penasehat')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- bidang_usaha_dijalankan --}}

                        <div class="form-check mt-3">
                            <input class="form-check-input @error('bidang_usaha_dijalankan') is-invalid @enderror"
                                type="checkbox" value="1" id="bidang_usaha_dijalankan"
                                name="bidang_usaha_dijalankan"
                                {{ old('bidang_usaha_dijalankan') == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="bidang_usaha_dijalankan">
                                Bidang Usaha yang dijalankan
                            </label>
                        </div>

                        @error('bidang_usaha_dijalankan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- bidang_usaha_utama --}}
                        <label class="mt-3" for="bidang_usaha_utama">Bidang Usaha Utama</label>
                        <input type="text" class="form-control @error('bidang_usaha_utama') is-invalid @enderror"
                            name="bidang_usaha_utama" id="bidang_usaha_utama" value="{{ old('bidang_usaha_utama') }}">

                        @error('bidang_usaha_utama')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror


                        {{-- perdes_pendiri --}}
                        <div class="mb-3 mt-3">
                            <label for="perdes_pendiri" class="form-label">Perdes Pendirian BUMDesa</label>
                            <input class="form-control @error('perdes_pendiri') is-invalid @enderror form-control-sm"
                                id="perdes_pendiri" type="file" name="perdes_pendiri">
                        </div>

                        @error('perdes_pendiri')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- sk_pengelola --}}
                        <div class="mb-3 mt-3">
                            <label for="sk_pengelola" class="form-label">SK Pengelola</label>
                            <input class="form-control @error('sk_pengelola') is-invalid @enderror form-control-sm"
                                id="sk_pengelola" type="file" name="sk_pengelola">
                        </div>

                        @error('sk_pengelola')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- setifikat_badan --}}
                        <div class="mb-3 mt-3">
                            <label for="setifikat_badan" class="form-label">Sertifikat Badan Hukum</label>
                            <input class="form-control @error('setifikat_badan') is-invalid @enderror form-control-sm"
                                id="setifikat_badan" type="file" name="setifikat_badan">
                        </div>

                        @error('setifikat_badan')
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
