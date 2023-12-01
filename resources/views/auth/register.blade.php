@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3 mt-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Kecamatan') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select @error('kecamatan') is-invalid @enderror"
                                        aria-label="Default select example" id="kecamatan" name="kecamatan">
                                        <option selected>Pilih Kecamatan</option>
                                        @foreach ($kecamatans as $kecamatan)
                                            <option value="{{ $kecamatan['id'] }}">{{ $kecamatan['name'] }}</option>
                                        @endforeach
                                    </select>

                                    @error('kecamatan')
                                        <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Desa') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select @error('desa') is-invalid @enderror"
                                        aria-label="Default select example" id="desa" name="desa">
                                        <option selected>Pilih Desa</option>
                                    </select>

                                    @error('desa')
                                        <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('ID Desa') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('id_desa') is-invalid @enderror"
                                        name="id_desa" value="{{ old('id_desa') }}">

                                    @error('id_desa')
                                        <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" value="password" hidden>




                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password" value="password" hidden>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card">
        <div class="card-body">
            <h5 class="card-title">User Desa</h5>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Import Excel
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post" action="/register/import-excel" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            </div>
                            <div class="modal-body">

                                <label>Pilih file excel</label>
                                <div class="form-group">
                                    <input type="file" name="file" required="required">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table with stripped rows -->
            <div class="table-responsive">
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Desa</th>
                            <th scope="col">ID Desa</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $user->kecamatan }}</td>
                                <td>{{ $user->desa }}</td>
                                <td>{{ $user->id_desa }}</td>
                                <td>
                                    <div class="d-flex justify-content-start">
                                        <a href="/kanal-pengaduan/{{ $user->id }}/edit"
                                            class="btn btn-sm btn-success m-1"><i class="bi bi-pencil-square"></i></a>


                                        <form action="/register/{{ $user->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm m-1"
                                                onclick="return confirm('Apakah Mau Di hapus?')"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
@endsection
