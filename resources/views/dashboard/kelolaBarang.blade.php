<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-40">
            {{ __('Kelola Barang') }}
        </h2>
    </x-slot>

    <div class="py-12 ml-40">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                @if(Auth::user()->cabang_id == null)
                        @foreach($cabangs as $cabang)
                            <x-primary-button tag="a" href="{{route('kelola.cetakBarang', $cabang->id)}}" target='blank' class="flex">Cetak data Barang {{$cabang->nama_cabang}}</x-primary-button>
                        @endforeach
                    @elseif(Auth::user()->cabang_id != null )
                        <x-primary-button tag="a" href="{{route('kelola.cetakBarang', $cabanguser)}}" target='blank' class="flex">Cetak data Barang {{$cabanguser->nama_cabang}}</x-primary-button>
                    @endif
                    <br>
                    <br>
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>QTY</th>
                                <th>Expired</th>
                                <th>Penambah data</th>
                                <th>cabang</th>
                            </tr>
                        </x-slot>
                        @php $num=1; @endphp
                        @foreach($barangs as $barang)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$barang->kode}}</td>
                            <td>{{$barang->nama_barang}}</td>
                            <td>{{$barang->jenis}}</td>
                            <td>{{$barang->harga}}</td>
                            <td>{{$barang->qty}}</td>
                            <td>{{$barang->expired}}</td>
                            <td>{{$barang->user->name}}</td>
                            <td>{{$barang->user->cabang->nama_cabang}}</td>
                        </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-sidebar></x-sidebar>
