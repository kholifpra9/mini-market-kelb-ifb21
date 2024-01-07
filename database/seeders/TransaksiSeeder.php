<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksis')->insert([
            [
                'user_id' => '6',
                'total_bayar' => '2000',
                'tunai' => '5000',
                'kembalian' => '3000',
                'tanggal' => Carbon::create('2023', '01', '07'),
            ],
        ]);
    }
}
