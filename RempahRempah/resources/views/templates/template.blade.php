<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/templates/template.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home"><img id="logo" src="{{ asset('assets/logo_rempah.png') }}" alt="RempahRempah"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 210px;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Padang Padang Padang</a></li>
                            <li><a class="dropdown-item" href="#">a</a></li>
                            <li><a class="dropdown-item" href="#">a</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hari Spesial
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">a</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Masakan Khas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">a</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Durasi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">a</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari resep" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class='fa fa-search'></i></button>
                </form>
                <ul class="navbar-nav profileButton">
                    <li class="nav-item dropdown">
                        <a href="#" class="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Auth::check())
                                <img class="nav-link dropdown-toggle" id="profileImg" src="{{ Storage::url('public/users/'.$user->img) }}" alt="profile image">
                            @else
                                <img class="nav-link dropdown-toggle" id="profileImg" src="{{ asset('assets/default_profile_img.png') }}" alt="profile image">
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if (Auth::check())
                                <li class="dropdown-item" id="profileName">
                                    {{$user->name}}
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                @if ($user->role == 'member')
                                    <li><a class="dropdown-item" href="#">Edit Profil</a></li>
                                    <li><a class="dropdown-item" href="#">Tambah Resep</a></li>
                                    <li><a class="dropdown-item" href="#">Markah</a></li>
                                @else
                                    <li><a class="dropdown-item" href="#">Verifikasi Resep</a></li>
                                @endif
                                <li><a class="dropdown-item" href="#">Log Out</a></li>
                            @else
                                <li><a class="dropdown-item" href="#">Log In</a></li>
                                <li><a class="dropdown-item" href="#">Register</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        @yield('content')
    </div>
    <footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        @include('templates\footer')
    </footer>
</body>
</html>
