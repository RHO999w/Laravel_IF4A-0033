@extends('master')

@section('title', $post->title . ' — Kabar Burung')

@section('body')
<div class="kb">

<style>
    .kb { --kb-red:#E0302B; --kb-ink:#16181D; --kb-paper:#F6F5F1; --kb-muted:#6B7280; --kb-line:#E5E2DA;
        color: var(--kb-ink); font-family: 'Inter', system-ui, sans-serif; width: 100%; }
    .kb-bleed { width: 100vw; position: relative; left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw; }
    .kb-display { font-family: 'Anton','Inter',sans-serif; text-transform: uppercase; }
    .kb-mono { font-family: 'IBM Plex Mono', monospace; letter-spacing: .04em; }
    .kb-header { background: var(--kb-paper); border-bottom: 3px solid var(--kb-ink); padding: 1.2rem 0; }
    .kb-back { color: var(--kb-ink); text-decoration: none; font-weight: 600; font-size: .85rem; }
    .kb-back:hover { color: var(--kb-red); }
    .kb-article { padding: 2.5rem 0 4rem; max-width: 760px; margin: 0 auto; }
    .kb-eyebrow { color: var(--kb-red); font-size: .75rem; font-weight: 700; }
    .kb-title { font-size: clamp(1.8rem, 4vw, 2.6rem); line-height: 1.08; margin: .6rem 0 1rem; }
    .kb-meta { color: var(--kb-muted); font-size: .85rem; margin-bottom: 1.5rem; }
    .kb-hero-img { width: 100%; max-height: 440px; object-fit: cover; border-radius: 14px; margin-bottom: 1.8rem; }
    .kb-content { font-size: 1.05rem; line-height: 1.8; color: #2b2d33; margin-bottom: 2rem; }
    .kb-actions { display: flex; gap: .6rem; padding-top: 1.5rem; border-top: 1px solid var(--kb-line); }
    .kb-btn { padding: .5rem 1.2rem; border-radius: 8px; font-weight: 600; font-size: .9rem; text-decoration: none; border: none; cursor: pointer; }
    .kb-btn-edit { background: var(--kb-ink); color: #fff; }
    .kb-btn-edit:hover { background: #2c2f38; color: #fff; }
    .kb-btn-delete { background: #fff; color: var(--kb-red); border: 1.5px solid var(--kb-red); }
    .kb-btn-delete:hover { background: var(--kb-red); color: #fff; }
</style>

<div class="kb-header kb-bleed">
    <div class="container">
        <a href="{{ url('/') }}" class="kb-back">← Kembali ke Beranda</a>
    </div>
</div>

<div class="container">
    <div class="kb-article">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <span class="kb-eyebrow kb-mono">{{ $post->category }}</span>
        <h1 class="kb-title kb-display">{{ $post->title }}</h1>
        <div class="kb-meta kb-mono">
            <b>{{ $post->publisher }}</b> ·
            {{ optional($post->tanggal_kejadian)->format('d M Y') ?? $post->created_at->format('d M Y') }}
        </div>

        <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="kb-hero-img">

        <div class="kb-content">
            {!! nl2br(e($post->content)) !!}
        </div>

        <div class="kb-actions">
            <a href="{{ route('posts.edit', $post) }}" class="kb-btn kb-btn-edit">Edit Berita</a>

            <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Yakin mau hapus berita ini? Aksi ini tidak bisa dibatalkan.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="kb-btn kb-btn-delete">Hapus Berita</button>
            </form>
        </div>
    </div>
</div>

</div>
@stop
