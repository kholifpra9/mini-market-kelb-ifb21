<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kasir') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                @if(session('transaksi_id'))
                    <h3>Transaksi ID: {{ session('transaksi_id') }}</h3>
                @endif
                <!-- Input dengan kode -->
                    <!-- <form method="post" action="{{ route('gudang') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="relative z-10 flex space-x-3 p-3 bg-white border rounded-lg shadow-lg shadow-gray-100 dark:bg-slate-900 dark:border-gray-700 dark:shadow-gray-900/[.2] w-72">                      
                            <input type="number" name="inputKode" id="hs-search-article-1" class="py-2.5 px-4 block w-40 border shadow-lg shadow-gray-100  rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-transparent dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Input Kode">
                            <x-primary-button class="flex" name="save" value="true">Tambah</x-primary-button>
                        </div>
                    </form>
                    <br> -->
                <!-- input mencari data -->

                <div class="p-1.5 min-w-96 float-right inline-block align-top">
                        <div class="border rounded-lg shadow overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                <th colspan="3" scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Transaksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">Total Bayar : </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        @if ($transaksis)
                                            Rp. {{$transaksis->total_bayar}}
                                        @else
                                            Rp. 0
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200" id="tunai">Tunai : </td>
                                    <td>
                                        <form method="post" action="{{ route('kasir.bayarTransaksi') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                                            @csrf
                                            <input type="number" name="tunai" id="tunai" value="{{$transaksis->tunai}}">
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">Kembalian : </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$transaksis->kembalian}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">                                        
                                        @if(session('bayar') == '2')
                                            <x-primary-button class="flex" name="save" value="true">bayar</x-primary-button>
                                        </form>
                                        @elseif(session('bayar') == '1')
                                        <x-primary-button id="cetakButton" tag="a" href="{{route('kasir.cetak')}}" target='blank' class="flex" onclick="handleCetakButtonClick()">Cetak Struk</x-primary-button>
                                        <x-primary-button id="selesaiButton" tag="a"  target='blank' class="flex"  style="display: none;" onclick="handleSelesai()">Selesai</x-primary-button>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        </div>

                <x-primary-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'pilih-produk')"
                    >
                    <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#ffffff" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>plus-circle</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-464.000000, -1087.000000)" fill="#000000"> <path d="M480,1117 C472.268,1117 466,1110.73 466,1103 C466,1095.27 472.268,1089 480,1089 C487.732,1089 494,1095.27 494,1103 C494,1110.73 487.732,1117 480,1117 L480,1117 Z M480,1087 C471.163,1087 464,1094.16 464,1103 C464,1111.84 471.163,1119 480,1119 C488.837,1119 496,1111.84 496,1103 C496,1094.16 488.837,1087 480,1087 L480,1087 Z M486,1102 L481,1102 L481,1097 C481,1096.45 480.553,1096 480,1096 C479.447,1096 479,1096.45 479,1097 L479,1102 L474,1102 C473.447,1102 473,1102.45 473,1103 C473,1103.55 473.447,1104 474,1104 L479,1104 L479,1109 C479,1109.55 479.447,1110 480,1110 C480.553,1110 481,1109.55 481,1109 L481,1104 L486,1104 C486.553,1104 487,1103.55 487,1103 C487,1102.45 486.553,1102 486,1102 L486,1102 Z" id="plus-circle" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
                        Cari Produk
                </x-primary-button>
                <br>
                
                <div class="flex flex-col float-left">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-[700px] inline-block align-middle">
                        <div class="border rounded-lg shadow overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Kode</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Nama Barang</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">QTY</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Jumlah</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Action</th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($details as $detail)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$detail->barang->kode}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$detail->barang->nama_barang}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$detail->qty}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">Rp.{{$detail->jumlah}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @php $id=$detail->id; $qty=$detail->qty @endphp
                                    <x-primary-button tag="a" data-id="{{$detail->id}}" data-qty="{{$detail->qty}}" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-qty')">Edit</x-primary-button>
                                    <x-danger-button x-data="" >{{__('Delete') }}</x-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>

                            
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('kasir.modalPilih');
    @include('kasir.modalEdit');
    @include('kasir.modalCetak');

    <script>
        function handleCetakButtonClick() {
        var cetakButton = document.getElementById("cetakButton");
        var selesaiButton = document.getElementById("selesaiButton");

        cetakButton.style.display = "none";

        selesaiButton.style.display = "inline-block";
        
        }
        function handleSelesai(){
            window.location.href = "{{ route('kasir') }}";    
        }
    </script>
</x-app-layout>
