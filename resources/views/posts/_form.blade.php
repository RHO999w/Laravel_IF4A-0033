@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3">
    <label class="form-label">Judul Berita</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $post->title ?? '') }}" required>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Kategori</label>
        <input type="text" name="category" class="form-control" list="kb-category-list" value="{{ old('category', $post->category ?? '') }}" placeholder="Umum">
        <datalist id="kb-category-list">
            @foreach ($categories ?? [] as $cat)
                <option value="{{ $cat }}">
            @endforeach
        </datalist>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Publisher</label>
        <input type="text" name="publisher" class="form-control" value="{{ old('publisher', $post->publisher ?? '') }}" placeholder="Kabar Burung">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">URL Gambar</label>
        <input type="text" name="image" class="form-control" value="{{ old('image', $post->image ?? '') }}" placeholder="https://...">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal Kejadian</label>
        <input type="date" name="tanggal_kejadian" class="form-control" value="{{ old('tanggal_kejadian', optional($post->tanggal_kejadian ?? null)->format('Y-m-d')) }}">
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="published" class="form-select">
        <option value="yes" {{ old('published', $post->published ?? 'yes') == 'yes' ? 'selected' : '' }}>Tampilkan</option>
        <option value="no" {{ old('published', $post->published ?? 'yes') == 'no' ? 'selected' : '' }}>Sembunyikan</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Isi Berita</label>
    <textarea name="content" class="form-control" rows="10" required>{{ old('content', $post->content ?? '') }}</textarea>
</div>
