<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('transaksis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('kendaraan_id')->constrained()->onDelete('cascade');
        $table->date('tanggal_sewa');
        $table->integer('durasi_hari');
        $table->enum('status', ['belum_dibayar', 'diproses', 'selesai', 'dibatalkan']);
        $table->decimal('total_harga', 10, 2);
        $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
