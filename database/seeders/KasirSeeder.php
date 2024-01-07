<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KasirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
                'name' => 'diego',
                'username' => 'diego',
                'email' => 'diego@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'cabang_id' => '1',
                'role' => 'kasir',
        ]);
        $user->assignRole('kasir');

        $user = User::create([
                'name' => 'dora',
                'username' => 'dora',
                'email' => 'dora@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'cabang_id' => '2',
                'role' => 'kasir',
        
        ]);
        $user->assignRole('kasir');
    }
}
