@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Profil BUMDes</h5>

                        <a href="/export-update-profil" class="btn btn-success btn-sm mb-3 mt-3">Export</a>

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
                                        <th scope="col">Nomor_Perdes_Pendiri_BUMDesa</th>
                                        <th scope="col">Nomor_SK_Pengelola</th>
                                        <th scope="col">Nomor_Badan_Hukum</th>
                                        <th scope="col">Nama_Direktur</th>
                                        <th scope="col">Nomor_HP_Direktur</th>
                                        <th scope="col">Nama_Sekertaris</th>
                                        <th scope="col">Nomor_HP_Sekertaris</th>
                                        <th scope="col">Nama_Bendahara</th>
                                        <th scope="col">Nomor_HP_Bendahara</th>
                                        <th scope="col">Nama_Pengawas</th>
                                        <th scope="col">Nama_Penasehat</th>
                                        <th scope="col">Bidang_Usaha_yang_dijalankan</th>
                                        <th scope="col">Bidang_Usaha_Utama</th>
                                        <th scope="col">Perdes_Pendiri_BUMDesa</th>
                                        <th scope="col">SK_Pengelola</th>
                                        <th scope="col">Setifikat_Badan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($updates as $update)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ date('d_F_Y', strtotime($update->created_at)) }}</td>
                                            <td>{{ $update->kecamatan }}</td>
                                            <td>{{ $update->desa }}</td>
                                            <td>{{ $update->nomor_perdes }}</td>
                                            <td>{{ $update->nomor_sk }}</td>
                                            <td>{{ $update->nomor_badan }}</td>
                                            <td>{{ $update->nama_direktur }}</td>
                                            <td>{{ $update->nomor_hp_direktur }}</td>
                                            <td>{{ $update->nama_sekertaris }}</td>
                                            <td>{{ $update->nomor_hp_sekertaris }}</td>
                                            <td>{{ $update->nama_bendahara }}</td>
                                            <td>{{ $update->nomor_hp_bendahara }}</td>
                                            <td>{{ $update->nama_pengawas }}</td>
                                            <td>{{ $update->nama_penasehat }}</td>
                                            <td>
                                                {{ $update->bidang_usaha_dijalankan }}

                                            </td>

                                            <td>{{ $update->bidang_usaha_utama }}</td>

                                            <td>
                                                @if ($update->perdes_pendiri == '0')
                                                    -
                                                @else
                                                    <a href="{{ asset('storage/' . $update->perdes_pendiri) }}"
                                                        target="_blank">Perdes Pendiri BUMDesa</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($update->sk_pengelola == '0')
                                                    -
                                                @else
                                                    <a href="{{ asset('storage/' . $update->sk_pengelola) }}"
                                                        target="_blank">SK Pengelola</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($update->setifikat_badan == '0')
                                                    -
                                                @else
                                                    <a href="{{ asset('storage/' . $update->setifikat_badan) }}"
                                                        target="_blank">Sertifikat Badan Hukum</a>
                                                @endif
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
