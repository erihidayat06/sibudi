@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Form Kanal Pengaduan
                    </div>

                    <form action="/kanal-pengaduan" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label class="mt-3" for="judul">Judul Aduan</label>
                        <input type="text"
                            class="form-control @error('judul') is-invalid @enderror @error('judul') is-invalid @enderror"
                            name="judul" id="judul" value="{{ old('judul') }}">

                        @error('judul')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- deskripsi --}}
                        <label class="mt-3" for="deskripsi">deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" cols="20"
                            rows="5">{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- keadaan_terjadi --}}
                        <label class="mt-3" for="keadaan_terjadi">Keadaan yang Terjadi</label>
                        <textarea class="form-control @error('keadaan_terjadi') is-invalid @enderror" name="keadaan_terjadi"
                            id="keadaan_terjadi" cols="20" rows="5">{{ old('keadaan_terjadi') }}</textarea>

                        @error('keadaan_terjadi')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- keadaan_harapan --}}
                        <label class="mt-3" for="keadaan_harapan">Keadaan yang harapkan</label>
                        <textarea class="form-control @error('keadaan_harapan') is-invalid @enderror" name="keadaan_harapan"
                            id="keadaan_harapan" cols="20" rows="5">{{ old('keadaan_harapan') }}</textarea>

                        @error('keadaan_harapan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror



                        {{-- surat_aduan --}}

                        <div class="mb-3 mt-3">
                            <label for="surat_aduan" class="form-label">Surat Aduan</label>
                            <input class="form-control @error('surat_aduan') is-invalid @enderror form-control-sm"
                                id="surat_aduan" type="file" name="surat_aduan">
                        </div>

                        @error('surat_aduan')
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
