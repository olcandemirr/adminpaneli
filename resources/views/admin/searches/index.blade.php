@extends('admin.layouts.master')

@section('title', 'Arama Kayıtları')

@section('content')
<h2> Arama Kayıtları</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Aranan Kelime</th>
            <th>Arama Türü</th>
            <th>Arama Sayısı</th>
            <th>Kullanıcı</th>
            <th>Tarih</th>
        </tr>
    </thead>
    <tbody>
        @foreach($searches as $search)
        <tr>
            <td>{{ $search->id }}</td>
            <td>{{ $search->keyword }}</td>
            <td>{{ ucfirst($search->search_type) }}</td>
            <td>{{ $search->search_count }}</td>
            <td>
                @if($search->user)
                    {{ $search->user->name }} (ID: {{ $search->user->id }})
                @else
                    Ziyaretçi
                @endif
            </td>
            <td>{{ $search->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
