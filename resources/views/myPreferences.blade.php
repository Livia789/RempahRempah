@extends('templates/profile')

@section('title', 'RempahRempah | Bahan yang Dihindari')

<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<link rel="stylesheet" href="{{ asset('css/preference.css') }}">

@section('profileContent')
    @php
        $default_ingredients = collect($default_ingredients)->sortBy(function ($ingredient) {
            return strlen($ingredient);
        });
        $temp = session('selected_ingredients') == null ? $selected_ingredients : session('selected_ingredients');
        if ($temp !== null) {
            $diff = $default_ingredients->diff($temp);
            $default_ingredients = [];
            foreach($diff as $ingredient) {
                $default_ingredients[] = $ingredient;
            }
        }
    @endphp
    <div class="container px-5">
        <h1>Bahan yang Dihindari</h1>
        @if (session('updateSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('updateSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="preferenceSection">
            <span class="sharpBox yellow">
                Pencarian resep di RempahRempah nanti akan menghindari resep yang mengandung kata kunci yang kamu masukkan pada halaman ini.
            </span>
            <form action="/updatePrefPage" class="preferenceForm" method="POST">
                @csrf
                <input type="text" name="cmd" id="cmd" hidden>
                <input type="text" name="curr_ingredient" id="curr_ingredient" hidden>
                <div class="row row-cols-2 row-cols-sm-4 row-cols-md-6 g-3">
                    @foreach(session('selected_ingredients') == null ? $selected_ingredients : session('selected_ingredients') as $item)
                        <div class="col">
                            <button class="sharpBox yellow removeBtn" id="selected" value="{{$item}}">
                                <i class="fa fa-close"></i> &ensp;{{$item}}
                            </button>
                            <input type="text" name="selected_ingredients[]" value="{{$item}}" hidden>
                        </div>
                    @endforeach
                </div>
                <div class="row searchField">
                    <div class="col">
                        <input type="text" class="form-control textField whiteBackground" placeholder="Tambahkan nama bahan di sini" id="curr_ingredient_input" name="curr_ingredient_input">
                    </div>
                    <div class="col">
                        <button class="sharpBox whiteBackground" type="submit">
                            <i class="fa fa-plus"></i> &ensp;Tambah
                        </button>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-sm-4 row-cols-md-6 g-3">
                    @foreach($default_ingredients as $item)
                        <div class="col">
                            <button class="sharpBox addBtn curr_ingredient" value="{{$item}}">
                                <i class="fa fa-plus"></i> &ensp;{{$item}}
                            </button>
                        </div>
                    @endforeach
                </div>
            </form>
            <form action="/updatePreferences" class="preferenceForm" method="POST">
                @csrf
                <input type="text" name="source_view" id="source_view" value="myPreferences" hidden>
                @foreach(session('selected_ingredients') == null ? $selected_ingredients : session('selected_ingredients') as $item)
                    <input type="text" name="selected_ingredients[]" value="{{$item}}" hidden>
                @endforeach
                <button class="sharpBox {{ session('changes') == true ? '' : 'disabled' }}" type="submit" name="btn-submit" value="submit" {{ session('changes') == true ? '' : 'disabled' }}>
                    <img src="/assets/icons/cloud_save.png" class="picon" alt="save_icon">
                    Simpan
                </button>
            </form>
        </div>
    </div>
    <script>
        var addBtns = document.getElementsByClassName('addBtn');
        var removeBtns = document.getElementsByClassName('removeBtn');

        for (var i = 0; i < addBtns.length; i++) {
            addBtns[i].addEventListener('click', function(){
                document.getElementById('cmd').value = 'add';
                document.getElementById('curr_ingredient').value = this.value;
            });
        }

        for (var i = 0; i < removeBtns.length; i++) {
            removeBtns[i].addEventListener('click', function(){
                document.getElementById('cmd').value = 'remove';
                document.getElementById('curr_ingredient').value = this.value;
            });
        }

        document.getElementById('curr_ingredient_input').addEventListener('change', function() {
            document.getElementById('cmd').value = 'add';
            document.getElementById('curr_ingredient').value = this.value;
        });
    </script>
@endsection
