<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Determine if the user can view any posts.
     */
    public function viewAny(?User $user): bool
    {
        return true; // Semua orang bisa lihat daftar
    }

    /**
     * Determine if the user can view the post.
     */
    public function view(?User $user, Post $post): bool
    {
        return true; // Semua orang bisa lihat detail
    }

    /**
     * Determine if the user can create posts.
     */
    public function create(User $user): bool
    {
        return $user !== null; // User login bisa create
    }

    /**
     * Determine if the user can update the post.
     */
    public function update(User $user, Post $post): bool
    {
        return $user->isAdmin(); // HANYA admin
    }

    /**
     * Determine if the user can delete the post.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->isAdmin(); // HANYA admin
    }
}