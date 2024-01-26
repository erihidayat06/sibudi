@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Updateting Profil Pasar Desa</h5>

                        <a href="/profil-pasar/create" class="btn btn-sm btn-primary mt-3 mb-3">Tambah Laporan</a>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Status_Pengelola</th>
                                        <th scope="col">Nomor_Perdes</th>
                                        <th scope="col">Kepemilikan_Tanah</th>
                                        <th scope="col">Luas</th>
                                        <th scope="col">Kondisi_Bangunan</th>
                                        <th scope="col">Luas_Bangunan</th>
                                        <th scope="col">Kantor_Pasar_Desa</th>
                                        <th scope="col">Memiliki_Tempat_parkir</th>
                                        <th scope="col">Memiliki_Musolah</th>
                                        <th scope="col">Jumlah_Kios</th>
                                        <th scope="col">Jumlah_Los</th>
                                        <th scope="col">Jumlah_Toilet</th>
                                        <th scope="col">Jumlah_pedagang</th>
                                        <th scope="col">Sumber_Pembiayaan</th>
                                        <th scope="col">Hasil_Retribusi</th>
                                        <th scope="col">Kontribusi_PADes</th>
                                        <th scope="col">Kondisi_Fisik_Pasar</th>
                                        <th scope="col">Kendala/Permasalahan</th>
                                        <th scope="col">Kendala/Permasalahan</th>
                                        <th scope="col">Profil_Pasar_Desa</th>
                                        <th scope="col">Perdes_Pengelolaan_Pasar_Desa_</th>
                                        <th scope="col">Sk_Pengelola</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($profils as $profil)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ date('d_F_Y', strtotime($profil->created_at)) }}</td>
                                            <td>{{ $profil->status_pengelola }}</td>
                                            <td>{{ $profil->no_perdes }}</td>
                                            <td>{{ $profil->no_sk }}</td>
                                            <td>{{ $profil->kepemilikan_tanah }}</td>
                                            <td>{{ $profil->luas }}</td>
                                            <td>{{ $profil->kondisi_bangunan }}</td>
                                            <td>{{ $profil->luas_bangunan }}</td>
                                            <td>{{ $profil->kantor_pasar }}</td>
                                            <td>{{ $profil->parkiran }}</td>
                                            <td>{{ $profil->musola }}</td>
                                            <td>{{ $profil->jml_kios }}</td>
                                            <td>{{ $profil->jml_los }}</td>
                                            <td>{{ $profil->jml_toilet }}</td>
                                            <td>{{ $profil->jml_pedagang }}</td>
                                            <td>{{ $profil->sumber_pembiayaan }}</td>
                                            <td>{{ $profil->hasi_retibusi_tahunan }}</td>
                                            <td>{{ $profil->kontribusi_pades }}</td>
                                            <td>{{ $profil->kondisi_fisik_pasa }}</td>
                                            <td>{{ $profil->kendala }}</td>

                                            <td>
                                                @if ($profil->profil_persar == '0')
                                                    -
                                                @else
                                                    <a href="{{ asset('storage/' . $profil->profil_persar) }}"
                                                        target="_blank">Surat</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($profil->perdes == '0')
                                                    -
                                                @else
                                                    <a href="{{ asset('storage/' . $profil->perdes) }}"
                                                        target="_blank">Surat</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($profil->sk_pengelola == '0')
                                                    -
                                                @else
                                                    <a href="{{ asset('storage/' . $profil->sk_pengelola) }}"
                                                        target="_blank">Surat</a>
                                                @endif
                                            </td>


                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="/profil-pasar/{{ $profil->id }}/edit"
                                                        class="btn btn-sm btn-success m-1"><i
                                                            class="bi bi-pencil-square"></i></a>


                                                    <form action="/profil-pasar/{{ $profil->id }}" method="post">
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
