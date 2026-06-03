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
        Schema::create('obats', function (Blueprint $table) {

            $table->id();

            $table->string('nama_obat');

            $table->string('jenis_obat');

            $table->date('tanggal_kadaluarsa');

            $table->integer('harga');

            $table->string('satuan');

            $table->integer('stok');

            $table->text('deskripsi')->nullable();

            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
