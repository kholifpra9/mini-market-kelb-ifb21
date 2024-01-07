<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ManajerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
                'name' => 'Opick',
                'username' => 'opick',
                'email' => 'opick@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'cabang_id' => '1',
                'role' => 'manajer',
        ]);
        $user->assignRole('manajer');

        $user = User::create([
                'name' => 'Emul',
                'username' => 'emul',
                'email' => 'emul@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'cabang_id' => '2',
                'role' => 'manajer',
        ]);
        $user->assignRole('manajer');
    }
}
