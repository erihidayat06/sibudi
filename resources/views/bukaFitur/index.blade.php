@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">fitur</h5>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Halaman</th>
                                        <th scope="col">Keadaan</th>
                                        <th scope="col">Aksi</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($bukaFiturs as $fitur)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>
                                                @if ($fitur->halaman == 1)
                                                    Laporan Semester
                                                @elseif ($fitur->halaman == 2)
                                                    Laporan Akhir Tahun
                                                @elseif ($fitur->halaman == 3)
                                                    Update Profil BUMDes
                                                @elseif ($fitur->halaman == 4)
                                                    Kanal Pengaduan
                                                @endif
                                            </td>
                                            <td>
                                                <form action="/buka-fitur/{{ $fitur->id }}" method="POST">
                                                    @csrf

                                                    @method('PUT')
                                                    <input type="datetime-local" name="dari"
                                                        value="{{ old('dari', $fitur) }}">
                                                    -
                                                    <input type="datetime-local" name="sampai"
                                                        value="{{ old('sampai', $fitur) }}">
                                                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                                </form>
                                            </td>
                                            <td>

                                                @php
                                                    $now = new DateTime();

                                                    // Tentukan dua tanggal untuk perbandingan
                                                    $date1 = new DateTime($fitur->dari); // Tengah hari tanggal 1
                                                    $date2 = new DateTime($fitur->sampai); // Tengah hari tanggal 2

                                                    // Periksa apakah kedua tanggal berada di tengah hari saat ini
                                                    if ($now >= $date1 && $now <= $date2) {
                                                        echo 'Buka';
                                                    } else {
                                                        echo 'Tutup';
                                                    }
                                                @endphp

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
