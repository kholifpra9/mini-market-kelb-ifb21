<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(
            [
                RoleSeeder::class,
                OwnerSeeder::class,
                CabangSeeder::class,
                ManajerSeeder::class,
                SupervisorSeeder::class,
                KasirSeeder::class,
                PegawaiGudangSeeder::class,
                BarangSeeder::class,
                TransaksiSeeder::class,
                DetailTransaksiSeeder::class,
            ]
        );
    }
}
