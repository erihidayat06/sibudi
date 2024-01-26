<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Status Pengelola</th>
            <th scope="col">Nomor Perdes</th>
            <th scope="col">Kepemilikan Tanah</th>
            <th scope="col">Luas</th>
            <th scope="col">Kondisi Bangunan</th>
            <th scope="col">Luas Bangunan</th>
            <th scope="col">Kantor Pasar Desa</th>
            <th scope="col">Memiliki Tempat parkir</th>
            <th scope="col">Memiliki Musolah</th>
            <th scope="col">Jumlah Kios</th>
            <th scope="col">Jumlah Los</th>
            <th scope="col">Jumlah Toilet</th>
            <th scope="col">Jumlah pedagang</th>
            <th scope="col">Sumber Pembiayaan</th>
            <th scope="col">Hasil Retribusi</th>
            <th scope="col">Kontribusi PADes</th>
            <th scope="col">Kondisi Fisik Pasar</th>
            <th scope="col">Kendala/Permasalahan</th>
            <th scope="col">Kendala/Permasalahan</th>
            <th scope="col">Profil Pasar Desa</th>
            <th scope="col">Perdes Pengelolaan Pasar Desa </th>
            <th scope="col">Sk Pengelola</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($profils as $profil)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ date('d F Y', strtotime($profil->created_at)) }}</td>
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
                        <a href="{{ asset('storage/' . $profil->profil_persar) }}" target="_blank">Surat</a>
                    @endif
                </td>
                <td>
                    @if ($profil->perdes == '0')
                        -
                    @else
                        <a href="{{ asset('storage/' . $profil->perdes) }}" target="_blank">Surat</a>
                    @endif
                </td>
                <td>
                    @if ($profil->sk_pengelola == '0')
                        -
                    @else
                        <a href="{{ asset('storage/' . $profil->sk_pengelola) }}" target="_blank">Surat</a>
                    @endif
                </td>

            </tr>
        @endforeach

    </tbody>
</table>
