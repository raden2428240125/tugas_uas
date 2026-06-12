# Struktur Database Aplikasi Apotek / Penjualan Obat

Berdasarkan file *migration* yang ada di dalam proyek ini, berikut adalah struktur tabel-tabel utama yang membentuk basis data aplikasi ini.

---

### 1. Tabel `kategoris`
Menyimpan data kategori obat.
- `id` (Primary Key, BigInt)
- `nama_kategori` (String)
- `created_at` (Timestamp)
- `updated_at` (Timestamp)

### 2. Tabel `obats`
Menyimpan informasi detail mengenai obat.
- `id` (Primary Key, BigInt)
- `nama_obat` (String)
- `jenis_obat` (String)
- `tanggal_kadaluarsa` (Date)
- `harga` (Integer)
- `satuan` (String)
- `stok` (Integer)
- `deskripsi` (Text, Nullable)
- `kategori_id` (Foreign Key mengarah ke `kategoris.id`, Cascade Delete)
- `created_at` (Timestamp)
- `updated_at` (Timestamp)

### 3. Tabel `pelanggans`
Menyimpan data pengguna atau pelanggan yang mendaftar di sistem.
- `id` (Primary Key, BigInt)
- `nama` (String)
- `email` (String, Unique)
- `password` (String)
- `no_telp` (String)
- `alamat` (Text)
- `created_at` (Timestamp)
- `updated_at` (Timestamp)

### 4. Tabel `reseps`
Menyimpan data resep dokter yang diunggah oleh pelanggan.
- `id` (Primary Key, BigInt)
- `pelanggan_id` (Foreign Key mengarah ke `pelanggans.id`, Cascade Delete)
- `file_resep` (String) - Path/nama file resep yang diunggah.
- `status` (Enum: `'Menunggu Verifikasi'`, `'Disetujui'`, `'Ditolak'`) - Default: `'Menunggu Verifikasi'`
- `catatan` (Text, Nullable)
- `created_at` (Timestamp)
- `updated_at` (Timestamp)

### 5. Tabel `pesanans`
Menyimpan data transaksi/pesanan utama yang dilakukan pelanggan.
- `id` (Primary Key, BigInt)
- `pelanggan_id` (Foreign Key mengarah ke `pelanggans.id`, Cascade Delete)
- `resep_id` (Foreign Key mengarah ke `reseps.id`, Nullable, Set Null on Delete)
- `tanggal_pesanan` (Date)
- `total_harga` (Integer)
- `status` (Enum: `'Menunggu Pembayaran'`, `'Diproses'`, `'Siap Diambil'`, `'Selesai'`, `'Dibatalkan'`) - Default: `'Menunggu Pembayaran'`
- `created_at` (Timestamp)
- `updated_at` (Timestamp)

### 6. Tabel `detail_pesanans`
Menyimpan rincian item (obat) untuk setiap pesanan.
- `id` (Primary Key, BigInt)
- `pesanan_id` (Foreign Key mengarah ke `pesanans.id`, Cascade Delete)
- `obat_id` (Foreign Key mengarah ke `obats.id`, Cascade Delete)
- `jumlah` (Integer)
- `subtotal` (Integer)
- `created_at` (Timestamp)
- `updated_at` (Timestamp)

### 7. Tabel `pembayarans`
Menyimpan informasi status dan metode pembayaran pesanan.
- `id` (Primary Key, BigInt)
- `pesanan_id` (Foreign Key mengarah ke `pesanans.id`, Cascade Delete)
- `metode_pembayaran` (Enum: `'QRIS'`, `'Transfer Bank'`, `'E-Wallet'`, `'COD'`)
- `jumlah_bayar` (Integer)
- `status_pembayaran` (Enum: `'Belum Dibayar'`, `'Menunggu Verifikasi'`, `'Lunas'`) - Default: `'Belum Dibayar'`
- `tanggal_pembayaran` (Date, Nullable)
- `created_at` (Timestamp)
- `updated_at` (Timestamp)

---

### Relasi Antar Tabel (Entity Relationship)

- **Kategori - Obat** (1:N): Satu kategori dapat memiliki banyak obat.
- **Pelanggan - Resep** (1:N): Satu pelanggan dapat mengunggah banyak resep.
- **Pelanggan - Pesanan** (1:N): Satu pelanggan dapat melakukan banyak pesanan.
- **Resep - Pesanan** (1:N): Satu resep bisa terhubung dengan sebuah pesanan (opsional, jika pesanan membutuhkan resep).
- **Pesanan - Detail Pesanan** (1:N): Satu pesanan dapat berisi beberapa jenis obat.
- **Obat - Detail Pesanan** (1:N): Satu obat dapat menjadi bagian dari banyak detail pesanan.
- **Pesanan - Pembayaran** (1:1 / 1:N): Pesanan memiliki catatan pembayaran yang menyimpan metode dan statusnya.

*Catatan: Terdapat juga tabel default bawaan Laravel untuk sistem internal seperti `users`, `cache`, `cache_locks`, `jobs`, `job_batches`, dan `failed_jobs`.*
