@extends('templates/profile')

@section('title', 'Rempah Rempah | Markah Saya')

@section('profileContent')
    <div class="">
        <h1>Markah Saya</h1>

        @if($user->bookmarks->isEmpty())
            <div id="noBookmarkContent">
                <div style="text-align:center">
                    <i>Saat ini tidak ada resep yang dimarkah</i>
                </div>
                <div class="sharpBox btnSearchRecipe">
                    <a href="/search" style="text-decoration: none; color:black">
                        Temukan Resep
                    </a>
                </div>
            </div>
        @endif

        <div class="d-flex flex-wrap" style="width:100%;">
            @foreach($user->bookmarks as $bookmark)
                <?php $recipe = $bookmark->recipe; ?>
                @include('templates/recipeCard2', compact('recipe'))
            @endforeach
        </div>
    </div>
    {{-- 
        anggepan bookmark ada byk & dia mau liat resep mana aj yg udh ga mau dibookmark lagi
        biar user gampang manage bookmarknya,
        di page ini ga munculin modal konfirmasi apus bookmark dan pas toggle bookmark btn, cardnya ga diilangin
    --}}
@endsection
