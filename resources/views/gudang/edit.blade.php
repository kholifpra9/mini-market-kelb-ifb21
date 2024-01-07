<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-40">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot>
    <div class="py-12 ml-40">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflowhidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray100">
                    <!-- CONTENT HERE -->
                    <form method="post" action="{{ route('barang.update', $barang->id) }}" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="max-w-xl">
                            <x-input-label for="kode" value="Kode" />
                            <x-text-input id="kode" type="number" name="kode" class="mt-1 block w-full"
                                value="{{ old('nama_barang', $barang->kode)}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kode')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="nama_barang" value="nama barang" />
                            <x-text-input id="nama_barang" type="text" name="nama_barang" class="mt-1 block w-full"
                                value="{{ old('nama_barang', $barang->nama_barang)}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_barang')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="jenis" value="Jenis" />
                            <x-select-input id="jenis" name="jenis" class="mt-1 block w-full" required>
                                <option value="">Pilih jenis</option>
                                    <option value="{{ old('jenis', $barang->jenis) }}" selected>{{ $barang->jenis }}</option>
                                    <option value="makanan">Makanan</option>
                                    <option value="minuman">Minuman</option>
                                    <option value="bumbu">Bumbu</option>
                                    <option value="perabotan">parabot</option>
                            </x-select-input>
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="harga" value="Harga" />
                            <x-text-input id="harga" type="number" name="harga" class="mt-1 block w-full"
                                value="{{old('harga', $barang->harga)}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('harga')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="qty" value="Kuantitas" />
                            <x-text-input id="qty" type="number" name="qty" class="mt-1 block w-full"
                                value="{{old('qty', $barang->qty)}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('qty')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="expired" value="Expired" />
                            <x-text-input id="expired" type="date" name="expired" class="mt-1 block w-full"
                                value="{{ old('expired', $barang->expired)}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('expired')" />
                        </div>
                        
                        <x-secondary-button tag="a" href="{{route('gudang')}}">Cancel</x-secondary-button>
                        <x-primary-button name="save" value="true">Update</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>