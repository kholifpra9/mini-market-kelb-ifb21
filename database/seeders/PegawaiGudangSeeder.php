<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PegawaiGudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            
                'name' => 'zoro',
                'username' => 'zoro',
                'email' => 'zoro@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'cabang_id' => '1',
                'role' => 'pegawai gudang',

        ]);
        $user->assignRole('pegawai gudang');

        $user = User::create([

                'name' => 'usop',
                'username' => 'usop',
                'email' => 'usop@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'cabang_id' => '2',
                'role' => 'pegawai gudang',
            
        ]);
        $user->assignRole('pegawai gudang');
    }
}
