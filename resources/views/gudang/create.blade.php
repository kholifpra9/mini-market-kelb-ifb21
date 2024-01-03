<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Barang') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflowhidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray100">
                    <!-- CONTENT HERE -->
                    <form method="post" action="{{ route('barang.store') }}" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="kode" value="Kode" />
                            <x-text-input id="kode" type="number" name="kode" class="mt-1 block w-full"
                                value="{{ old('kode')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kode')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="nama_barang" value="nama barang" />
                            <x-text-input id="nama_barang" type="text" name="nama_barang" class="mt-1 block w-full"
                                value="{{ old('nama_barang')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_barang')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="jenis" value="Jenis" />
                            <x-select-input id="jenis" name="jenis" class="mt-1 block w-full" required>
                                <option value="ss">Pilih jenis</option>
                                <option value="manajer">Makanan Ringan</option>
                                <option value="supervisor">Minuman</option>
                                <option value="kasir">Bumbu</option>
                                <option value="pegawai gudang">parabot</option>
                            </x-select-input>
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="harga" value="Harga" />
                            <x-text-input id="harga" type="number" name="harga" class="mt-1 block w-full"
                                value="{{old('harga')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('harga')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="qty" value="Kuantitas" />
                            <x-text-input id="qty" type="number" name="qty" class="mt-1 block w-full"
                                value="{{old('qty')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('qty')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="expired" value="Expired" />
                            <x-text-input id="expired" type="date" name="expired" class="mt-1 block w-full"
                                value="{{ old('expired')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('expired')" />
                        </div>

                        <x-text-input id="user_id" type="hidden" name="user_id" class="mt-1 block w-full"
                                value="{{Auth::user()->id}}" required />
                        
                        <x-secondary-button tag="a" href="{{route('gudang')}}">Cancel</x-secondary-button>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>