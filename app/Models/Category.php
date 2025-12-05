<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;

    // Field yang boleh diisi
    protected $fillable = [
        'name',
        'description',
        'category_id',
    ];

    // Relasi ke Post (One to Many)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
