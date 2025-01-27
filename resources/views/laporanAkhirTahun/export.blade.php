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
                        <a href="{{ asset('storage/' . $laporan->surat) }}" target="_blank">Laporan_Keuangan</a>
                    @endif
                </td>

                <td>
                    @if ($laporan->surat == '0')
                        -
                    @else
                        <a href="{{ asset('storage/' . $laporan->surat) }}" target="_blank">Laporan_Keuangan</a>
                    @endif
                </td>

            </tr>
        @endforeach

    </tbody>
</table>
