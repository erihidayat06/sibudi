<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Kecamatan</th>
            <th scope="col">Desa</th>
            <th scope="col">Capaian Satu Tahun</th>
            <th scope="col">Nilai</th>
            <th scope="col">Permasalahan yang memperngaruhi kerja</th>
            <th scope="col">Rencana</th>
            <th scope="col">nilai</th>
            <th scope="col">Unit usaha</th>
            <th scope="col">Surat</th>
            <th scope="col">Laporan Semester</th>
            <th scope="col">Rancangan Program</th>

        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($laporans as $laporan)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ date('d F Y', strtotime($laporan->created_at)) }}</td>
                <td>{{ $laporan->kecamatan }}</td>
                <td>{{ $laporan->desa }}</td>
                <td>{{ $laporan->capaian }}</td>
                <td>Rp {{ number_format($laporan->nilai, 0, ',', '.') }}</td>
                <td>{{ $laporan->permasalahan }}</td>
                <td>{{ $laporan->rencana }}</td>
                <td>Rp {{ number_format($laporan->nilai, 0, ',', '.') }}</td>
                <td>{{ $laporan->unit_usaha }}</td>
                <td><a href="{{ asset('storage/' . $laporan->surat) }}" target="_blank">Surat</a>
                </td>
                <td><a href="{{ asset('storage/' . $laporan->laporan_semester) }}" target="_blank">Laporan
                        Semester</a></td>
                <td><a href="{{ $laporan->file_rancangan == null ? back() : asset('storage/' . $laporan->file_rancangan) }}"
                        target="_blank">Rancangan</a></td>


            </tr>
        @endforeach

    </tbody>
</table>
