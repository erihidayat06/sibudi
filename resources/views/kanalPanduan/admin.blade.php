@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kanal Semester</h5>

                        <a href="/export-kanal" class="btn btn-success btn-sm mb-3 mt-3">Export</a>


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
