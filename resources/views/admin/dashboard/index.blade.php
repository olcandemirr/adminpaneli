@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h1>📊 Dashboard</h1>
    <p>Hoş geldiniz, Admin Paneli Ana Sayfasına...</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Toplam Oyun</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalGames }}</h5>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Toplam Oynanma</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalPlayed }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">En Çok Oynanan Oyunlar</div>
                <div class="card-body">
                    <ul>
                        @foreach($topPlayedGames as $game)
                            <li>{{ $game->name }} - {{ $game->played_count }} kez</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Buğün En Çok Oynanan Oyunlar</div>
                <div class="card-body">
                    <ul>
                        @foreach($topTodayGames as $game)
                            <li>{{ $game->name }} - {{ $game->played_count }} kez</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Bu Hafta En Çok Oynanan Oyunlar</div>
                <div class="card-body">
                    <ul>
                        @foreach($topWeekGames as $game)
                            <li>{{ $game->name }} - {{ $game->played_count }} kez</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
