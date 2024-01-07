<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
   </head>
   <body>
      <h1 class="text-center">Data Barang {{$cabang->nama_cabang}}</h1>
      <p class="text-center">Laporan Data Buku {{now()}}</p>
      <br/>
      <table id="table-data" class="table table-bordered">
         <thead>
            <tr>
               <th>#</th>
               <th>id</th>
               <th>Kasir : </th>
               <th>Total bayar</th>
               <th>Tunai</th>
               <th>Kembalian</th>
               <th>Tanggal</th>
            </tr>
         </thead>
         <tbody>
            @php $no=1; @endphp
            @foreach($transaksis as $b)
            <tr>
               <td>{{ $no++ }}</td>
               <td>{{ $b->id }}</td>
               <td>{{ $b->user->name }}</td>
               <td>{{ $b->total_bayar }}</td>
               <td>{{ $b->tunai }}</td>
               <td>{{ $b->kembalian }}</td>
               <td>{{ $b->tanggal }}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </body>
</html>

login semua passwordnya = password
login pake username : 
1. owner : ownerToko
2. manajer : opick (cabang Cikaret)
3. manajer : emul (cabang pasir kuda)
4. supervisor : jarot (cabang Cikaret)
5. supervisor : buceng (cabang pasir kuda)
6. kasir : diego (cabang Cikaret)
7. kasir : dora (cabang pasir kuda)
8. pegawai gudang : zoro (cabang Cikaret)
9. pegawai gudang : usop (cabang pasir kuda)