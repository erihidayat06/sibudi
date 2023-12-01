@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Semester / Pengajuan Penamanbahan Modal</h5>

                        <a href="/export-laporan-semester" class="btn btn-success btn-sm mb-3 mt-3">Export</a>
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
                                            <td>{{ $laporan->nilai }}</td>
                                            <td>{{ $laporan->permasalahan }}</td>
                                            <td>{{ $laporan->rencana }}</td>
                                            <td>{{ $laporan->nilai2 }}</td>
                                            <td>{{ $laporan->unit_usaha }}</td>
                                            <td><a href="{{ asset('storage/' . $laporan->surat) }}"
                                                    target="_blank">Surat</a>
                                            </td>
                                            <td><a href="{{ asset('storage/' . $laporan->laporan_semester) }}"
                                                    target="_blank">Laporan
                                                    Semester</a></td>
                                            <td><a href="{{ $laporan->file_rancangan == null ? back() : asset('storage/' . $laporan->file_rancangan) }}"
                                                    target="_blank">Rancangan</a></td>


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
