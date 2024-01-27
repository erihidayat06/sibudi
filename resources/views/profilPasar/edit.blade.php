@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Form Updateting Profil Pasar
                    </div>

                    <form action="/profil-pasar/{{ $profil->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Status Pengelola --}}
                        <label class="mt-3" for="status_pengelola">Status Pengelola</label>
                        <input type="text"
                            class="form-control @error('status_pengelola') is-invalid @enderror @error('status_pengelola') is-invalid @enderror"
                            name="status_pengelola" id="status_pengelola" value="{{ old('status_pengelola', $profil) }}">

                        @error('status_pengelola')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- no_perdes --}}
                        <label class="mt-3" for="no_perdes">Nomor Perdes</label>
                        <input type="number"
                            class="form-control @error('no_perdes') is-invalid @enderror @error('no_perdes') is-invalid @enderror"
                            name="no_perdes" id="no_perdes" value="{{ old('no_perdes', $profil) }}">

                        @error('no_perdes')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- no_sk --}}
                        <label class="mt-3" for="no_sk">Nomor SK Pengelola</label>
                        <input type="number"
                            class="form-control @error('no_sk') is-invalid @enderror @error('no_sk') is-invalid @enderror"
                            name="no_sk" id="no_sk" value="{{ old('no_sk', $profil) }}">

                        @error('no_sk')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- kepemilikan_tanah --}}
                        <label class="mt-3" for="kepemilikan_tanah">Kepemilikan Tanah</label>
                        <input type="number"
                            class="form-control @error('kepemilikan_tanah') is-invalid @enderror @error('kepemilikan_tanah') is-invalid @enderror"
                            name="kepemilikan_tanah" id="kepemilikan_tanah" value="{{ old('kepemilikan_tanah', $profil) }}">

                        @error('kepemilikan_tanah')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror


                        {{-- luas --}}
                        <label class="mt-3" for="luas">Luas</label>
                        <input type="number"
                            class="form-control @error('luas') is-invalid @enderror @error('luas') is-invalid @enderror"
                            name="luas" id="luas" value="{{ old('luas', $profil) }}">

                        @error('luas')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- kondisi_bangunan --}}
                        <label class="mt-3" for="kondisi_bangunan">Kondisi Bangunan</label>
                        <input type="number"
                            class="form-control @error('kondisi_bangunan') is-invalid @enderror @error('kondisi_bangunan') is-invalid @enderror"
                            name="kondisi_bangunan" id="kondisi_bangunan" value="{{ old('kondisi_bangunan', $profil) }}">

                        @error('kondisi_bangunan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- luas_bangunan --}}
                        <label class="mt-3" for="luas_bangunan">Luas Bangunan</label>
                        <input type="number"
                            class="form-control @error('luas_bangunan') is-invalid @enderror @error('luas_bangunan') is-invalid @enderror"
                            name="luas_bangunan" id="luas_bangunan" value="{{ old('luas_bangunan', $profil) }}">

                        @error('luas_bangunan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- kantor_pasar --}}
                        <label class="mt-3" for="kantor_pasar">Kantor Pasar Desa</label><br>
                        <div class="btn-group" role="group" aria-label="Small radio toggle button group">
                            <input type="radio" class="btn-check @error('kantor_pasar') is-invalid @enderror"
                                name="kantor_pasar" id="kantor_pasar1" value="Ada" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="kantor_pasar1">Ada</label>

                            <input type="radio" class="btn-check @error('kantor_pasar') is-invalid @enderror"
                                name="kantor_pasar" id="kantor_pasar2" value="tidak" autocomplete="off"
                                {{ old('kantor_pasar', $profil) == 'Tidak' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="kantor_pasar2">Tidak</label>

                        </div> <br>

                        @error('kantor_pasar')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- parkiran --}}
                        <label class="mt-3" for="parkiran">Memiliki Tempat Parkiran</label><br>
                        <div class="btn-group" role="group" aria-label="Small radio toggle button group">
                            <input type="radio" class="btn-check @error('parkiran') is-invalid @enderror"
                                name="parkiran" id="parkiran1" value="Ada" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="parkiran1">Ada</label>

                            <input type="radio" class="btn-check @error('parkiran') is-invalid @enderror"
                                name="parkiran" id="parkiran2" value="tidak" autocomplete="off"
                                {{ old('parkiran', $profil) == 'Tidak' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="parkiran2">Tidak</label>

                        </div> <br>

                        @error('parkiran')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- musola --}}
                        <label class="mt-3" for="musola">Memiliki Mushola</label><br>
                        <div class="btn-group" role="group" aria-label="Small radio toggle button group">
                            <input type="radio" class="btn-check @error('musola') is-invalid @enderror" name="musola"
                                id="musola1" value="Ada" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="musola1">Ada</label>

                            <input type="radio" class="btn-check @error('musola') is-invalid @enderror" name="musola"
                                id="musola2" value="tidak" autocomplete="off"
                                {{ old('musola', $profil) == 'Tidak' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="musola2">Tidak</label>

                        </div> <br>

                        @error('musola')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- jml_kios --}}
                        <label class="mt-3" for="jml_kios">Jumlah Kios</label>
                        <input type="number"
                            class="form-control @error('jml_kios') is-invalid @enderror @error('jml_kios') is-invalid @enderror"
                            name="jml_kios" id="jml_kios" value="{{ old('jml_kios', $profil) }}">

                        @error('jml_kios')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- jml_los --}}
                        <label class="mt-3" for="jml_los">Jumlah Los</label>
                        <input type="number"
                            class="form-control @error('jml_los') is-invalid @enderror @error('jml_los') is-invalid @enderror"
                            name="jml_los" id="jml_los" value="{{ old('jml_los', $profil) }}">

                        @error('jml_los')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- jml_toilet --}}
                        <label class="mt-3" for="jml_toilet">Jumlah toilet</label>
                        <input type="number"
                            class="form-control @error('jml_toilet') is-invalid @enderror @error('jml_toilet') is-invalid @enderror"
                            name="jml_toilet" id="jml_toilet" value="{{ old('jml_toilet', $profil) }}">

                        @error('jml_toilet')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- jml_pedagang --}}
                        <label class="mt-3" for="jml_pedagang">Jumlah Pedagang</label>
                        <input type="number"
                            class="form-control @error('jml_pedagang') is-invalid @enderror @error('jml_pedagang') is-invalid @enderror"
                            name="jml_pedagang" id="jml_pedagang" value="{{ old('jml_pedagang', $profil) }}">

                        @error('jml_pedagang')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- sumber_pembiayaan --}}
                        <label class="mt-3" for="sumber_pembiayaan">Sumber Pembiayaan</label>
                        <input type="number"
                            class="form-control @error('sumber_pembiayaan') is-invalid @enderror @error('sumber_pembiayaan') is-invalid @enderror"
                            name="sumber_pembiayaan" id="sumber_pembiayaan"
                            value="{{ old('sumber_pembiayaan', $profil) }}">

                        @error('sumber_pembiayaan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- hasi_retibusi_tahunan --}}
                        <label class="mt-3" for="hasi_retibusi_tahunan">Hasil Retribusi tahunan</label>
                        <input type="number"
                            class="form-control @error('hasi_retibusi_tahunan') is-invalid @enderror @error('hasi_retibusi_tahunan') is-invalid @enderror"
                            name="hasi_retibusi_tahunan" id="hasi_retibusi_tahunan"
                            value="{{ old('hasi_retibusi_tahunan', $profil) }}">

                        @error('hasi_retibusi_tahunan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- kontribusi_pades --}}
                        <label class="mt-3" for="kontribusi_pades">Kontribusi PADes</label>
                        <input type="number"
                            class="form-control @error('kontribusi_pades') is-invalid @enderror @error('kontribusi_pades') is-invalid @enderror"
                            name="kontribusi_pades" id="kontribusi_pades"
                            value="{{ old('kontribusi_pades', $profil) }}">

                        @error('kontribusi_pades')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- kondisi_fisik_pasar --}}
                        <label class="mt-3" for="kondisi_fisik_pasar">Kondisi Fisik Pasar Desa</label>
                        <input type="number"
                            class="form-control @error('kondisi_fisik_pasar') is-invalid @enderror @error('kondisi_fisik_pasar') is-invalid @enderror"
                            name="kondisi_fisik_pasar" id="kondisi_fisik_pasar"
                            value="{{ old('kondisi_fisik_pasar', $profil) }}">

                        @error('kondisi_fisik_pasar')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- kendala --}}
                        <label class="mt-3" for="kendala">Kendala / Permasalahan</label>
                        <input type="text"
                            class="form-control @error('kendala') is-invalid @enderror @error('kendala') is-invalid @enderror"
                            name="kendala" id="kendala" value="{{ old('kendala', $profil) }}">

                        @error('kendala')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror


                        {{-- profil_persar --}}

                        <div class="mb-3 mt-3">
                            <label for="profil_persar" class="form-label">Profil Pasar Desa</label>
                            @if (old('profil_persar', $profil))
                                <br><a
                                    href="{{ asset('storage/' . old('profil_persar', $profil)) }}">{{ old('profil_persar', $profil) }}</a>
                            @endif
                            <input class="form-control @error('profil_persar') is-invalid @enderror form-control-sm"
                                id="profil_persar" type="file" name="profil_persar">
                        </div>

                        @error('profil_persar')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror


                        {{-- perdes --}}

                        <div class="mb-3 mt-3">
                            <label for="perdes" class="form-label">Perdes Pengelolaan Pasar Desa</label>
                            @if (old('perdes', $profil))
                                <br><a
                                    href="{{ asset('storage/' . old('perdes', $profil)) }}">{{ old('perdes', $profil) }}</a>
                            @endif
                            <input class="form-control @error('perdes') is-invalid @enderror form-control-sm"
                                id="perdes" type="file" name="perdes">
                        </div>

                        @error('perdes')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror


                        {{-- sk_pengelola --}}

                        <div class="mb-3 mt-3">
                            <label for="sk_pengelola" class="form-label">SK Pengelola</label>
                            @if (old('sk_pengelola', $profil))
                                <br><a
                                    href="{{ asset('storage/' . old('sk_pengelola', $profil)) }}">{{ old('sk_pengelola', $profil) }}</a>
                            @endif
                            <input class="form-control @error('sk_pengelola') is-invalid @enderror form-control-sm"
                                id="sk_pengelola" type="file" name="sk_pengelola">
                        </div>

                        @error('sk_pengelola')
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
