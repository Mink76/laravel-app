# 🌐 Laravel 12 Blog API

<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" width="100" alt="Laravel Logo">
  <br>
  <b>RESTful API Blog</b> menggunakan Laravel 12 & PHP 8.2
</p>

<p align="center">
  Sebuah API blog modern dengan sistem autentikasi, otorisasi berbasis peran, dan operasi CRUD lengkap.
  <br>
  Didesain sebagai backend untuk aplikasi Web & Mobile.
</p>

<p align="center">
  <a href="#-fitur-utama">Fitur</a> •
  <a href="#-teknologi-yang-digunakan">Teknologi</a> •
  <a href="#-endpoint-api">Endpoint</a> •
  <a href="#-instalasi">Instalasi</a> •
  <a href="#-struktur-folder">Struktur</a>
</p>

## 🚀 Fitur Utama

| Fitur | Deskripsi |
|-------|-----------|
| 🔐 **Authentication** | Register, Login, Logout dengan token |
| 👥 **Role-based Authorization** | 3 level akses: Admin, User, Guest |
| 📝 **CRUD Blog Posts** | Lengkap dengan validasi |
| 🧩 **User–Posts Relationship** | Relasi One-to-Many |
| 🎯 **Token-based API** | Menggunakan Laravel Sanctum |
| 📦 **Clean Architecture** | Struktur project yang terorganisir |

## 👥 Role & Hak Akses

| Role | Create | Read | Update | Delete |
|------|--------|------|--------|--------|
| **Admin** | ✅ | ✅ | ✅ | ✅ |
| **User** | ✅ | ✅ | ❌ | ❌ |
| **Guest** | ❌ | ✅ | ❌ | ❌ |

## 🛠 Teknologi yang Digunakan

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat&logo=mysql&logoColor=white)
![Laravel Sanctum](https://img.shields.io/badge/Laravel_Sanctum-3.0-FF2D20?style=flat&logo=laravel&logoColor=white)
![REST API](https://img.shields.io/badge/REST_API-JSON-00A98F?style=flat&logo=json&logoColor=white)

## 📌 Endpoint API

### 🔐 Authentication

| Method | Endpoint | Deskripsi | Auth Required |
|--------|----------|-----------|---------------|
| `POST` | `/api/register` | Register user baru | ❌ |
| `POST` | `/api/login` | Login dan mendapatkan token | ❌ |
| `POST` | `/api/logout` | Logout & menghapus token | ✅ |

### 📰 Posts API

| Role | Method | Endpoint | Deskripsi |
|------|--------|----------|-----------|
| **👀 Guest** | `GET` | `/api/posts` | List semua posts |
| **👀 Guest** | `GET` | `/api/posts/{id}` | Detail post spesifik |
| **👤 User** | `POST` | `/api/posts` | Create post baru |
| **🛠 Admin** | `PUT` | `/api/posts/{id}` | Update post |
| **🛠 Admin** | `DELETE` | `/api/posts/{id}` | Delete post |

## 🏗 ERD – Entity Relationship Diagram

```
+-------------------+           +-------------------+
|      users        |    1:N    |      posts        |
+-------------------+-----------+-------------------+
| id (PK)           |<--------->| id (PK)           |
| name              |           | user_id (FK)      |
| email             |           | title             |
| password          |           | content           |
| role              |           | created_at        |
| created_at        |           | updated_at        |
| updated_at        |           +-------------------+
+-------------------+
```

## 📂 Struktur Folder (Ringkas)

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   └── PostController.php
│   ├── Middleware/
│   │   ├── CheckAdmin.php
│   │   └── CheckUser.php
│   └── Requests/
│       ├── StorePostRequest.php
│       └── UpdatePostRequest.php
├── Models/
│   ├── User.php
│   └── Post.php
routes/
└── api.php
database/
├── migrations/
│   ├── create_users_table.php
│   └── create_posts_table.php
└── seeders/
    └── DatabaseSeeder.php
```

## ⚙️ Instalasi

### 1️⃣ Clone Repository
```bash
git clone https://github.com/USERNAME/laravel-app.git
cd laravel-app
```

### 2️⃣ Install Dependencies
```bash
composer install
```

### 3️⃣ Konfigurasi Environment
```bash
cp .env.example .env
```

Sesuaikan konfigurasi database di file `.env`:
```env
DB_DATABASE=laravel_blog
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Generate Application Key
```bash
php artisan key:generate
```

### 5️⃣ Migrate Database
```bash
php artisan migrate
```

### 6️⃣ Jalankan Development Server
```bash
php artisan serve
```

Server akan berjalan di: `http://localhost:8000`

## 🧪 Authentication Header

Untuk mengakses endpoint yang membutuhkan autentikasi, sertakan header berikut:

```http
Authorization: Bearer <your-token-here>
Accept: application/json
Content-Type: application/json
```

## 📦 Contoh Request

### Register User
```bash
curl -X POST http://localhost:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }'
```

### Login
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "john@example.com",
    "password": "password123"
  }'
```

### Create Post (User/Admin)
```bash
curl -X POST http://localhost:8000/api/posts \
  -H "Authorization: Bearer <token>" \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Judul Post Pertama",
    "content": "Konten dari post pertama..."
  }'
```

## 🎯 Tujuan Pengembangan

- ✅ Belajar membuat REST API modern dengan Laravel 12
- ✅ Implementasi Authentication & Authorization berbasis role
- ✅ Membuat backend blog yang siap dipakai frontend (Web/Mobile)
- ✅ Penerapan best practices dalam pengembangan API

## 🤝 Kontribusi

Kontribusi sangat diterima! Untuk berkontribusi:

1. Fork repository
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buka Pull Request

## 📄 License

Project ini bersifat open-source dan dapat dikembangkan lebih lanjut sesuai kebutuhan.

## ❤️ Terima Kasih

Jika project ini membantu Anda, jangan lupa berikan ⭐ di GitHub!

---

<p align="center">
  <b>Dibuat dengan ❤️ menggunakan Laravel 12</b>
  <br>
  <sub>Untuk keperluan pembelajaran dan pengembangan backend modern</sub>
</p>

<p align="center">
  <img src="https://img.shields.io/github/stars/USERNAME/repo?style=social" alt="GitHub Stars">
  <img src="https://img.shields.io/github/forks/USERNAME/repo?style=social" alt="GitHub Forks">
</p>