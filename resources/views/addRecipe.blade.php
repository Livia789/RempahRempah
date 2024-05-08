@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/preference.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addRecipe.css') }}">
@endsection

@section('title', 'RempahRempah | Tambah Resep')

@section('content')
    @php
        $default_tags = collect($tag_all->pluck('name'))->sortBy(function ($tag) {
            return strlen($tag);
        });
        $temp = session('selected_tags') == null ? [] : session('selected_tags');
        if ($temp !== null) {
            $diff = $default_tags->diff($temp);
            $default_tags = [];
            foreach($diff as $tag) {
                $default_tags[] = $tag;
            }
        }

        $index = -1;
        $form_ctg_names = ["category_id", "sub_category_1_id", "sub_category_2_id"];
    @endphp

    <form action="/addRecipe" class="addRecipe" method="POST">
        @csrf
        <div class="col">
            <label for="name" class="form-label">Nama resep</label>
            <input type="text" class="form-control textField whiteBackground" placeholder="Masukkan nama" id="name" name="name" value="{{session('name') == null ? "" : session('name')}}">
            @if ($errors->has('name'))
                <h6 class="errorMsg">{{$errors->first('name')}}</h6>
            @endif
        </div>
        <div class="col">
            <label for="description" class="form-label">Deskripsi resep</label>
            <input type="text" class="form-control textField whiteBackground" placeholder="Masukkan deskripsi" id="description" name="description" value="{{session('description') == null ? "" : session('description')}}">
            @if ($errors->has('description'))
                <h6 class="errorMsg">{{$errors->first('description')}}</h6>
            @endif
        </div>
        <div class="row">
            @foreach ($unique_ctg_groups as $unique_ctg_group)
                @php
                    $index++;
                @endphp
                <div class="col">
                    <label for="description" class="form-label">{{$unique_ctg_group->class}}</label>
                    <select name="{{$form_ctg_names[$index]}}" class="form-select form-select-lg mb-3 outlinedBtn whiteBackground" aria-label="Large select example">
                        @foreach ($category_all as $ctg)
                            @if ($ctg->class == $unique_ctg_group->class)
                                <option value="{{$ctg->id}}">{{$ctg->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>
        <div class="col">
            <label for="duration" class="form-label">Durasi</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control textField whiteBackground" placeholder="Masukkan durasi" id="duration" name="duration" value="{{session('duration') == null ? "" : session('duration')}}" oninput="calculateTime()">
                <span class="input-group-text groupTextForm" id="basic-addon1">menit</span>
                <span class="input-group-text groupTextForm" id="durationTotal"></span>
            </div>
            @if ($errors->has('duration'))
                <h6 class="errorMsg">{{$errors->first('duration')}}</h6>
            @endif
        </div>
        <div class="col">
            <label for="tags" class="form-label tagLabelForm">Tags</label>
            <input type="text" name="cmd" id="cmd" hidden>
            <input type="text" name="curr_tag" id="curr_tag" hidden>
            <div class="row searchField">
                {{-- diemin dulu puzink gwehj --}}
                <div class="col">
                    <input type="text" class="form-control textField whiteBackground" placeholder="Cari tag di sini" id="curr_tag_input" name="curr_tag_input">
                </div>
                <div class="col">
                    <button class="sharpBox whiteBackground" type="submit">
                        <i class="fa fa-search"></i> &ensp;Cari
                    </button>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-sm-4 row-cols-md-6 g-3">
                @foreach(session('selected_tags') == null ? [] : session('selected_tags') as $item)
                    <div class="col">
                        <button class="sharpBox yellow removeBtn" id="selected" value="{{$item}}">
                            <i class="fa fa-close"></i> &ensp;{{$item}}
                        </button>
                        <input type="text" name="selected_tags[]" value="{{$item}}" hidden>
                    </div>
                @endforeach
            </div>
            <div class="row row-cols-2 row-cols-sm-4 row-cols-md-6 g-3 scrollSection">
                @foreach($default_tags as $item)
                    <div class="col">
                        <button class="sharpBox addBtn curr_tag" value="{{$item}}"  formaction="/updateTagPage">
                            <i class="fa fa-plus"></i> &ensp;{{$item}}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- duration, img, vid, type --}}
        <div class="col d-grid gap-2">
            <button class="btn btn-primary outlinedBtn whiteBackground" type="submit" name="btn-submit" value="submit"><i class="fa fa-save"></i>&ensp;Simpan</button>
        </div>
    </form>
    <script>
        window.onload = function() {
            document.getElementById('durationTotal').innerText = "0 menit";
        }

        function calculateTime() {
            var input = document.getElementById('duration').value;
            if (input > 99999) {
                input = 99999;
            }
            document.getElementById('duration').value = input;
            var m = input % 60;
            var h = Math.floor(input / 60);
            var d = Math.floor(h / 24);
            var output = " ";
            if (d > 0) {
                output += d + " hari ";
            }
            if (h > 0) {
                output += h + " jam ";
            }
            if (m >= 0) {
                output += m + " menit ";
            }
            document.getElementById('durationTotal').innerText = output;
        }

        var addBtns = document.getElementsByClassName('addBtn');
        var removeBtns = document.getElementsByClassName('removeBtn');

        for (var i = 0; i < addBtns.length; i++) {
            addBtns[i].addEventListener('click', function() {
                document.getElementById('cmd').value = 'add';
                document.getElementById('curr_tag').value = this.value;
            });
        }

        for (var i = 0; i < removeBtns.length; i++) {
            removeBtns[i].addEventListener('click', function() {
                document.getElementById('cmd').value = 'remove';
                document.getElementById('curr_tag').value = this.value;
            });
        }

        document.getElementById('curr_tag_input').addEventListener('change', function() {
            document.getElementById('cmd').value = 'add';
            document.getElementById('curr_tag').value = this.value;
        });
    </script>
@endsection
