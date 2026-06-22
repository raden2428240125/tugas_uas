<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Obat;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Pembayaran;
use App\Models\Resep;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ─── 1. Admin User ───────────────────────────────────────────────
        if (!User::where('email', 'admin@sipa.com')->exists()) {
            User::factory()->create([
                'name'     => 'Administrator',
                'email'    => 'admin@sipa.com',
                'password' => Hash::make('ryhar123'),
                'role'     => 'admin',
            ]);
        }

        // ─── 2. Kategori (15 records) ────────────────────────────────────
        $kategoriNames = [
            'Obat Bebas', 'Obat Keras', 'Vitamin', 'Suplemen',
            'Alat Kesehatan', 'Herbal', 'Perawatan Bayi', 'Perawatan Kulit',
            'Antibiotik', 'Analgesik', 'Obat Mata', 'Obat Gosok',
            'Obat Batuk', 'Obat Tetes', 'Sirup Anak',
        ];
        $kategoriIds = [];
        foreach ($kategoriNames as $name) {
            $cat = Kategori::firstOrCreate(['nama_kategori' => $name]);
            $kategoriIds[] = $cat->id;
        }

        // ─── 3. Obat (25 records) ────────────────────────────────────────
        $jenisList  = ['Tablet', 'Kapsul', 'Sirup', 'Salep', 'Injeksi', 'Puyer'];
        $satuanList = ['Strip', 'Botol', 'Tube', 'Pcs', 'Papan', 'Box'];
        $kataObat   = ['Panadol', 'Bodrex', 'Paramex', 'Sanmol', 'Oskadon', 'Promag', 'Mylanta'];
        $obatIds    = [];
        for ($i = 0; $i < 25; $i++) {
            $obat = Obat::create([
                'nama_obat'         => $kataObat[array_rand($kataObat)] . ' ' . rand(10, 500) . 'mg',
                'jenis_obat'        => $jenisList[array_rand($jenisList)],
                'satuan'            => $satuanList[array_rand($satuanList)],
                'kategori_id'       => $kategoriIds[array_rand($kategoriIds)],
                'deskripsi'         => 'Obat berkhasiat tinggi untuk mengatasi berbagai macam penyakit secara efektif.',
                'harga'             => rand(5, 150) * 1000,
                'stok'              => rand(5, 200),
                'tanggal_kadaluarsa'=> Carbon::now()->addDays(rand(30, 700))->format('Y-m-d'),
            ]);
            $obatIds[] = $obat->id;
        }

        // ─── 4. Pelanggan (15 records – standalone, no user_id) ──────────
        $pelangganIds = [];
        for ($i = 0; $i < 15; $i++) {
            $pelanggan = Pelanggan::create([
                'nama'    => 'Pelanggan ' . ($i + 1),
                'email'   => 'pelanggan' . ($i + 1) . '@example.com',
                'password'=> Hash::make('password'),
                'no_telp' => '0812' . rand(10000000, 99999999),
                'alamat'  => 'Jl. Sudirman No. ' . rand(1, 100) . ', Palembang',
            ]);
            $pelangganIds[] = $pelanggan->id;
        }

        // ─── 5. Resep (15 records) ────────────────────────────────────────
        $resepIds = [];
        $statusResep = ['Menunggu Verifikasi', 'Disetujui', 'Ditolak'];
        foreach ($pelangganIds as $pId) {
            $resep = Resep::create([
                'pelanggan_id' => $pId,
                'file_resep'   => 'resep/default.jpg',
                'status'       => $statusResep[array_rand($statusResep)],
                'catatan'      => 'Resep dokter spesialis nomor ' . rand(100, 999),
            ]);
            $resepIds[] = $resep->id;
        }

        // ─── 6. Pesanan + DetailPesanan + Pembayaran (15 each) ───────────
        $statusOptions = ['Menunggu Pembayaran', 'Diproses', 'Siap Diambil', 'Selesai', 'Dibatalkan'];
        $metodeBayar   = ['QRIS', 'Transfer Bank', 'E-Wallet', 'COD'];

        for ($i = 0; $i < 15; $i++) {
            $pesananStatus = $statusOptions[array_rand($statusOptions)];
            $tglPesanan    = Carbon::now()->subDays(rand(1, 60))->format('Y-m-d');

            $pesanan = Pesanan::create([
                'pelanggan_id'    => $pelangganIds[array_rand($pelangganIds)],
                'resep_id'        => null,
                'tanggal_pesanan' => $tglPesanan,
                'total_harga'     => 0,
                'status'          => $pesananStatus,
            ]);

            // 1–3 detail items per pesanan
            $total = 0;
            $numItems = rand(1, 3);
            for ($d = 0; $d < $numItems; $d++) {
                $obat    = Obat::find($obatIds[array_rand($obatIds)]);
                $jumlah  = rand(1, 5);
                $subtotal = $obat->harga * $jumlah;

                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'obat_id'    => $obat->id,
                    'jumlah'     => $jumlah,
                    'subtotal'   => $subtotal,
                ]);
                $total += $subtotal;
            }

            $pesanan->update(['total_harga' => $total]);

            // Create payment for non-pending, non-cancelled orders
            if (!in_array($pesananStatus, ['Menunggu Pembayaran', 'Dibatalkan'])) {
                Pembayaran::create([
                    'pesanan_id'        => $pesanan->id,
                    'metode_pembayaran' => $metodeBayar[array_rand($metodeBayar)],
                    'jumlah_bayar'      => $total,
                    'status_pembayaran' => 'Lunas',
                    'tanggal_pembayaran'=> Carbon::parse($tglPesanan)->addHours(rand(1, 24))->format('Y-m-d'),
                ]);
            }
        }
    }
}
