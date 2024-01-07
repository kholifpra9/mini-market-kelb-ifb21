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
               <th>Kode</th>
               <th>Nama Barang</th>
               <th>Jenis</th>
               <th>qty</th>
               <th>harga</th>
               <th>Pemasuk Barang</th>
            </tr>
         </thead>
         <tbody>
            @php $no=1; @endphp
            @foreach($barangs as $b)
            <tr>
               <td>{{ $no++ }}</td>
               <td>{{ $b->kode }}</td>
               <td>{{ $b->nama_barang }}</td>
               <td>{{ $b->jenis }}</td>
               <td>{{ $b->qty }}</td>
               <td>{{ $b->harga }}</td>
               <td>{{ $b->user->name }}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </body>
</html>