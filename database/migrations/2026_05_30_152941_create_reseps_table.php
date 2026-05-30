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
        Schema::create('reseps', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pelanggan_id')
                ->constrained('pelanggans')
                ->onDelete('cascade');

            $table->string('file_resep');

            $table->enum('status', [
                'Menunggu Verifikasi',
                'Disetujui',
                'Ditolak'
            ])->default('Menunggu Verifikasi');

            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
