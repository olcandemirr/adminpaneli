@extends('admin.layouts.master')

@section('title', 'Yeni Oyun Ekle')


@section('content')
<div class="container">
    <h2 class="mb-4">➕ Yeni Oyun Ekle</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<!-- burda ben formu ikiye böldüm güzelce sığması için-->
    <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- Sol Taraf -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Oyun Başlığı</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">SEF URL </label>
                    <input type="text" name="slug" id="slug" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Oyun Resmi</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Etiketler (Virgülle Ayırın)</label>
                    <input type="text" name="tags" id="tags" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Açıklama</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="game_link" class="form-label">Oyun Linki</label>
                    <input type="url" name="game_link" id="game_link" class="form-control" required>
                </div>
            </div>

            <!-- Sağ Taraf -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Kategori Seç</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="width" class="form-label">Genişlik (px)</label>
                    <input type="number" name="width" id="width" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="height" class="form-label">Yükseklik (px)</label>
                    <input type="number" name="height" id="height" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="is_active" class="form-label">Aktif / Pasif</label>
                    <select name="is_active" id="is_active" class="form-control">
                        <option value="1">Aktif</option>
                        <option value="0">Pasif</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="is_editor_choice" class="form-label">Editör Seçimi</label>
                    <select name="is_editor_choice" id="is_editor_choice" class="form-select w-75" required>
                        <option value="1" {{ old('is_editor_choice') == "1" ? 'selected' : '' }}>Evet</option>
                        <option value="0" {{ old('is_editor_choice') == "0" ? 'selected' : 'selected' }}>Hayır</option>
                    </select>
                </div>



                <div class="mb-3">
                    <label for="played_count" class="form-label">Oynanma Sayısı</label>
                    <input type="number" name="played_count" id="played_count" class="form-control" value="0">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Kaydet</button>
    </form>
</div>
@endsection
@push('scripts')
<script>
    document.getElementById('name').addEventListener('input', function() {
        let title = this.value;
        let slug = title.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
        document.getElementById('slug').value = slug;
    });
</script>
@endpush