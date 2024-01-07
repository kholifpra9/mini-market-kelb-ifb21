<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = Barang::create([
            [
                'kode' => '110',
                'nama_barang' => 'Frutang',
                'jenis' => 'minuman',
                'harga' => '2000',
                'qty' => '200',
                'expired' => '31 1 2023',
                'user_id' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
