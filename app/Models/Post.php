<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'published',
        'image',
        'publisher',
        'category',
        'tanggal_kejadian',
    ];

    protected $casts = [
        'tanggal_kejadian' => 'date',
    ];

    /**
     * Cuplikan singkat dari content, dipakai di card berita
     * supaya tidak menampilkan seluruh isi berita di halaman utama.
     */
    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->content), 140);
    }

    /**
     * Fallback gambar kalau kolom image kosong,
     * biar layout tidak "bolong" waktu belum ada data gambar.
     */
    public function getThumbnailAttribute(): string
    {
        return $this->image ?: 'https://picsum.photos/seed/kabarburung' . $this->id . '/900/600';
    }
}
