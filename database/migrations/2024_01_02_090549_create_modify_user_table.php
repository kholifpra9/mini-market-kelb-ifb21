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
        Schema::create('modify_user', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->id_toko('users');
            $table->dropColumn('username');
            $table->dropColumn('role');
            $table->dropColumn('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modify_user');
    }
};
