@extends('master')

@section('title', 'Kabar Burung — Portal Berita')

@section('body')
<div class="kb">

<style>
    .kb {
        --kb-red: #E0302B;
        --kb-ink: #16181D;
        --kb-paper: #F6F5F1;
        --kb-muted: #6B7280;
        --kb-gold: #F2A93B;
        --kb-line: #E5E2DA;
        color: var(--kb-ink);
        font-family: 'Inter', system-ui, sans-serif;
        width: 100%;
    }
    .kb-bleed {
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
    }
    .kb-display { font-family: 'Anton', 'Inter', sans-serif; text-transform: uppercase; letter-spacing: .01em; }
    .kb-mono { font-family: 'IBM Plex Mono', monospace; letter-spacing: .04em; }
    .kb a { color: inherit; text-decoration: none; }

    .kb-ticker { background: var(--kb-ink); overflow: hidden; padding: 8px 0; }
    .kb-ticker__track { display: flex; width: max-content; animation: kb-scroll 32s linear infinite; }
    .kb-ticker__track span { color: #fff; font-size: .78rem; padding: 0 2.5rem; white-space: nowrap; opacity: .85; }
    @keyframes kb-scroll { from { transform: translateX(0); } to { transform: translateX(-50%); } }
    @media (prefers-reduced-motion: reduce) { .kb-ticker__track { animation: none; overflow-x: auto; } }

    .kb-masthead { background: var(--kb-paper); border-bottom: 3px solid var(--kb-ink); padding: 1.5rem 0 1rem; }
    .kb-logo { font-size: clamp(2.1rem, 5vw, 3rem); line-height: .9; color: var(--kb-ink); }
    .kb-logo .dot { color: var(--kb-red); }
    .kb-tagline { color: var(--kb-muted); font-size: .72rem; text-transform: uppercase; }
    .kb-pill {
        border: 1.5px solid var(--kb-ink); background: transparent; color: var(--kb-ink);
        border-radius: 999px; padding: .3rem .9rem; font-size: .75rem; font-weight: 600;
        text-transform: uppercase; letter-spacing: .03em; cursor: pointer; transition: .15s;
    }
    .kb-pill:hover { background: var(--kb-line); }
    .kb-pill.active { background: var(--kb-red); border-color: var(--kb-red); color: #fff; }

    .kb-hero { background: var(--kb-ink); padding: 2.5rem 0 3rem; }
    .kb-hero-main {
        position: relative; border-radius: 14px; overflow: hidden; min-height: 420px;
        display: flex; align-items: flex-end; background-size: cover; background-position: center;
        box-shadow: 0 20px 40px rgba(0,0,0,.35);
    }
    .kb-hero-main::before {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(0deg, rgba(0,0,0,.92) 0%, rgba(0,0,0,.35) 55%, transparent 100%);
    }
    .kb-hero-main .kb-hero-content { position: relative; z-index: 1; padding: 2rem; color: #fff; }
    .kb-eyebrow {
        display: inline-block; color: var(--kb-red); font-size: .72rem; font-weight: 700;
        margin-bottom: .6rem;
    }
    .kb-hero-content .kb-eyebrow { color: var(--kb-gold); }
    .kb-hero-title { font-size: clamp(1.6rem, 3.4vw, 2.6rem); line-height: 1.05; margin-bottom: .7rem; }
    .kb-hero-excerpt { color: rgba(255,255,255,.8); font-size: .95rem; max-width: 44ch; margin-bottom: 1rem; }
    .kb-meta { color: var(--kb-muted); font-size: .78rem; }
    .kb-hero-content .kb-meta { color: rgba(255,255,255,.65); }
    .kb-meta b { color: inherit; }

    .kb-side-title { color: #fff; font-size: .8rem; margin-bottom: 1rem; }
    .kb-side-item { display: flex; gap: .8rem; padding: .8rem 0; border-bottom: 1px solid rgba(255,255,255,.1); text-decoration: none; }
    .kb-side-item:last-child { border-bottom: none; }
    .kb-side-thumb { width: 68px; height: 68px; border-radius: 8px; object-fit: cover; flex-shrink: 0; }
    .kb-side-item .kb-hero-title { font-size: .92rem; color: #fff; margin-bottom: .25rem; line-height: 1.2; }
    .kb-side-item .kb-eyebrow { font-size: .62rem; margin-bottom: .2rem; }

    .kb-section { background: var(--kb-paper); padding: 3rem 0 4rem; }
    .kb-section-title { font-size: 1.6rem; margin-bottom: .3rem; }
    .kb-section-sub { color: var(--kb-muted); font-size: .85rem; margin-bottom: 1.5rem; }

    .kb-card { background: #fff; border: 1px solid var(--kb-line); border-radius: 12px; overflow: hidden; height: 100%; transition: transform .15s, box-shadow .15s; text-decoration: none; color: var(--kb-ink); display: flex; flex-direction: column; }
    .kb-card:hover { transform: translateY(-4px); box-shadow: 0 12px 24px rgba(0,0,0,.08); color: var(--kb-ink); }
    .kb-card img { width: 100%; height: 170px; object-fit: cover; }
    .kb-card-body { padding: 1.1rem; display: flex; flex-direction: column; flex: 1; }
    .kb-card-title { font-size: 1.05rem; line-height: 1.25; margin-bottom: .5rem; }
    .kb-card-excerpt { color: var(--kb-muted); font-size: .85rem; margin-bottom: .9rem; flex: 1; }
    .kb-card-foot { border-top: 1px dashed var(--kb-line); padding-top: .7rem; display: flex; justify-content: space-between; align-items: center; }

    .kb-empty { text-align: center; padding: 4rem 1rem; color: var(--kb-muted); }

    .kb-footer { background: var(--kb-ink); color: rgba(255,255,255,.6); padding: 1.5rem 0; font-size: .8rem; }
    .kb-footer-links a { color: rgba(255,255,255,.6); text-decoration: none; margin-left: 1.2rem; }
    .kb-footer-links a:hover { color: #fff; }
</style>

<div class="kb-ticker kb-bleed">
    <div class="kb-ticker__track">
        @for ($i = 0; $i < 2; $i++)
            @forelse ($posts as $p)
                <span>Katanya sih — {{ $p->title }}</span>
            @empty
                <span>Belum ada kabar burung yang beredar hari ini...</span>
            @endforelse
        @endfor
    </div>
</div>

<div class="kb-masthead kb-bleed">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
            <div>
                <div class="kb-logo kb-display">Kabar<span class="dot">.</span>Burung</div>
                <div class="kb-tagline kb-mono">belum tentu akurat, tapi dijamin seru</div>
            </div>
            <div class="d-flex flex-wrap gap-2" id="kb-filters">
                <button type="button" class="kb-pill kb-mono active" data-filter="Semua">Semua</button>
                @foreach ($categories as $cat)
                    <button type="button" class="kb-pill kb-mono" data-filter="{{ $cat }}">{{ $cat }}</button>
                @endforeach
            </div>
        </div>
    </div>
</div>

@if ($headline)
<div class="kb-hero kb-bleed">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <a href="{{ route('posts.show', $headline) }}" class="kb-hero-main" style="background-image:url('{{ $headline->thumbnail }}')">
                    <div class="kb-hero-content">
                        <span class="kb-eyebrow kb-mono">Headline · {{ $headline->category }}</span>
                        <h1 class="kb-hero-title kb-display">{{ $headline->title }}</h1>
                        <p class="kb-hero-excerpt">{{ $headline->excerpt }}</p>
                        <div class="kb-meta kb-mono"><b>{{ $headline->publisher }}</b> · {{ optional($headline->tanggal_kejadian)->format('d M Y') ?? $headline->created_at->format('d M Y') }}</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <div class="kb-side-title kb-mono">Kicauan Lainnya</div>
                @foreach ($rest->take(3) as $side)
                    <a href="{{ route('posts.show', $side) }}" class="kb-side-item">
                        <img src="{{ $side->thumbnail }}" class="kb-side-thumb" alt="{{ $side->title }}">
                        <div>
                            <span class="kb-eyebrow kb-mono">{{ $side->category }}</span>
                            <div class="kb-hero-title kb-display">{{ Str::limit($side->title, 60) }}</div>
                            <div class="kb-meta kb-mono">{{ optional($side->tanggal_kejadian)->format('d M Y') ?? $side->created_at->format('d M Y') }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

<div class="kb-section kb-bleed">
    <div class="container">
        <h2 class="kb-section-title kb-display">Semua Kabar</h2>
        <p class="kb-section-sub">{{ $posts->count() }} berita beredar · klik kategori di atas untuk menyaring</p>

        @if ($posts->isEmpty())
            <div class="kb-empty">
                <p class="kb-mono">Belum ada data berita.</p>
                <p>Jalankan <code>php artisan db:seed --class=PostSeeder</code> untuk mengisi data contoh.</p>
            </div>
        @else
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                @foreach ($rest as $post)
                    <div class="col kb-card-col" data-category="{{ $post->category }}">
                        <a href="{{ route('posts.show', $post) }}" class="kb-card">
                            <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
                            <div class="kb-card-body">
                                <span class="kb-eyebrow kb-mono">{{ $post->category }}</span>
                                <div class="kb-card-title kb-display">{{ $post->title }}</div>
                                <p class="kb-card-excerpt">{{ $post->excerpt }}</p>
                                <div class="kb-card-foot">
                                    <span class="kb-meta"><b>{{ $post->publisher }}</b></span>
                                    <span class="kb-meta kb-mono">{{ optional($post->tanggal_kejadian)->format('d M Y') ?? $post->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<div class="kb-footer kb-bleed">
    <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>&copy; {{ date('Y') }} Kabar.Burung. Seluruh hak cipta dilindungi.</div>
        <div class="kb-footer-links">
            <a href="#">Tentang</a>
            <a href="#">Redaksi</a>
            <a href="#">Kontak</a>
        </div>
    </div>
</div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var pills = document.querySelectorAll('#kb-filters .kb-pill');
    var cards = document.querySelectorAll('.kb-card-col');

    pills.forEach(function (pill) {
        pill.addEventListener('click', function () {
            pills.forEach(function (p) { p.classList.remove('active'); });
            pill.classList.add('active');

            var filter = pill.dataset.filter;
            cards.forEach(function (card) {
                var match = (filter === 'Semua' || card.dataset.category === filter);
                card.classList.toggle('d-none', !match);
            });
        });
    });
});
</script>
@stop   