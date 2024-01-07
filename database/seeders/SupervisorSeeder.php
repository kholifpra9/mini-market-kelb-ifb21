<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
                'name' => 'Jarot',
                'username' => 'jarot',
                'email' => 'jarot@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'cabang_id' => '1',
                'role' => 'supervisor',
        ]);
        $user->assignRole('supervisor');

        $user = User::create([
                'name' => 'buceng',
                'username' => 'buceng',
                'email' => 'buceng@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'cabang_id' => '2',
                'role' => 'supervisor',
        ]);
        $user->assignRole('supervisor');
    }
}
