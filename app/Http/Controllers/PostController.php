<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of posts
     * GUEST BISA AKSES INI
     */
    public function index()
    {
        $posts = Post::with(['category', 'user'])->latest()->get();
        
        return view('posts.index', compact('posts'))
            ->with('title', 'Daftar Post');
    }

    /**
     * Show the form for creating a new post
     * HANYA USER LOGIN
     */

    // Menampilkan detail post (Guest bisa akses) - TAMBAHKAN INI
    public function show(Post $post)
    {
        // Load relasi category dan user
        $post->load(['category', 'user']);
        
        return view('posts.show', compact('post'))
            ->with('title', $post->title);
    }
    
    public function create()
    {
        // Cek authorization
        $this->authorize('create', Post::class);
        
        $categories = Category::all();
        return view('posts.create', compact('categories'))
            ->with('title', 'Buat Post Baru');
    }

    /**
     * Store a newly created post
     * HANYA USER LOGIN
     */
    public function store(Request $request)
    {
        // Cek authorization
        $this->authorize('create', Post::class);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $validated['user_id'] = auth()->id();

        Post::create($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil dibuat!');
    }

    /**
     * Show the form for editing the post
     * HANYA OWNER ATAU ADMIN
     */
    public function edit(Post $post)
    {
        // Cek authorization
        $this->authorize('update', $post);
        
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'))
            ->with('title', 'Edit Post');
    }

    /**
     * Update the post
     * HANYA OWNER ATAU ADMIN
     */
    public function update(Request $request, Post $post)
    {
        // Cek authorization
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil diupdate!');
    }

    /**
     * Remove the post
     * HANYA OWNER ATAU ADMIN
     */
    public function destroy(Post $post)
    {
        // Cek authorization
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil dihapus!');
    }
}