@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Semester / Pengajuan Penamanbahan Modal</h5>

                        <a href="/laporan-semester/create" class="btn btn-sm btn-primary mt-3 mb-3">Tambah Laporan</a>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Kecamatan</th>
                                        <th scope="col">Desa</th>
                                        <th scope="col">Capaian_Satu_Tahun</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Permasalahan_yang_memperngaruhi_kerja</th>
                                        <th scope="col">Rencana</th>
                                        <th scope="col">nilai</th>
                                        <th scope="col">Unit_usaha</th>
                                        <th scope="col">Surat</th>
                                        <th scope="col">Laporan_Semester</th>
                                        <th scope="col">Rancangan_Program</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($laporans as $laporan)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ date('d_F_Y', strtotime($laporan->created_at)) }}</td>
                                            <td>{{ $laporan->kecamatan }}</td>
                                            <td>{{ $laporan->desa }}</td>
                                            <td>{{ $laporan->capaian }}</td>
                                            <td>Rp.{{ number_format($laporan->nilai, 0, ',', '.') }}</td>
                                            <td>{{ $laporan->permasalahan }}</td>
                                            <td>{{ $laporan->rencana }}</td>
                                            <td>Rp.{{ number_format($laporan->nilai2, 0, ',', '.') }}</td>
                                            <td>{{ $laporan->unit_usaha }}</td>
                                            <td><a href="{{ asset('storage/' . $laporan->surat) }}"
                                                    target="_blank">Surat</a>
                                            </td>
                                            <td><a href="{{ asset('storage/' . $laporan->laporan_semester) }}"
                                                    target="_blank">Laporan
                                                    Semester</a></td>
                                            <td><a href="{{ $laporan->file_rancangan == null ? back() : asset('storage/' . $laporan->file_rancangan) }}"
                                                    target="_blank">Rancangan</a></td>

                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="/laporan-semester/{{ $laporan->id }}/edit"
                                                        class="btn btn-sm btn-success m-1"><i
                                                            class="bi bi-pencil-square"></i></a>


                                                    <form action="/laporan-semester/{{ $laporan->id }}" method="post">
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
