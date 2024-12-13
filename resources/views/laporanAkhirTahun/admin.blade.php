@extends('layouts.main')

@section('container')
    <div class="pagetitle">
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Akhir Tahun / Pengajuan Pencairan Modal</h5>


                        <a href="/export-laporan-akhir-tahun" class="btn btn-success btn-sm mb-3 mt-3">Export</a>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">


                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Kecamatan</th>
                                        <th scope="col">Desa</th>
                                        <th scope="col">pendapatan/omset satu tahun</th>
                                        <th scope="col">Capaian_Satu_Tahun</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">PADes</th>
                                        <th scope="col">Nilai_Aset_Akhir_Tahun</th>
                                        <th scope="col">Laporan_Keuangan</th>

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
                                            <td>{{ $laporan->unit_usaha }}</td>
                                            <td>{{ $laporan->capaian }}</td>
                                            <td>Rp.{{ number_format($laporan->nilai, 0, ',', '.') }}</td>
                                            <td>{{ number_format($laporan->pades, 0, ',', '.') }}</td>
                                            <td>Rp.{{ number_format($laporan->nilai_aset, 0, ',', '.') }}</td>

                                            <td>
                                                @if ($laporan->surat == '0')
                                                    -
                                                @else
                                                    <a href="{{ asset('storage/' . $laporan->surat) }}"
                                                        target="_blank">Laporan_Keuangan</a>
                                                @endif
                                            </td>


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
