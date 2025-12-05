🌐 Laravel 12 Blog API
🔐 CRUD Posts — Authentication & Authorization (Admin/User/Guest)
<p align="center"> <img src="https://laravel.com/img/logomark.min.svg" width="100"> </p> <p align="center"> <b>RESTful API Blog</b> menggunakan Laravel 12 & PHP 8.2, dengan fitur CRUD Posts, Authentication, Authorization, dan Role-Based Access (Admin, User, Guest). <br> Didesain untuk backend aplikasi Web & Mobile. </p>
🚀 Fitur Utama

🔐 Authentication (Register, Login, Logout)

👥 Role-based authorization

Admin → Full CRUD Posts

User → Create, Read

Guest → Read only

📝 CRUD Blog Posts

🧩 User–Posts Relationship (1:N)

🎯 Token-based API (Laravel Sanctum)

📦 Struktur project yang clean

👥 Role & Hak Akses
Role	Create	Read	Update	Delete
Admin	✔️	✔️	✔️	✔️
User	✔️	✔️	❌	❌
Guest	❌	✔️	❌	❌
🛠 Teknologi yang Digunakan

Laravel 12

PHP 8.2

Laravel Sanctum (API Token)

MySQL / MariaDB

REST API JSON Standard

📌 Endpoint API
🔐 Authentication
Method	Endpoint	Deskripsi
POST	/api/register	Register user baru
POST	/api/login	Login dan mendapatkan token
POST	/api/logout	Logout & menghapus token
📰 Posts API
👀 Guest
GET /api/posts
GET /api/posts/{id}

👤 User
POST /api/posts
GET /api/posts
GET /api/posts/{id}

🛠 Admin
PUT /api/posts/{id}
DELETE /api/posts/{id}

📂 Struktur Folder (Ringkas)
app/
 ├── Http/
 │     ├── Controllers/
 │     ├── Middleware/
 │     └── Requests/
routes/
 └── api.php
database/
 ├── migrations/
 └── seeders/

🏗 ERD – Entity Relationship Diagram
+-------------------+          +------------------+
|      users        | 1      N |      posts       |
+-------------------+----------+------------------+
| id                |          | id               |
| name              |          | user_id          |
| email             |          | title            |
| password          |          | content          |
| role              |          | created_at       |
+-------------------+          | updated_at       |
                               +------------------+

⚙️ Instalasi
1️⃣ Clone Repository
git clone https://github.com/USERNAME/laravel-app.git
cd laravel-app

2️⃣ Install Dependencies
composer install

3️⃣ Konfigurasi File Environment
cp .env.example .env


Sesuaikan database:

DB_DATABASE=laravel_blog
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Generate Key
php artisan key:generate

5️⃣ Migrate Database
php artisan migrate

6️⃣ Jalankan Server
php artisan serve

🧪 Authentication Header

Gunakan token:

Authorization: Bearer <token>
Accept: application/json

🎯 Tujuan Pengembangan

Belajar membuat REST API modern dengan Laravel 12

Implementasi Authentication & Authorization berbasis role

Membuat backend blog yang siap dipakai frontend (Web/Mobile)

🤝 Kontribusi

Kontribusi terbuka untuk siapa pun melalui Pull Request.

📄 License

Project ini bersifat open-source dan dapat dikembangkan lebih lanjut sesuai kebutuhan.

❤️ Terima Kasih

Jika project ini membantu, jangan lupa ⭐ di GitHub.