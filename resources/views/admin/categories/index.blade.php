@extends('admin.layouts.master')

@section('title', 'Kategoriler')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📂 Kategoriler</h2>
    <div>
        <!-- Arama Formu -->
        <form action="{{ route('categories.index') }}" method="GET" class="d-inline">
            <input type="text" name="search" class="form-control d-inline w-auto" 
                   placeholder="Kategori Ara..." value="{{ request()->query('search') }}">
            <button type="submit" class="btn btn-primary">🔍 Ara</button>
        </form>
        <!-- Yeni Kategori Ekleme -->
        <a href="{{ route('categories.create') }}" class="btn btn-success">➕ Yeni Kategori</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered" id="categoriesTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>İkon</th>
            <th>Kategori Adı</th>
            <th>SEO URL</th>
            <th>İşlemler</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>
                @if ($category->icon)
                    <img src="{{ asset('storage/'.$category->icon) }}" width="50">
                @else
                    <span class="text-muted">ikon bulunamadı</span>
                    
                @endif
            </td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">✏️ Düzenle</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Bu kategoriyi silmek istediğinize emin misiniz?')">
                        🗑️ Sil
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
