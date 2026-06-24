# UAS Pemrograman Web 2

- **Nama:** Alipiani Dwi Putri
- **NIM:** 312410691
- **Kelas:** I241B
- **Semester:** Semester 4
- **Mata Kuliah:** Pemrograman Web 2
- **Dosen Pengampu:** 

---

# 📚 E-Library System 

## Deskripsi Proyek

E-Library System adalah aplikasi sistem informasi rental buku dan komik digital yang dibangun menggunakan arsitektur **Decoupled (Backend-Frontend Terpisah)**. Aplikasi ini mengelola data buku, kategori genre, anggota perpustakaan, dan status peminjaman buku secara real-time.

Proyek ini dikembangkan sebagai pemenuhan Ujian Akhir Semester (UAS) mata kuliah Pemrograman Web 2, Program Studi Teknik Informatika, Universitas Pelita Bangsa.

---


- **Nama:** Alipiani Dwi Putri
- **NIM:** 312410691
- **Kelas:** I241B
- **Semester:** Semester 4
- **Mata Kuliah:** Pemrograman Web 2
- **Dosen Pengampu:** 

---

## Teknologi yang Digunakan

| Komponen | Teknologi |
|---|---|
| Backend | PHP CodeIgniter 4 (RESTful API) |
| Frontend | VueJS 3 + Vue Router (CDN) |
| Styling | TailwindCSS (CDN) |
| HTTP Client | Axios |
| Database | MySQL/MariaDB |
| Autentikasi | Token Bearer (Custom Filter) |

---

## Struktur Folder

```
UAS_Web2_NIM_AlipianiDwiPutri/
├── backend-api/        # CodeIgniter 4 - RESTful API Server
└── frontend-spa/        # VueJS 3 SPA - Frontend Aplikasi
```

---

## Fitur Utama

### 🌐 Public (Tanpa Login)
- Melihat halaman Beranda dengan ringkasan total data (buku, kategori, peminjaman aktif)

### 🔐 Administrator (Wajib Login)
- Login dengan autentikasi token
- Dashboard ringkasan data
- CRUD Data Buku
- CRUD Kategori
- CRUD Anggota
- CRUD Peminjaman
- Logout (hapus sesi & token)

### 🛡️ Keamanan
- Token Bearer Authentication untuk endpoint POST, PUT, DELETE
- CORS Filter dikonfigurasi di `Config/Filters.php`
- Axios Request Interceptor (auto-inject token)
- Axios Response Interceptor (auto-handle error 401)
- Vue Router Navigation Guard (`beforeEach`)

---

## Skema Database

Terdapat 5 tabel yang saling berelasi:

- **users** — Data akun admin
- **categories** — Kategori genre buku
- **books** — Data buku (relasi ke categories)
- **members** — Data anggota perpustakaan
- **loans** — Data peminjaman (relasi ke books & members)

### Screenshot Skema Relasi Database

![Skema Database](screenshots/skema-database.png)

---

## Cara Instalasi & Menjalankan Project

### 1. Backend (CodeIgniter 4)

```bash
cd backend-api
composer install
```

- Rename file `env` menjadi `.env`
- Atur konfigurasi database di `.env`:
```env
database.default.hostname = localhost
database.default.database = db_elibrary
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```
- Import file SQL database (lihat folder `database/` atau jalankan query manual di phpMyAdmin)
- Jalankan server:
```bash
php spark serve
```
- Backend berjalan di `http://localhost:8080`

### 2. Frontend (VueJS SPA)

- Pastikan folder `frontend-spa` berada di dalam folder `htdocs` XAMPP
- Pastikan Apache XAMPP aktif
- Akses melalui browser:
```
http://localhost/UAS_Web2_NIM_AlipianiDwiPutri/frontend-spa/
```

### 3. Login Admin

```
Username: admin
Password: admin123
```

---

## Screenshot Aplikasi

### 1. Halaman Login
![Login](screenshots/login.png)

### 2. Dashboard Admin
![Dashboard](screenshots/dashboard.png)

### 3. Form Modal Tambah/Edit Data
![Modal Form](screenshots/modal-form.png)

### 4. Tabel Data (TailwindCSS)
![Tabel Data](screenshots/tabel-data.png)

### 5. Uji Coba API Tanpa Token (Error 401) - Postman
![Error 401](screenshots/error-401.png)

---

## Link Demo & Video Presentasi

- **Link Demo:** [ISI LINK JIKA SUDAH DEPLOY, ATAU TULIS "Dijalankan secara lokal (localhost)"]
- **Link Video Presentasi:** [ISI LINK YOUTUBE SETELAH UPLOAD]

---

## Catatan Tambahan

Proyek ini menerapkan prinsip **Decoupled Architecture**, di mana backend (CodeIgniter 4) berjalan independen sebagai RESTful API Server, sementara frontend (VueJS 3) berjalan sebagai Single Page Application yang mengonsumsi API tersebut melalui HTTP request (Axios).
