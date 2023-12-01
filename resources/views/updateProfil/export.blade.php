    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Desa</th>
                <th scope="col">Nomor Perdes Pendiri BUMDesa</th>
                <th scope="col">Nomor SK Pengelola</th>
                <th scope="col">Nomor Badan Hukum</th>
                <th scope="col">Nama Direktur</th>
                <th scope="col">Nomor HP Direktur</th>
                <th scope="col">Nama Sekertaris</th>
                <th scope="col">Nomor HP Sekertaris</th>
                <th scope="col">Nama Bendahara</th>
                <th scope="col">Nomor HP Bendahara</th>
                <th scope="col">Nama Pengawas</th>
                <th scope="col">Nama Penasehat</th>
                <th scope="col">Bidang Usaha yang dijalankan</th>
                <th scope="col">Bidang Usaha Utama</th>
                <th scope="col">Perdes Pendiri BUMDesa</th>
                <th scope="col">SK Pengelola</th>
                <th scope="col">Setifikat Badan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($updates as $update)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ date('d F Y', strtotime($update->created_at)) }}</td>
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

                    <td><a href="{{ asset('storage/' . $update->perdes_pendiri) }}" target="_blank">Perdes
                            Pendiri BUMDesa</a>
                    </td>
                    <td><a href="{{ asset('storage/' . $update->sk_pengelola) }}" target="_blank">SK Pengelola</a></td>
                    <td><a href="{{ asset('storage/' . $update->setifikat_badan) }}" target="_blank">Sertifikat Badan
                            Hukum</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
