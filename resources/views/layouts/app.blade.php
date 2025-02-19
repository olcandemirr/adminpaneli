<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="LmpZ8pXaJQuLi5YiJ0XdVnhG6rIbNF8YOQDKcALd">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="preload" as="style" href="https://admin-panell-ffac9a4a1e72.herokuapp.com/build/assets/app-27abf3b7.css" />
    <link rel="preload" as="style" href="https://admin-panell-ffac9a4a1e72.herokuapp.com/build/assets/app-9e917001.css" />
    <link rel="modulepreload" href="https://admin-panell-ffac9a4a1e72.herokuapp.com/build/assets/app-85cfc57f.js" />
    <link rel="stylesheet" href="https://admin-panell-ffac9a4a1e72.herokuapp.com/build/assets/app-27abf3b7.css" />
    <link rel="stylesheet" href="https://admin-panell-ffac9a4a1e72.herokuapp.com/build/assets/app-9e917001.css" />
    <script type="module" src="https://admin-panell-ffac9a4a1e72.herokuapp.com/build/assets/app-85cfc57f.js"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="https://admin-panell-ffac9a4a1e72.herokuapp.com">
                    Laravel
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="https://admin-panell-ffac9a4a1e72.herokuapp.com/login">Login</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Login</div>

                            <div class="card-body">
                                <form method="POST" action="https://admin-panell-ffac9a4a1e72.herokuapp.com/login">
                                    <input type="hidden" name="_token" value="LmpZ8pXaJQuLi5YiJ0XdVnhG6rIbNF8YOQDKcALd">
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                                <label class="form-check-label" for="remember">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Login
                                            </button>

                                            <a class="btn btn-link" href="https://admin-panell-ffac9a4a1e72.herokuapp.com/password/reset">
                                                Forgot Your Password?
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>