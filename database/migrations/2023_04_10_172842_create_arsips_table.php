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
        Schema::create('arsip', function (Blueprint $table) {
            $table->id();
            $table->string('plat_nomor')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->time('jam_masuk')->nullable();
            $table->bigInteger('id_ruang')->nullable();
            $table->string('status')->nullable();
            $table->string('biaya')->nullable();
            $table->string('menginap')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip');
    }
};
