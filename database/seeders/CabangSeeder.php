<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cabangs')->insert([
            [
                'nama_cabang' => 'Cabang Cikaret',
                'alamat' => 'Cikaret, Cianjur',
            ],
            [
                'nama_cabang' => 'Cabang Pasir Kuda',
                'alamat' => 'Pasir kuda, Cianjur',
            ],
        ]);
    }
}
