<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Halaman utama portal berita.
     * Berita terbaru (berdasarkan tanggal_kejadian, fallback created_at)
     * dijadikan headline, sisanya ditampilkan dalam grid.
     */
    public function index()
    {
        $posts = Post::orderByDesc('tanggal_kejadian')
            ->orderByDesc('created_at')
            ->get();

        $headline = $posts->first();
        $rest = $posts->skip(1);

        $categories = $posts->pluck('category')->filter()->unique()->values();

        return view('index', compact('posts', 'headline', 'rest', 'categories'));
    }

    /**
     * Halaman detail satu berita.
     * Route model binding otomatis mengambil Post berdasarkan {post} di URL.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
