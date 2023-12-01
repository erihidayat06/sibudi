@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kanal Pengaduan</h5>

                        <a href="/kanal-pengaduan/create" class="btn btn-sm btn-primary mt-3 mb-3">Tambah Lopran</a>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Deskripsi_singkat</th>
                                        <th scope="col">Keadaan_yang_terjadi</th>
                                        <th scope="col">Keadaan_yang_diharapkan</th>
                                        <th scope="col">Surat_aduan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($kanals as $kanal)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ date('d_F_Y', strtotime($kanal->created_at)) }}</td>
                                            <td>{{ $kanal->judul }}</td>
                                            <td>{{ $kanal->deskripsi }}</td>
                                            <td>{{ $kanal->keadaan_terjadi }}</td>
                                            <td>{{ $kanal->keadaan_harapan }}</td>

                                            <td><a href="{{ asset('storage/' . $kanal->surat_aduan) }}"
                                                    target="_blank">Surat</a>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="/kanal-pengaduan/{{ $kanal->id }}/edit"
                                                        class="btn btn-sm btn-success m-1"><i
                                                            class="bi bi-pencil-square"></i></a>


                                                    <form action="/kanal-pengaduan/{{ $kanal->id }}" method="post">
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
