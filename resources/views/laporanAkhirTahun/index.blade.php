@extends('layouts.main')

@section('container')
    <div class="pagetitle">
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Pertanggungjawaban / Pengajuan Pencairan Modal</h5>

                        <a href="/laporan-akhir/create" class="btn btn-sm btn-primary mt-3 mb-3">Tambah Laporan</a>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Kecamatan</th>
                                        <th scope="col">Desa</th>

                                        <th scope="col">Pendapatan_omset_satu_tahun</th>

                                        <th scope="col">Capaian_Satu_Tahun</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">PADes</th>
                                        <th scope="col">Nilai_Aset_Akhir_Tahun</th>
                                        <th scope="col">Laporan_Keuangan</th>

                                        <th scope="col">Laporan_Akhir_Tahun</th>
                                        <th scope="col">Program_Kerja</th>
                                        <th scope="col">Berita_Acara_Musdes</th>
                                        <th scope="col">Bukti_Setor_PADes</th>

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

                                            <td>Rp.{{ number_format(intval($laporan->unit_usaha), 0, ',', '.') }}</td>

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

                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="/laporan-akhir/{{ $laporan->id }}/edit"
                                                        class="btn btn-sm btn-success m-1"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <form action="/laporan-akhir/{{ $laporan->id }}" method="post">
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
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
