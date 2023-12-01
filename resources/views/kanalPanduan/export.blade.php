 <table class="table datatable">
     <thead>
         <tr>
             <th scope="col">#</th>
             <th scope="col">Tanggal</th>
             <th scope="col">Judul</th>
             <th scope="col">Deskripsi singkat</th>
             <th scope="col">Keadaan yang terjadi</th>
             <th scope="col">Keadaan yang diharapkan</th>
             <th scope="col">Surat aduan</th>
         </tr>
     </thead>
     <tbody>
         @php
             $i = 1;
         @endphp
         @foreach ($kanals as $kanal)
             <tr>
                 <th scope="row">{{ $i++ }}</th>
                 <td>{{ date('d F Y', strtotime($kanal->created_at)) }}</td>
                 <td>{{ $kanal->judul }}</td>
                 <td>{{ $kanal->deskripsi }}</td>
                 <td>{{ $kanal->keadaan_terjadi }}</td>
                 <td>{{ $kanal->keadaan_harapan }}</td>

                 <td><a href="{{ asset('storage/' . $kanal->surat_aduan) }}" target="_blank">Surat</a>
                 </td>

             </tr>
         @endforeach

     </tbody>
 </table>
 <!-- End Table with stripped rows -->
