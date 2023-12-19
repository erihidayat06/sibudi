@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Form Kanal Persuratan
                    </div>

                    <form action="/kanal-surat" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Judul Surat --}}
                        <label class="mt-3" for="judul_surat">Judul Surat</label>
                        <input type="text"
                            class="form-control @error('judul_surat') is-invalid @enderror @error('judul_surat') is-invalid @enderror"
                            name="judul_surat" id="judul_surat" value="{{ old('judul_surat') }}">

                        @error('judul_surat')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Dari --}}
                        <label class="mt-3" for="dari">Dari</label>
                        <input type="text"
                            class="form-control @error('dari') is-invalid @enderror @error('dari') is-invalid @enderror"
                            name="dari" id="dari" value="{{ old('dari') }}">

                        @error('dari')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Kepada --}}
                        <label class="mt-3" for="kepada">Kepada</label>
                        <input type="text"
                            class="form-control @error('kepada') is-invalid @enderror @error('kepada') is-invalid @enderror"
                            name="kepada" id="kepada" value="{{ old('kepada') }}">

                        @error('kepada')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Tembuasan --}}
                        <label class="mt-3" for="tembusan">Tembusan</label>
                        <input type="text"
                            class="form-control @error('tembusan') is-invalid @enderror @error('tembusan') is-invalid @enderror"
                            name="tembusan" id="tembusan" value="{{ old('tembusan') }}">

                        @error('tembusan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Isi Ringkasan --}}
                        {{-- Isi Ringkasan --}}
                        <label class="mt-3" for="isi_ringkasan">Isi Ringkasan</label>
                        <textarea
                            class="form-control @error('isi_ringkasan') is-invalid @enderror @error('isi_ringkasan') is-invalid @enderror"
                            name="isi_ringkasan" id="isi_ringkasan" cols="30" rows="5">{{ old('isi_ringkasan') }}</textarea>
                        @error('isi_ringkasan')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror


                        {{-- File --}}

                        <div class="mb-3 mt-3">
                            <label for="file" class="form-label">File</label>
                            <input class="form-control @error('file') is-invalid @enderror form-control-sm" id="file"
                                type="file" name="file">
                        </div>

                        @error('file')
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
