@extends('master')

@section('title', 'Edit Berita — Kabar Burung')

@section('body')
<div class="kb">

<style>
    .kb { --kb-red:#E0302B; --kb-ink:#16181D; --kb-paper:#F6F5F1; --kb-muted:#6B7280; --kb-line:#E5E2DA;
        color: var(--kb-ink); font-family: 'Inter', system-ui, sans-serif; width: 100%; }
    .kb-bleed { width: 100vw; position: relative; left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw; }
    .kb-display { font-family: 'Anton','Inter',sans-serif; text-transform: uppercase; }
    .kb-header { background: var(--kb-paper); border-bottom: 3px solid var(--kb-ink); padding: 1.2rem 0; }
    .kb-back { color: var(--kb-ink); text-decoration: none; font-weight: 600; font-size: .85rem; }
    .kb-back:hover { color: var(--kb-red); }
    .kb-form-wrap { padding: 2.5rem 0 4rem; max-width: 720px; margin: 0 auto; }
    .kb-form-title { font-size: clamp(1.6rem, 3.5vw, 2.2rem); margin-bottom: 1.5rem; }
    .kb-btn-primary { background: var(--kb-red); border: none; color: #fff; padding: .6rem 1.6rem; border-radius: 8px; font-weight: 600; }
    .kb-btn-primary:hover { background: #b8241f; color: #fff; }
</style>

<div class="kb-header kb-bleed">
    <div class="container">
        <a href="{{ route('posts.show', $post) }}" class="kb-back">← Kembali ke Berita</a>
    </div>
</div>

<div class="container">
    <div class="kb-form-wrap">
        <h1 class="kb-form-title kb-display">Edit Berita</h1>

        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')
            @include('posts._form')

            <button type="submit" class="kb-btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

</div>
@stop
