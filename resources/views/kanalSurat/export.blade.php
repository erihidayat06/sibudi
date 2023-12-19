 <table class="table datatable">
     <thead>
         <tr>
             <th scope="col">#</th>
             <th scope="col">Tanggal</th>
             <th scope="col">Judul Surat</th>
             <th scope="col">Dari</th>
             <th scope="col">Kepada</th>
             <th scope="col">Tembusan</th>
             <th scope="col">Isi Ringkasan</th>
             <th scope="col">File</th>
         </tr>
     </thead>
     <tbody>
         @php
             $i = 1;
         @endphp
         @foreach ($kanal_surats as $kanal)
             <tr>
                 <th scope="row">{{ $i++ }}</th>
                 <td>{{ date('d_F_Y', strtotime($kanal->created_at)) }}</td>
                 <td>{{ $kanal->judul_surat }}</td>
                 <td>{{ $kanal->dari }}</td>
                 <td>{{ $kanal->kepada }}</td>
                 <td>{{ $kanal->tembusan }}</td>
                 <td>{{ $kanal->isi_ringkasan }}</td>

                 <td><a href="{{ asset('storage/' . $kanal->file) }}" target="_blank">Surat</a>
                 </td>

             </tr>
         @endforeach

     </tbody>
 </table>
 <!-- End Table with stripped rows -->
