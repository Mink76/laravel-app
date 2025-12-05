📝 Laravel 12 Blog API — Authentication, Authorization & Role-Based CRUD

Laravel Blog API ini dibangun menggunakan Laravel 12 dan PHP 8.2, menyediakan sistem manajemen postingan (Blog Posts) lengkap dengan Authentication, Authorization, dan Role-Based Access Control (RBAC).
Project ini sangat cocok untuk backend aplikasi web atau mobile karena mengikuti standar REST API modern.

⭐ Fitur Utama
🔐 1. Authentication

Menggunakan Laravel Sanctum / Token Based Authentication:

Register

Login

Logout

Proteksi endpoint menggunakan token

👥 2. Role-Based Authorization

Akses ditentukan oleh role user:

🛠 Admin

Create Post

Read Post

Update Post

Delete Post
(CRUD lengkap)

👤 User

Create Post

Read Post
TIDAK bisa update & delete

👀 Guest

Read Post tanpa autentikasi

📰 3. Fitur Blog

CRUD Post dengan validasi

Relasi antara User ↔ Posts

Pagination

Clean & maintainable structure

Middleware role-based access

🧩 ERD (Entity Relationship Diagram)
+-------------------+          +------------------+
|      users        | 1      N |      posts       |
+-------------------+----------+------------------+
| id (PK)           |          | id (PK)          |
| name              |          | user_id (FK)     |
| email             |          | title            |
| password          |          | content          |
| role (admin/user) |          | created_at       |
| created_at        |          | updated_at       |
+-------------------+          +------------------+

🔧 Instalasi & Setup Project
1️⃣ Clone Repository
git clone https://github.com/Mink76/laravel-app.git
cd laravel-app

2️⃣ Install Dependencies
composer install

3️⃣ Copy & Konfigurasi Environment
cp .env.example .env


Ubah pengaturan database di .env:

DB_DATABASE=laravel_blog
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Generate App Key
php artisan key:generate

5️⃣ Migrasi Database
php artisan migrate

6️⃣ Jalankan Server Development
php artisan serve

📌 Dokumentasi API (Ringkas)
🔐 Authentication
Register
POST /api/register

Login
POST /api/login

Logout
POST /api/logout

📰 Posts API
👀 Guest (Tanpa Token)
Method	Endpoint	Deskripsi
GET	/api/posts	Lihat semua posts
GET	/api/posts/{id}	Lihat detail post
👤 User
Method	Endpoint	Deskripsi
POST	/api/posts	Buat post baru
GET	/api/posts	Read posts
GET	/api/posts/{id}	Read detail post
🛠 Admin
Method	Endpoint	Deskripsi
PUT	/api/posts/{id}	Update post
DELETE	/api/posts/{id}	Hapus post
🧪 Header Authorization

Gunakan Bearer Token:

Authorization: Bearer <token>
Accept: application/json

🏗 Struktur Folder (Singkat)
app/
 └── Http/
      ├── Controllers/
      ├── Middleware/
      └── Requests/
routes/
 └── api.php
database/
 ├── migrations/
 └── seeders/

🛠 Teknologi yang Digunakan

Laravel 12

PHP 8.2

MySQL / MariaDB

Laravel Sanctum

REST API Architecture

🎯 Tujuan Project

Belajar membangun API backend dengan Laravel 12

Menerapkan Authentication & Role-Based Authorization

Membuat sistem blog CRUD modern yang siap diintegrasikan dengan frontend

🤝 Kontribusi

Pull request sangat diterima untuk perbaikan atau pengembangan fitur.

📄 Lisensi

Project ini bersifat open-source untuk tujuan edukasi dan pengembangan.