<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_owner = Role::create([
            'name' => 'owner'
        ]);
        $role_manajer = Role::create([
            'name' => 'manajer'
        ]);
        $role_supervisor = Role::create([
            'name' => 'supervisor'
        ]);
        $role_kasir = Role::create([
            'name' => 'kasir'
        ]);
        $role_gudangers = Role::create([
            'name' => 'pegawai gudang'
        ]);
    }
}
