<x-modal name="pilih-produk" focusable maxWidth="xl">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                <div class="py-3 px-4">
                <div class="relative max-w-xs">
                    <form action="">
                        <label for="hs-table-search" class="sr-only">Search</label>
                        <input type="text" name="hs-table-search" id="hs-table-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Search for items">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                            <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                        </div>
                    </form>
                </div>
                </div>
                <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">kode</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Nama Barang</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">QTY Barang</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">QTY Pembelian</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($barangs as $barang)
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$barang->kode}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$barang->nama_barang}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$barang->qty}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                            <form method="post" action="{{ route('kasir.storeDetailTransaksi') }}" enctype="multipart/form-data">
                                @csrf
                                <x-text-input type="hidden" name="transaksi_id" class="mt-1 block w-full" value="{{session('transaksi_id')}}" required />
                                <x-text-input type="hidden" name="barang_id" class="mt-1 block w-full" value="{{$barang->id}}" required />
                                <x-text-input type="number" name="qty" class="mt-1 block w-full" value="{{'old(qty)'}}" required />
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                <x-text-input type="hidden" name="jumlah" class="mt-1 block w-full" value="0" required />
                                <x-primary-button name="save" value="true" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Pilih</x-primary-button>
                            </form>                            
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
    </x-modal>