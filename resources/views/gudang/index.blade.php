<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gudang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-primary-button tag="a" href="{{route('barang.create')}}">
                        Tambah Barang
                    </x-primary-button>
                    <x-primary-button tag="a">
                        Cetak PDF
                    </x-primary-button>
                    <x-primary-button tag="a">
                        Import Excel
                    </x-primary-button>
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
                                <th>Action</th>
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
                            <td>
                                <x-primary-button tag="a" href="">Edit</x-primary-button>
                                    <x-danger-button x-data=""
                                    
                                    >{{
                                    __('Delete') }}</x-danger-button>
                            </td>
                        </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
