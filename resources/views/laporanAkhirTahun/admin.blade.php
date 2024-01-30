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
                                        <th scope="col">Capaian_Satu_Tahun</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">PADes</th>
                                        <th scope="col">Nilai_Aset_Akhir_Tahun</th>
                                        <th scope="col">Permasalahan</th>
                                        <th scope="col">Unit_usaha</th>
                                        <th scope="col">Rencana_Penambahan_Modal</th>
                                        <th scope="col">Nilai_Pengajuan</th>
                                        <th scope="col">Unit_Usaha_yang_di_Kembangkan_dengan_Permodalan</th>
                                        <th scope="col">Surat</th>
                                        <th scope="col">Laporan_Akhir_Tahun</th>
                                        <th scope="col">Program_Kerja_yang_di_Sarankan</th>
                                        <th scope="col">Berita_Acara_Musdes</th>
                                        <th scope="col">Bukti_Acara_PADes</th>

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
                                            <td>{{ number_format($laporan->pades, 0, ',', '.') }}</td>
                                            <td>Rp.{{ number_format($laporan->nilai_aset, 0, ',', '.') }}</td>
                                            <td>{{ $laporan->permasalahan }}</td>
                                            <td>{{ $laporan->unit_usaha }}</td>
                                            <td>{{ $laporan->rencana }}</td>
                                            <td>Rp.{{ number_format($laporan->nilai2, 0, ',', '.') }}</td>
                                            <td>{{ $laporan->unit_usaha_permodalan }}</td>
                                            <td>
                                                @if ($laporan->surat == '0')
                                                    -
                                                @else
                                                    <a href="{{ asset('storage/' . $laporan->surat) }}"
                                                        target="_blank">Surat</a>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($laporan->laporan_akhir == '0')
                                                    -
                                                @else
                                                    <a href="{{ asset('storage/' . $laporan->laporan_akhir) }}"
                                                        target="_blank">Laporan Akhir</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($laporan->program_kerja == '0')
                                                    -
                                                @else
                                                    <a href="{{ asset('storage/' . $laporan->program_kerja) }}"
                                                        target="_blank">Program Kerja</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($laporan->berita_acara == '0')
                                                    -
                                                @else
                                                    <a href="{{ asset('storage/' . $laporan->berita_acara) }}"
                                                        target="_blank">Berita Acara</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($laporan->bukti_setor == '0')
                                                    -
                                                @else
                                                    <a href="{{ asset('storage/' . $laporan->bukti_setor) }}"
                                                        target="_blank">Bukti Setor</a>
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
