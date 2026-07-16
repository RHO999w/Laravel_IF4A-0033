<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $categories = Post::pluck('category')->filter()->unique()->values();

        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|string|max:1000',
            'publisher' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:50',
            'tanggal_kejadian' => 'nullable|date',
            'published' => 'required|in:yes,no',
        ]);

        $data['publisher'] = $data['publisher'] ?: 'Kabar Burung';
        $data['category'] = $data['category'] ?: 'Umum';
        $data['tanggal_kejadian'] = $data['tanggal_kejadian'] ?: now()->toDateString();

        $post = Post::create($data);

        return redirect()->route('posts.show', $post)->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * UPDATE - Tampilkan form edit berita.
     */
    public function edit(Post $post)
    {
        $categories = Post::pluck('category')->filter()->unique()->values();

        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * UPDATE - Simpan perubahan berita ke database.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|string|max:1000',
            'publisher' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:50',
            'tanggal_kejadian' => 'nullable|date',
            'published' => 'required|in:yes,no',
        ]);

        $data['publisher'] = $data['publisher'] ?: 'Kabar Burung';
        $data['category'] = $data['category'] ?: 'Umum';
        $data['tanggal_kejadian'] = $data['tanggal_kejadian'] ?: now()->toDateString();

        $post->update($data);

        return redirect()->route('posts.show', $post)->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/')->with('success', 'Berita berhasil dihapus.');
    }
}
