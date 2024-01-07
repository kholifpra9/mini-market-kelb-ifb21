<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-64">
            {{ __('Kasir') }}
        </h2>
    </x-slot>

    <div class="py-12 ml-64">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('kasir.storeTransaksi') }}" enctype="multipart/form-data">
                        @csrf
                        <x-text-input type="hidden" name="user_id" class="mt-1 block w-full" value="{{Auth::user()->id}}" required />
                        <x-text-input type="hidden" name="total_bayar" class="mt-1 block w-full" value="0" required />
                        <x-text-input type="hidden" name="tunai" class="mt-1 block w-full" value="0" required />
                        <x-text-input type="hidden" name="kembalian" class="mt-1 block w-full" value="0" required />
                        <x-text-input type="hidden" name="tanggal" class="mt-1 block w-full" value="{{ now() }}" required />
                        <x-primary-button class="w-full h-56 font-bold text-8xl pl-8" name="save" value="true">Transaksi + </x-primary-button>
                    </form>               
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>
<x-sidebar></x-sidebar>
