# Struktur Proyek `tugas_uas`

Proyek ini dibangun menggunakan framework **Laravel** (terlihat dari adanya file `artisan`, `composer.json`, serta struktur direktori yang khas). Berikut adalah penjelasan mengenai struktur direktori dan file penting dalam proyek ini:

## Direktori Utama

- **`app/`**
  Berisi inti dari aplikasi. Di sinilah Anda akan menulis sebagian besar kode logika aplikasi Anda, seperti Controllers, Models, dan Providers.
  - `app/Http/` - Berisi Controllers, Middleware, dan Requests.
  - `app/Models/` - Berisi model-model Eloquent untuk berinteraksi dengan database.
  - `app/Providers/` - Berisi semua service provider untuk aplikasi.
  - `app/View/` - Berisi komponen view (jika digunakan).

- **`bootstrap/`**
  Berisi file `app.php` yang mengatur proses bootstrap framework. Direktori ini juga menampung folder `cache` yang berisi file-file yang dihasilkan framework untuk optimasi performa seperti cache rute dan service.

- **`config/`**
  Berisi semua file konfigurasi aplikasi. Ini adalah tempat yang tepat untuk melihat-lihat berbagai opsi yang tersedia untuk mengatur database, antrean (queues), email, dsb.

- **`database/`**
  Berisi file database migrations, model factories, dan seeders. Anda juga dapat menggunakan direktori ini untuk menyimpan database SQLite jika Anda menggunakannya.

- **`public/`**
  Direktori ini berisi file `index.php`, yang merupakan titik masuk (entry point) untuk semua permintaan (requests) yang masuk ke aplikasi Anda dan mengatur proses autoloading. Direktori ini juga menampung aset publik seperti gambar, JavaScript, dan CSS.

- **`resources/`**
  Berisi view (seperti file Blade `.blade.php`) serta aset mentah yang belum dikompilasi (uncompiled) seperti CSS, JavaScript, atau bahasa.

- **`routes/`**
  Berisi semua definisi rute (routing) untuk aplikasi Anda. Secara default, terdapat beberapa file rute seperti `web.php` (rute untuk antarmuka web) dan `api.php` (rute untuk API).

- **`storage/`**
  Berisi file template Blade yang telah dikompilasi, session berbasis file, cache berbasis file, dan file lain yang dihasilkan oleh framework. Ini dipisahkan menjadi beberapa folder seperti `app`, `framework`, dan `logs`.

- **`tests/`**
  Berisi automated tests (pengujian otomatis) aplikasi Anda. Terdapat pengujian dasar yang disediakan (Feature dan Unit tests).

- **`vendor/`**
  Berisi seluruh paket dependensi (dependencies) dari Composer.

- **`node_modules/`**
  Berisi seluruh paket dependensi (dependencies) dari NPM/Node.js yang digunakan untuk frontend.

- **`.git/` & `.sixth/`**
  Direktori konfigurasi sistem version control (Git) dan tools lainnya.

## File-File Penting di Root

- **`artisan`**
  File antarmuka baris perintah (CLI) bawaan Laravel. File ini menyediakan banyak perintah (commands) yang membantu dalam membangun aplikasi.

- **`.env`** & **`.env.example`**
  File yang menyimpan variabel environment. `.env` berisi konfigurasi spesifik pada mesin lokal/server (seperti kredensial database), sedangkan `.env.example` adalah contoh struktur `.env` yang bisa dibagikan (tanpa kredensial rahasia).

- **`composer.json`** & **`composer.lock`**
  File untuk mengelola dependensi PHP proyek Anda via Composer. Menentukan paket PHP apa saja yang dibutuhkan proyek ini.

- **`package.json`** & **`package-lock.json`**
  File untuk mengelola dependensi JavaScript/CSS (frontend) melalui NPM.

- **`vite.config.js`**, **`tailwind.config.js`**, **`postcss.config.js`**
  File konfigurasi untuk tools frontend. Laravel menggunakan Vite sebagai bundler aset secara default, dan terlihat proyek ini juga menggunakan Tailwind CSS.

- **`phpunit.xml`**
  File konfigurasi khusus untuk menjalankan pengujian otomatis dengan PHPUnit.

- **`.gitignore`** & **`.gitattributes`**
  Konfigurasi Git untuk menentukan file apa saja yang harus diabaikan saat melakukan commit, serta mengatur atribut git lainnya.

- **`README.md`**
  Dokumen utama yang berisi deskripsi atau instruksi umum tentang proyek ini.
