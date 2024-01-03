<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tokos')->insert([
            'cabang_toko' => 'Cabang Cikaret',
            'alamat' => 'Cikaret, Cianjur',
        ]);
    }
}
