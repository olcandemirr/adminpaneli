@extends('admin.layouts.master')

@section('title', 'Oyunlar')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>🎮 Oyunlar</h2>
    <div>
        <!-- Arama Formu -->
        <form action="{{ route('games.index') }}" method="GET" class="d-inline">
            <input type="text" name="search" class="form-control d-inline w-auto"
                placeholder="Oyun Ara..." value="{{ request()->query('search') }}">
            <button type="submit" class="btn btn-primary">🔍 Ara</button>
        </form>
        <!-- Yeni Oyun Ekleme -->
        <a href="{{ route('games.create') }}" class="btn btn-success">➕ Yeni Oyun</a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered" id="gamesTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Oyun Resmi</th>
            <th>Oyun Adı</th>
            <th>Kategori Adı</th>
            <th>Etiketler</th>
            <th>Durum</th>
            <th>Açıklama</th>
            <th>Meta Title</th>
            <th>Oynanma Sayısı</th>
            <th>İşlemler</th>

        </tr>
    </thead>
    <tbody>
        @foreach($games as $game)
        <tr>

            <td>{{ $game->id }}</td>
            <td>
                @if($game->image)
                <img src="{{ asset('storage/games' . $game->image) }}" width="150" class="rounded shadow">
                {{-- DEBUG: URL’yi metin olarak yazdırma --}}
                <small class="text-muted">
                    {{ asset('storage/' . $game->image) }}
                </small>
                @else
                <span class="text-muted">Oyun resmi bulunamadı</span>
                @endif
            </td>



            <td>{{ $game->name }}</td>
            <td>@if ($game->category)
                {{ $game->category->name }}
                @else
                <span class="text-danger">Kategori bulunamadı</span>
                @endif
            </td>
            <td>{{ $game->tags ?? '-' }}</td>
            <td>
                @if($game->is_active)
                <span class="badge bg-success">Aktif</span>
                @else
                <span class="badge bg-danger">Pasif</span>
                @endif
            </td>
            <td>{{ $game->description ?? '-' }}</td>
            <td>{{ $game->meta_title ?? '-' }}</td>

            <td>{{ $game->played_count }}</td>
            <td>
                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning btn-sm">✏️ Düzenle</a>
                <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Bu oyunu silmek istediğinize emin misiniz?')">
                        🗑️ Sil
                    </button>
                </form>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>
@endsection