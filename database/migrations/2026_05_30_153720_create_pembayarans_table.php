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
        Schema::create('pembayarans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pesanan_id')
                ->constrained('pesanans')
                ->onDelete('cascade');

            $table->enum('metode_pembayaran', [
                'QRIS',
                'Transfer Bank',
                'E-Wallet',
                'COD'
            ]);

            $table->integer('jumlah_bayar');

            $table->enum('status_pembayaran', [
                'Belum Dibayar',
                'Menunggu Verifikasi',
                'Lunas'
            ])->default('Belum Dibayar');

            $table->date('tanggal_pembayaran')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
