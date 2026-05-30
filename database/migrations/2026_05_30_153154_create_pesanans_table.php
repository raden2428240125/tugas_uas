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
        Schema::create('pesanans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pelanggan_id')
                ->constrained('pelanggans')
                ->onDelete('cascade');

            $table->foreignId('resep_id')
                ->nullable()
                ->constrained('reseps')
                ->onDelete('set null');

            $table->date('tanggal_pesanan');

            $table->integer('total_harga');

            $table->enum('status', [
                'Menunggu Pembayaran',
                'Diproses',
                'Siap Diambil',
                'Selesai',
                'Dibatalkan'
            ])->default('Menunggu Pembayaran');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
