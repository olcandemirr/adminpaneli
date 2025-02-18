<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Admin Paneli</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #343a40;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            font-size: 16px;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
        }
    </style>
</head>
<body>
    /* Yan menüü */  
    <div class="sidebar">
        <h4 class="text-center">Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
        <a href="{{ route('games.index') }}">🎮 Oyunlar</a>
        <a href="{{ route('categories.index') }}">📂 Kategoriler</a>
        <a href="{{ route('searches.index') }}">🔍 Aramalar</a>
        <a href="{{ route('settings.index') }}">⚙️ Ayarlar</a>
        <hr>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            🚪 Çıkış
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
