# Aplikasi Kepegawaian (Laravel)

Sistem Informasi Kepegawaian adalah aplikasi berbasis web yang dikembangkan menggunakan Laravel untuk membantu pengelolaan data pegawai secara digital, terstruktur, dan efisien.

Aplikasi ini dirancang sebagai solusi untuk menggantikan sistem manual menjadi sistem terintegrasi yang mendukung pengelolaan data SDM secara modern.

---

## 🚀 Fitur Utama

* 👤 **Manajemen Data Pegawai**
  Mengelola data pegawai secara lengkap meliputi informasi personal, jabatan, dan status kepegawaian.

* 📅 **Sistem Absensi**
  Mencatat kehadiran pegawai secara digital untuk mempermudah monitoring kehadiran.

* 💰 **Informasi Penggajian**
  Menyediakan informasi terkait gaji pegawai secara terstruktur dan transparan.

* 📊 **Penilaian Kinerja Pegawai**
  Melakukan evaluasi kinerja pegawai berdasarkan kriteria tertentu untuk mendukung pengambilan keputusan.

* 📑 **Rekap Laporan Bulanan**
  Menyajikan laporan data kepegawaian, absensi, dan kinerja dalam bentuk rekap bulanan.

---

## 🛠️ Teknologi yang Digunakan

* Laravel (PHP Framework - MVC)
* Blade Template Engine
* MySQL Database
* Bootstrap / CSS

---

## 🧩 Arsitektur Sistem

Aplikasi ini menggunakan pola **MVC (Model-View-Controller)**:

* **Model** → Mengelola data (pegawai, absensi, penggajian, kinerja)
* **View** → Tampilan antarmuka menggunakan Blade
* **Controller** → Mengatur alur logika aplikasi

---

## 💡 Nilai Tambah Project

* ✅ Implementasi CRUD multi-entity (pegawai, absensi, penggajian, kinerja)
* ✅ Relasi database terstruktur (One-to-Many)
* ✅ Sistem autentikasi pengguna
* ✅ Studi kasus nyata (Human Resource Information System / HRIS)
* ✅ Clean code berbasis Laravel MVC

---

## 🧠 Problem & Solution

**Problem:**
Pengelolaan data pegawai secara manual menyebabkan data tidak terstruktur, sulit diakses, dan rawan kesalahan.

**Solution:**
Membangun sistem berbasis web menggunakan Laravel untuk mempermudah pengelolaan data pegawai secara terintegrasi, cepat, dan efisien.

---

## ⚙️ Cara Menjalankan Project

1. Clone repository

```bash
git clone https://github.com/IswatunMaimanah/apk-kepegawaian
```

2. Masuk ke folder project

```bash
cd apk-kepegawaian
```

3. Install dependency

```bash
composer install
```

4. Copy file environment

```bash
cp .env.example .env
```

5. Generate key

```bash
php artisan key:generate
```

6. Setup database di file `.env`

7. Migrasi database

```bash
php artisan migrate
```

8. Jalankan server

```bash
php artisan serve
```

---

## 🗄️ Struktur Database (Contoh)

* Pegawai
* Jabatan
* Absensi
* Penggajian
* Penilaian Kinerja

---

## 🎯 Use Case Dunia Nyata

Sistem ini dapat digunakan pada:

* Instansi pemerintah
* Perusahaan
* Organisasi

---

## 🎯 Status Project

✅ Completed
🔄 Open for improvement

---

## 👩‍💻 Author

Iswatun Maimanah
Mahasiswa Teknik Informatika

---

✨ Project ini dikembangkan sebagai portofolio untuk posisi Backend Developer / Fullstack Laravel Developer.
