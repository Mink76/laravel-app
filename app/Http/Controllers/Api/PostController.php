<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of posts
     * GET /api/posts
     */
    public function index()
    {
        // Ambil semua posts dengan relasi category dan user
        $posts = Post::with(['category', 'user'])->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List of all posts',
            'data' => $posts,
            'total' => $posts->count()
        ], 200);
    }

    /**
     * Display the specified post
     * GET /api/posts/{id}
     */
    public function show($id)
    {
        // Cari post berdasarkan ID
        $post = Post::with(['category', 'user'])->find($id);

        // Jika post tidak ditemukan
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found',
                'data' => null
            ], 404);
        }

        // Jika post ditemukan
        return response()->json([
            'success' => true,
            'message' => 'Post details',
            'data' => $post
        ], 200);
    }

    /**
     * Store a newly created post
     * POST /api/posts
     */
    /**
     * Store a newly created post
     * POST /api/posts
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'category_id' => 'required|exists:categories,id',
                'user_id' => 'required|exists:users,id'
            ]);

            // Create post
            $post = Post::create($validated);
            
            // Load relasi
            $post->load(['category', 'user']);

            return response()->json([
                'success' => true,
                'message' => 'Post created successfully',
                'data' => $post
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangani validation error khusus untuk API
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            // Tangani general error
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'error' => config('app.debug') ? $e->getMessage() : 'Something went wrong'
            ], 500);
        }
    }

    /**
     * Update the specified post
     * PUT /api/posts/{id}
     */
    /**
     * Update the specified post
     * PUT /api/posts/{id}
     */
    public function update(Request $request, $id)
    {
        try {
            $post = Post::find($id);

            if (!$post) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found'
                ], 404);
            }

            $validated = $request->validate([
                'title' => 'sometimes|required|max:255',
                'content' => 'sometimes|required',
                'category_id' => 'sometimes|required|exists:categories,id'
            ]);

            $post->update($validated);
            $post->load(['category', 'user']);

            return response()->json([
                'success' => true,
                'message' => 'Post updated successfully',
                'data' => $post
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Remove the specified post
     * DELETE /api/posts/{id}
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found',
                'data' => null  // ← TAMBAHKAN INI
            ], 404);
        }

        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully',
            'deleted_id' => $id
        ], 200);
    }
}