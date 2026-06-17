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
use Faker\Factory as Faker;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

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
        $obatIds    = [];
        for ($i = 0; $i < 25; $i++) {
            $obat = Obat::create([
                'nama_obat'         => $faker->word() . ' ' . $faker->word() . ' ' . $faker->numberBetween(10, 500) . 'mg',
                'jenis_obat'        => $faker->randomElement($jenisList),
                'satuan'            => $faker->randomElement($satuanList),
                'kategori_id'       => $faker->randomElement($kategoriIds),
                'deskripsi'         => $faker->sentence(10),
                'harga'             => $faker->numberBetween(5, 150) * 1000,
                'stok'              => $faker->numberBetween(5, 200),
                'tanggal_kadaluarsa'=> Carbon::now()->addDays($faker->numberBetween(30, 700))->format('Y-m-d'),
            ]);
            $obatIds[] = $obat->id;
        }

        // ─── 4. Pelanggan (15 records – standalone, no user_id) ──────────
        $pelangganIds = [];
        for ($i = 0; $i < 15; $i++) {
            $pelanggan = Pelanggan::create([
                'nama'    => $faker->name,
                'email'   => $faker->unique()->safeEmail,
                'password'=> Hash::make('password'),
                'no_telp' => $faker->numerify('08##########'),
                'alamat'  => $faker->address,
            ]);
            $pelangganIds[] = $pelanggan->id;
        }

        // ─── 5. Resep (15 records) ────────────────────────────────────────
        $resepIds = [];
        foreach ($pelangganIds as $pId) {
            $resep = Resep::create([
                'pelanggan_id' => $pId,
                'file_resep'   => 'resep/default.jpg',
                'status'       => $faker->randomElement(['Menunggu Verifikasi', 'Disetujui', 'Ditolak']),
                'catatan'      => 'Resep dokter: ' . $faker->word() . ' untuk keluhan ' . $faker->word(),
            ]);
            $resepIds[] = $resep->id;
        }

        // ─── 6. Pesanan + DetailPesanan + Pembayaran (15 each) ───────────
        $statusOptions = ['Menunggu Pembayaran', 'Diproses', 'Siap Diambil', 'Selesai', 'Dibatalkan'];
        $metodeBayar   = ['QRIS', 'Transfer Bank', 'E-Wallet', 'COD'];

        for ($i = 0; $i < 15; $i++) {
            $pesananStatus = $faker->randomElement($statusOptions);
            $tglPesanan    = Carbon::now()->subDays($faker->numberBetween(1, 60))->format('Y-m-d');

            $pesanan = Pesanan::create([
                'pelanggan_id'    => $faker->randomElement($pelangganIds),
                'resep_id'        => null,
                'tanggal_pesanan' => $tglPesanan,
                'total_harga'     => 0,
                'status'          => $pesananStatus,
            ]);

            // 1–3 detail items per pesanan
            $total = 0;
            $numItems = $faker->numberBetween(1, 3);
            for ($d = 0; $d < $numItems; $d++) {
                $obat    = Obat::find($faker->randomElement($obatIds));
                $jumlah  = $faker->numberBetween(1, 5);
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
                    'metode_pembayaran' => $faker->randomElement($metodeBayar),
                    'jumlah_bayar'      => $total,
                    'status_pembayaran' => 'Lunas',
                    'tanggal_pembayaran'=> Carbon::parse($tglPesanan)->addHours(rand(1, 24))->format('Y-m-d'),
                ]);
            }
        }
    }
}
