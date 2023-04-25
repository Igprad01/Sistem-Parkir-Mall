<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\Cast\String_;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    { 

        Schema::create('ptugasmasuk', function (Blueprint $table) {
            $table->id();
            $table->string('plat_nomor');
            $table->date('tanggal_masuk');
            $table->time('jam_masuk');
            $table->bigInteger('id_ruang');
            $table->string('biaya')->nullable();
            $table->string('menginap')->nullable();
            $table->date('tanggal keluar')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ptugasmasuk');
    }
};
