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
                    <x-primary-button tag="a">
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
                                <th>Nama Barang</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>QTY</th>
                                <th>Action</th>
                            </tr>
                        </x-slot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <x-primary-button tag="a" href="">Edit</x-primary-button>
                                    <x-danger-button x-data=""
                                    
                                    >{{
                                    __('Delete') }}</x-danger-button>
                            </td>
                        </tr>
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
