@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/preference.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addRecipe.css') }}">
@endsection

@section('title', 'RempahRempah | Tambah Resep')

@section('content')
    @php
    // session()->flush();
        $index = -1;
        $unique_ctg_groups = $category_all->unique('class');
        $form_ctg_names = ["category_id", "sub_category_1_id", "sub_category_2_id"];
    @endphp
    <form action="/addRecipe" class="addRecipe" method="POST">
        @csrf
        <div class="col">
            <label for="name" class="form-label">Nama resep*</label>
            <input type="text" class="form-control textField whiteBackground" placeholder="Masukkan nama" id="name" name="name" value="{{session('name') == null ? "" : session('name')}}">
            @if ($errors->has('name'))
                <h6 class="errorMsg">{{$errors->first('name')}}</h6>
            @endif
        </div>
        <div class="col">
            <label for="description" class="form-label">Deskripsi resep*</label>
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
                    <label for="description" class="form-label">
                        {{$unique_ctg_group->class}}{{$index == 0 ? '*' : ''}}
                    </label>
                    <select name="{{$form_ctg_names[$index]}}" class="form-select form-select-lg mb-3 outlinedBtn whiteBackground">
                        <option>-</option>
                        @foreach ($category_all as $ctg)
                            @if ($ctg->class == $unique_ctg_group->class)
                                <option value="{{$ctg->id}}" {{old($form_ctg_names[$index]) == $ctg->id ? 'selected' : ''}}>{{$ctg->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>
        <div class="col">
            <label for="duration" class="form-label">Durasi*</label>
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
            <label for="tags" class="form-label tagLabelForm">Tags*</label>
            <div class="row searchField">
                <div class="col">
                    <input type="text" class="form-control textField whiteBackground" placeholder="Tambahkan nama bahan di sini" id="input_tag" name="input_tag" data-cmd="add" data-type="tag">
                </div>
                <div class="col">
                    <button type="submit" class="sharpBox whiteBackground addInputBtn">
                        <i class="fa fa-search"></i> &ensp;Cari
                    </button>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-sm-4 row-cols-md-6 g-3" id="selectedSection">
                @foreach(session('selected_tags') == null ? [] : session('selected_tags') as $item)
                    <div class="col">
                        <button type="button" class="sharpBox removeBtn" id="selected" data-cmd="remove" data-type="tag" data-value="{{$item}}">
                            <i class="fa fa-close"></i> &ensp;{{$item}}
                        </button>
                        <input type="text" name="selected_tags[]" value="{{$item}}" hidden>
                    </div>
                @endforeach
            </div>
            <div class="row row-cols-2 row-cols-sm-4 row-cols-md-6 g-3 scrollSection" id="defaultSection">
                @foreach(session('default_tags') == null ? [] : session('default_tags') as $item)
                    <div class="col">
                        <button type="button" class="sharpBox addBtn" data-cmd="add" data-type="tag" data-value="{{$item}}">
                            <i class="fa fa-plus"></i> &ensp;{{$item}}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col">
            <label for="type" class="form-label">Tipe resep*</label>
            <input type="text" name="type" id="type" value="private" hidden>
            <div class="d-flex justify-content-start" id="typeSection">
                <button type="button" class="sharpBox active btn-toggle" id="public" value="public" onclick="toggleActive(this)">Publik</button>
                <button type="button" class="sharpBox btn-toggle" id="private" value="private" onclick="toggleActive(this)">Pribadi</button>
            </div>
            @if ($errors->has('type'))
                <h6 class="errorMsg">{{$errors->first('type')}}</h6>
            @endif
        </div>
        <div class="col">
            <label for="img" class="form-label">Foto tampilan utama*</label>
            <input type="file" name="img" id="img" onchange="showFileName(this)" hidden>
            <div class="d-flex justify-content-start" id="typeSection">
                <button type="button" class="sharpBox" onclick="document.getElementById('img').click()">
                    <img src="/assets/icons/cloud_save.png" class="picon" alt="save_icon">
                    Unggah
                </button>
                <span id="fileName_img" class="fileName"></span>
            </div>
            @if ($errors->has('img'))
                <h6 class="errorMsg">{{$errors->first('img')}}</h6>
            @endif
        </div>
        <div class="col">
            <label for="vid" class="form-label">Video</label>
            <input type="file" name="vid" id="vid" onchange="showFileName(this)" hidden>
            <div class="d-flex justify-content-start" id="typeSection">
                <button type="button" class="sharpBox" onclick="document.getElementById('img').click()">
                    <img src="/assets/icons/cloud_save.png" class="picon" alt="save_icon">
                    Unggah
                </button>
                <span id="fileName_vid" class="fileName"></span>
            </div>
        </div>
        <div class="col d-grid gap-2">
            {{-- <button class="btn btn-primary outlinedBtn whiteBackground" type="submit" name="btn-submit" value="submit"><i class="fa fa-save"></i>&ensp;Simpan</button> --}}
            <button class="sharpBox" type="submit" id="saveButton" name="btn-submit">
                <img src="/assets/icons/save_icon.png" class="picon" alt="save_icon">
                Simpan
            </button>
        </div>
    </form>
    <script>
        window.onload = function() {
            document.getElementById('durationTotal').innerText = '0 menit';
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
            var output = '';
            if (d > 0) {
                output += d + ' hari ';
            }
            if (h > 0) {
                output += h + ' jam ';
            }
            if (m >= 0) {
                output += m + ' menit ';
            }
            document.getElementById('durationTotal').innerText = output;
        }

        $(document).ready(function() {
            $(document).on('click', '.addBtn, .removeBtn', function(e) {
                e.preventDefault();
                updateSelected($(this));
            });
            $(document).on('click', '.addInputBtn', function(e) {
                e.preventDefault();
                showResultInputTag($('#input_tag').val());
            });
            $(document).on('keypress', '#input_ingredient', function(e) {
                if (e.which === 13) {
                    e.preventDefault();
                    showResultInputTag($('#input_tag').val());
                }
            });
        });

        function updateSelected(curr_btn) {
            var cmd = curr_btn.data('cmd');
            var type = curr_btn.data('type');
            var value = curr_btn.data('value');
            $.ajax({
                url: '/updateSelected',
                type: 'POST',
                data: {
                    cmd: cmd,
                    type: type,
                    value: value,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result){
                    console.log('success');
                    if (!result.updateStatus) return;
                    if (cmd == "add") {
                        $('#selectedSection').append(`
                            <div class="col">
                                <button type="button" class="sharpBox removeBtn" data-cmd="remove" data-type="tag" data-value="${value}">
                                    <i class="fa fa-close"></i> &ensp;${value}
                                </button>
                                <input type="text" name="selected_tags[]" value="${value}" hidden>
                            </div>
                        `);
                        if (result.updateBtn) {
                            console.log(result.updateBtn);
                            $('#defaultSection .addBtn').filter(function() {
                                return $(this).data('value') === value;
                            }).parent().remove();
                        }
                    } else {
                        curr_btn.parent().remove();
                        if (result.updateBtn) {
                            console.log(result.updateBtn);
                            $('#defaultSection').append(`
                                <div class="col">
                                    <button type="button" class="sharpBox addBtn" data-cmd="add" data-type="tag" data-value="${value}">
                                        <i class="fa fa-close"></i> &ensp;${value}
                                    </button>
                                </div>
                            `);
                            $('#defaultSection').children('.col').sort(function(a, b) {
                                var aValue = $(a).find('button').data('value');
                                var bValue = $(b).find('button').data('value');
                                return aValue.localeCompare(bValue);
                            }).detach().appendTo('#defaultSection');
                        }
                    }
                },
                error: function(e) {
                    console.log('error');
                }
            });
        }

        function showResultInputTag(query) {
            $.ajax({
                url: '/showResultInputTag',
                type: 'GET',
                data: {
                    query: query,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    console.log('success');
                    console.log(result.tags);
                    $('#defaultSection').empty();
                    if (result.tags.length == 0) {
                        $('#defaultSection').append(`
                            <div id="noResult">
                                No tags found.
                            </div>
                        `);
                    } else {
                        result.tags.forEach(tag => {
                            $('#defaultSection').append(`
                                <div class="col">
                                    <button type="button" class="sharpBox addBtn" data-cmd="add" data-type="tag" data-value="${tag}">
                                        <i class="fa fa-plus"></i> &ensp;${tag}
                                    </button>
                                </div>
                            `);
                        });
                    }
                },
                error: function(e) {
                    console.log('error');
                }
            });
        }

        function toggleActive(button) {
            var buttons = document.getElementsByClassName('btn-toggle');
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove('active');
            }
            button.classList.add('active');
            document.getElementById('type').value = button.value;
        }

        function showFileName(button) {
            var input = document.getElementById(button.id);
            var fileName = input.files.length > 0 ? input.files[0].name : 'No file chosen';
            document.getElementById('fileName_'.button.id).textContent = fileName;
        }
    </script>
@endsection
