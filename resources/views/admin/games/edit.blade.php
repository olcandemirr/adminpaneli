@extends('admin.layouts.master')

@section('title', 'Oyun Düzenle')

@section('content')
<div class="container">
    <h2 class="mb-4">✏️ Oyun Düzenle</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<!-- burda ben formuyaratırkenkini kullandım ikiye böldüm güzelce sığması için-->
    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Sol Taraf -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Oyun Başlığı</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $game->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">SEF URL (Slug)</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $game->slug }}">
                </div>

                <div class="mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ $game->meta_title }}">
                </div>

                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="form-control">{{ $game->meta_description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Oyun Resmi</label>
                    <input type="file" name="image" id="image" class="form-control">

                    @if($game->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $game->image) }}" width="100" class="border rounded">
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Etiketler </label>
                    <input type="text" name="tags" id="tags" class="form-control" value="{{ $game->tags }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Açıklama</label>
                    <textarea name="description" id="description" class="form-control">{{ $game->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="game_link" class="form-label">Oyun Linki</label>
                    <input type="url" name="game_link" id="game_link" class="form-control" value="{{ $game->game_link }}" required>
                </div>
            </div>

            <!-- Sağ Taraf -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $game->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="width" class="form-label">Genişlik (px)</label>
                    <input type="number" name="width" id="width" class="form-control w-75" value="{{ $game->width }}" required>
                </div>

                <div class="mb-3">
                    <label for="height" class="form-label">Yükseklik (px)</label>
                    <input type="number" name="height" id="height" class="form-control w-75" value="{{ $game->height }}" required>
                </div>

                <div class="mb-3">
                    <label for="is_active" class="form-label">Aktif / Pasif</label>
                    <select name="is_active" id="is_active" class="form-select w-75">
                        <option value="1" {{ $game->is_active ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ !$game->is_active ? 'selected' : '' }}>Pasif</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="is_editor_choice" class="form-label">Editör Seçimi</label>
                    <select name="is_editor_choice" id="is_editor_choice" class="form-select w-75">
                        <option value="1" {{ $game->is_editor_choice ? 'selected' : '' }}>Evet</option>
                        <option value="0" {{ !$game->is_editor_choice ? 'selected' : '' }}>Hayır</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="played_count" class="form-label">Oynanma Sayısı</label>
                    <input type="number" name="played_count" id="played_count" class="form-control w-75" value="{{ $game->played_count }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Güncelle</button>
    </form>
@endsection