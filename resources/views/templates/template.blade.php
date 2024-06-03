<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo_rempah.png') }}" alt="RempahRempah">
    <link rel="stylesheet" href="{{ asset('css/templates/template.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    @php
        $unique_ctg_groups = $category_all->unique('class');
        $index = -1;
    @endphp
    <nav class="navbar bg-dark navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home"><img id="logo" src="{{ asset('assets/logo_rempah.png') }}" alt="RempahRempah"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 225px;">
                    @foreach ($unique_ctg_groups as $unique_ctg_group)
                        @php
                            $index++;
                        @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{$unique_ctg_group->class}}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($category_all as $ctg)
                                    @if ($ctg->class == $unique_ctg_group->class)
                                        <li><a class="dropdown-item" href="/search?category{{$index}}={{$ctg->id}}">{{$ctg->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Durasi
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($duration_minutes as $minutes)
                                <li><a class="dropdown-item" href="/search?duration={{$minutes}}">&le;{{$minutes}} menit</a></li>
                            @endforeach
                            <li><a class="dropdown-item" href="/search?duration=-1">Lainnya</a></li>
                        </ul>
                    </li>
                </ul>
                @if (!request()->is('search'))
                    <form action="/search?name" class="d-flex" method="GET" id="searchForm">
                        <input type="text" class="form-control me-2 textField blackBackground" placeholder="Cari resep di sini" id="input_recipe" name="name" value="{{isset($name) ? $name : ""}}" data-type="recipe">
                        <button class="btn btn-outline-success outlinedBtn blackBackground" type="submit"><i class='fa fa-search'></i></button>
                    </form>
                @endif
                <ul class="navbar-nav profileButton">
                    <li class="nav-item dropdown">
                        <a href="#" class="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="nav-link dropdown-toggle" id="profileImg" src="{{ Auth::check() ? asset(Auth::user()->img) : asset('storage/users/default_profile_img.png') }}" alt="profile image">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if (Auth::check())
                                <li class="dropdown-item" id="profileName">
                                    {{Auth::user()->name}}
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                @if (Auth::user()->role == 'member')
                                    <li><a class="dropdown-item" href="/myProfile">Edit Profil</a></li>
                                    <li><a class="dropdown-item" href="/addRecipe">Tambah Resep</a></li>
                                    <li><a class="dropdown-item" href="#">Markah</a></li>
                                @else
                                    <li><a class="dropdown-item" href="#">Verifikasi Resep</a></li>
                                @endif
                                <li><a class="dropdown-item" href="/logout">Keluar</a></li>
                            @else
                                <li><a class="dropdown-item" href="/login">Masuk</a></li>
                                <li><a class="dropdown-item" href="/register">Daftar</a></li>
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
        <script>
            $(document).ready(function() {
                $(document).on('keypress', '#input_recipe', function(e) {
                    if (e.which === 13) {
                        $('#searchForm').submit();
                    }
                });
            });

            $('#input_recipe').typeahead({
                source: function (query, process) {
                    var type = $('#input_recipe').data('type');
                    return $.get('/showResult', {
                        query: query,
                        type: type
                    }, function (data) {
                        return process(data);
                    });
                }
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
        @include('templates/footer')
    </footer>
</body>
</html>
