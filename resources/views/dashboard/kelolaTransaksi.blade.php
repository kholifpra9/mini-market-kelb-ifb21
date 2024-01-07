<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-40">
            {{ __('Kelola Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12 ml-40">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                    @if(Auth::user()->cabang_id == null)
                        @foreach($cabangs as $cabang)
                            <x-primary-button tag="a" href="{{route('kelola.cetakTransaksi', $cabang->id)}}" target='blank' class="flex">Cetak data Transaksi {{$cabang->nama_cabang}}</x-primary-button>
                        @endforeach
                    @elseif(Auth::user()->cabang_id != null )
                        <x-primary-button tag="a" href="{{route('kelola.cetakTransaksi', $cabanguser)}}" target='blank' class="flex">Cetak data Transaksi {{$cabanguser->nama_cabang}}</x-primary-button>
                    @endif

                <br>
                <br>
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>#</th>
                                <th>Kasir</th>
                                <th>Total Bayar</th>
                                <th>Tunai</th>
                                <th>Kembalian</th>
                                <th>tanggal</th>
                                <th>Cabang</th>
                            </tr>
                        </x-slot>
                        @php $num=1; @endphp
                        @foreach($transaksis as $transaksi)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$transaksi->user->name}}</td>
                            <td>{{$transaksi->total_bayar}}</td>
                            <td>{{$transaksi->tunai}}</td>
                            <td>{{$transaksi->kembalian}}</td>
                            <td>{{$transaksi->tanggal}}</td>
                            <td>{{$transaksi->user->cabang->nama_cabang}}</td>

                        </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-sidebar></x-sidebar>
