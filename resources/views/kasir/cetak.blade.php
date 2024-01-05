<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="card">
    <div class="card-body mx-4">
        <div class="container">
            <p class="my-5 mx-5" style="font-size: 30px;">Terimakasih Telah Berbelanja</p>
            <div class="row">
                <ul class="list-unstyled">
                <li class="text-black">Kasir : {{$detailTransaksi->transaksi->user->name}}</li>
                <li class="text-muted mt-1"><span class="text-black">No Struk :</span> #{{$detailTransaksi->transaksi->id}}</li>
                <li class="text-black mt-1">tanggal : {{$detailTransaksi->transaksi->tanggal}}</li>
                </ul>
                <hr>
            </div>
            <table width="100%">
                @foreach($dtbarangs as $dt)
                <tr>
                    <td><p>{{$dt->barang->nama_barang}}</p></td>
                    <td><p>{{$dt->qty}}</p></td>
                    <td><p>Rp.{{$dt->jumlah}}</p></td>
                </tr>
                <hr>
                @endforeach
            </table>
            <div class="row text-black">
                <div class="col-xl-12">
                <p class="float-end fw-bold">Total: Rp.{{$detailTransaksi->transaksi->total_bayar}}
                </p>
                </div>
                <br>
                <hr style="border: 2px solid black;">
            </div>
            <div class="row text-black">
                <div class="col-xl-12">
                <p class="float-end fw-bold">Tunai: Rp.{{$detailTransaksi->transaksi->tunai}}
                </p>
                </div>
                <br>
                <hr>
            </div>
            <div class="row text-black">
                <div class="col-xl-12">
                <p class="float-end fw-bold">Kembali: Rp.{{$detailTransaksi->transaksi->kembalian}}
                </p>
                </div>
                <br>
                
            </div>
        </div>
    </div>
    </div>
</body>
</html>