<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('name');
            $table->foreignId('toko_id')->constrained()
            ->onUpdate('cascade')->onDelete('cascade')->after('password');
            $table->enum('role', ['owner', 'manajer', 'supervisor', 'kasir', 'pegawai gudang'])
            ->after('toko_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('toko_id');
            $table->dropColumn('role');
        });
    }
};
