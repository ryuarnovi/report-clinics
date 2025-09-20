<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->string('no_batch');
            $table->date('exp_date');
            $table->integer('stok_awal');
            Schema::table('obat', function (Blueprint $table) {
        if (!Schema::hasColumn('obat', 'jumlah_masuk')) {
            $table->integer('jumlah_masuk')->default(0);
        }
        if (!Schema::hasColumn('obat', 'jumlah_keluar')) {
            $table->integer('jumlah_keluar')->default(0);
        }
    });// Tambahkan ini
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};