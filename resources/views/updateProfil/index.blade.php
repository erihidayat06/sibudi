@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Profil BUMDes</h5>

                        <a href="/update-profil/create" class="btn btn-sm btn-primary mt-3 mb-3">Tambah Lopran</a>

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
                                        <th scope="col">Aksi</th>

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
                                                @if ($update->bidang_usaha_dijalankan == 1)
                                                    <i class="bi bi-check2-square"></i> Check
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $update->bidang_usaha_utama }}</td>

                                            <td><a href="{{ asset('storage/' . $update->perdes_pendiri) }}"
                                                    target="_blank">Perdes
                                                    Pendiri BUMDesa</a>
                                            </td>
                                            <td><a href="{{ asset('storage/' . $update->sk_pengelola) }}"
                                                    target="_blank">SK Pengelola</a></td>
                                            <td><a href="{{ asset('storage/' . $update->setifikat_badan) }}"
                                                    target="_blank">Sertifikat Badan Hukum</a></td>


                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="/update-profil/{{ $update->id }}/edit"
                                                        class="btn btn-sm btn-success m-1"><i
                                                            class="bi bi-pencil-square"></i></a>


                                                    <form action="/update-profil/{{ $update->id }}" method="post">
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
