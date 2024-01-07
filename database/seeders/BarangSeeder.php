<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'kode' => '110',
                'nama_barang' => 'Frutang',
                'jenis' => 'minuman',
                'harga' => '2000',
                'qty' => '200',
                'expired' => Carbon::create('2023', '01', '31'),
                'user_id' => '8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => '111',
                'nama_barang' => 'Indomie Goreng',
                'jenis' => 'makanan',
                'harga' => '3500',
                'qty' => '200',
                'expired' => Carbon::create('2023', '01', '31'),
                'user_id' => '8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => '112',
                'nama_barang' => 'Sapu Lidi',
                'jenis' => 'parabotan',
                'harga' => '5000',
                'qty' => '200',
                'expired' => Carbon::create('2023', '01', '31'),
                'user_id' => '8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => '113',
                'nama_barang' => 'masako',
                'jenis' => 'bumbu',
                'harga' => '1000',
                'qty' => '200',
                'expired' => Carbon::create('2023', '01', '31'),
                'user_id' => '8',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kode' => '220',
                'nama_barang' => 'Teh Gelas',
                'jenis' => 'minuman',
                'harga' => '2000',
                'qty' => '200',
                'expired' => Carbon::create('2023', '01', '31'),
                'user_id' => '9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => '221',
                'nama_barang' => 'Mie sedap Goreng',
                'jenis' => 'makanan',
                'harga' => '3500',
                'qty' => '200',
                'expired' => Carbon::create('2023', '01', '31'),
                'user_id' => '9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => '222',
                'nama_barang' => 'Sapu Ijuk',
                'jenis' => 'parabotan',
                'harga' => '5000',
                'qty' => '200',
                'expired' => Carbon::create('2023', '01', '31'),
                'user_id' => '9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => '223',
                'nama_barang' => 'RoyKiyoshi',
                'jenis' => 'bumbu',
                'harga' => '1000',
                'qty' => '200',
                'expired' => Carbon::create('2023', '01', '31'),
                'user_id' => '9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
