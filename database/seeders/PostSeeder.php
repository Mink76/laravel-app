<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua user dan kategori yang sudah ada
        $users = User::all();
        $categories = Category::all();

        // Validasi: Pastikan ada user dan kategori
        if ($users->isEmpty()) {
            $this->command->warn('⚠️  Tidak ada user! Jalankan UserSeeder terlebih dahulu.');
            return;
        }

        if ($categories->isEmpty()) {
            $this->command->warn('⚠️  Tidak ada kategori! Jalankan CategorySeeder terlebih dahulu.');
            return;
        }

        // Buat 15 post dengan user dan kategori random dari yang sudah ada
        $this->command->info('🌱 Membuat 15 post...');
        
        Post::factory()->count(15)->create([
            'user_id' => fn() => $users->random()->id,
            'category_id' => fn() => $categories->random()->id,
        ]);

        $this->command->info('✅ Berhasil membuat 15 post!');
    }
}