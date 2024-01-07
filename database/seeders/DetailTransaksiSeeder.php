<?php

namespace Database\Seeders;

use App\Models\DetailTransaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_transaksis')->insert([
            [
                'transaksi_id' => '1',
                'barang_id' => '1',
                'qty' => '1',
                'jumlah' => '2000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
