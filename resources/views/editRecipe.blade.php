@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/preference.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addRecipe.css') }}">
@endsection

@section('title', 'Rempah Rempah | Sunting Resep')

@section('content')
    @php
        $index = -1;
        $unique_ctg_groups = $category_all->unique('class');
        $form_ctg_names = ["category_id", "sub_category_1_id", "sub_category_2_id"];
    @endphp
    <form action="/addRecipe" class="addRecipe" id="editRecipeForm" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="formType" id="formType" value="{{$recipe->id}}" hidden>
        <div class="col">
            <label for="name" class="form-label">Nama resep*</label>
            <input type="text" class="form-control textField whiteBackground" placeholder="Masukkan nama" id="name" name="name" value="{{session('name') === null ? $recipe->name : session('name')}}">
            @if ($errors->has('name'))
                <h6 class="errorMsg">{{$errors->first('name')}}</h6>
            @endif
        </div>
        <div class="col">
            <label for="description" class="form-label">Deskripsi resep*</label>
            <textarea class="form-control textField whiteBackground" placeholder="Masukkan deskripsi" id="description" name="description">{{session('description') === null ? $recipe->description : session('description')}}</textarea>
            @if ($errors->has('description'))
                <h6 class="errorMsg">{{$errors->first('description')}}</h6>
            @endif
        </div>
        <div class="row" id="categorySection">
            @foreach ($unique_ctg_groups as $unique_ctg_group)
                @php
                    $index++;
                    $property = $form_ctg_names[$index];
                @endphp
                <div class="col">
                    <label for="description" class="form-label">
                        {{$unique_ctg_group->class}}{{$index == 0 ? '*' : ''}}
                    </label>
                    <select name="{{$property}}" class="form-select form-select-lg mb-3 outlinedBtn whiteBackground">
                        <option value="">-</option>
                        @foreach ($category_all as $ctg)
                            @if ($ctg->class == $unique_ctg_group->class)
                                <option value="{{$ctg->id}}" {{((session($property) === null && ($ctg->id == ($index == 0 ? $recipe->category_id : ($index == 1 ? $recipe->sub_category_1_id : $recipe->sub_category_2_id)))) || session($property) == $ctg->id) ? 'selected' : ''}}>{{$ctg->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @if ($index == 0 && $errors->has($property))
                        <h6 class="errorMsg">{{$errors->first($property)}}</h6>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="col" id="durationSection">
            <label for="duration" class="form-label">Durasi*</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control textField whiteBackground" placeholder="Masukkan durasi" id="duration" name="duration" value="{{session('duration') === null ? $recipe->duration : session('duration')}}" oninput="calculateTime()">
                <span class="input-group-text groupTextForm" id="basic-addon1">menit</span>
                <span class="input-group-text groupTextForm" id="durationTotal"></span>
            </div>
            @if ($errors->has('duration'))
                <h6 class="errorMsg">{{$errors->first('duration')}}</h6>
            @endif
        </div>
        <div class="col">
            <label for="serving" class="form-label">Sajian*</label>
            <input type="number" class="form-control textField whiteBackground" placeholder="Masukkan jumlah sajian per resep" id="serving" name="serving" value="{{session('serving') === null ? $recipe->serving : session('serving')}}">
            @if ($errors->has('serving'))
                <h6 class="errorMsg">{{$errors->first('serving')}}</h6>
            @endif
        </div>
        <div class="col" id="tagSection">
            <label for="tags" class="form-label tagLabelForm">Tags*</label>
            <div class="row searchField">
                <div class="col">
                    <input type="text" class="form-control textField whiteBackground" placeholder="Tambahkan tag di sini" id="input_tag" name="input_tag" data-cmd="add" data-type="tag">
                </div>
                <div class="col">
                    <button type="submit" class="sharpBox whiteBackground addInputBtn">
                        <i class="fa fa-search"></i> &ensp;Cari
                    </button>
                </div>
            </div>
            @if ($errors->has('selected_tags'))
                <h6 class="errorMsg">{{$errors->first('selected_tags')}}</h6>
            @endif
            <div class="row row-cols-2 row-cols-sm-4 row-cols-md-6 g-3" id="selectedSection">
                @foreach(session('selected_tags') === null ? [] : session('selected_tags') as $item)
                    <div class="col">
                        <button type="button" class="sharpBox removeBtn" id="selected" data-cmd="remove" data-type="tag" data-value="{{$item}}">
                            <i class="fa fa-close"></i> &ensp;{{$item}}
                        </button>
                        <input type="text" name="selected_tags[]" value="{{$item}}" hidden>
                    </div>
                @endforeach
            </div>
            <div class="row row-cols-2 row-cols-sm-4 row-cols-md-6 g-3 scrollSection" id="defaultSection">
                @foreach(session('default_tags') === null ? [] : session('default_tags') as $item)
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
            <div class="d-flex justify-content-start" id="typeSection">
                @if (Auth::user()->role == 'member')
                    <input type="text" name="type" id="type" value="{{((session('type') === null && $recipe->type == 'public') || session('type') == 'public') ? 'public' : 'private'}}" hidden>
                    <button type="button" class="sharpBox {{((session('type') === null && $recipe->type == 'public') || session('type') == 'public') ? 'active' : ''}} btn-toggle" id="public" value="public" onclick="toggleActive(this)">Publik</button>
                    <button type="button" class="sharpBox {{((session('type') === null && $recipe->type == 'private') || session('type') == 'private') ? 'active' : ''}} btn-toggle" id="private" value="private" onclick="toggleActive(this)">Pribadi</button>
                @else
                    <input type="text" name="type" id="type" value="exclusive" hidden>
                    <button type="button" class="sharpBox active btn-toggle" id="exclusive" value="exclusive" onclick="toggleActive(this)">Eksklusif</button>
                @endif
            </div>
            @if ($errors->has('type'))
                <h6 class="errorMsg">{{$errors->first('type')}}</h6>
            @endif
        </div>
        @if (Auth::user()->role == 'admin')
            <div class="col" id="companySection">
                <label for="company" class="form-label">Merek</label>
                <select name="company" class="form-select form-select-lg mb-3 outlinedBtn whiteBackground">
                    @foreach ($company_all as $company)
                        <option value="{{$company->id}}" {{((session('company') === null && $company->id == $recipe->company_id) || session('company') == $company->id) ? 'selected' : ''}}>{{$company->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('company'))
                    <h6 class="errorMsg">{{$errors->first('company')}}</h6>
                @endif
            </div>
        @endif
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
            <label for="vid" class="form-label">Video tutorial</label>
            <input type="file" name="vid" id="vid" onchange="showFileName(this)" hidden>
            <div class="d-flex justify-content-start" id="typeSection">
                <button type="button" class="sharpBox" onclick="document.getElementById('vid').click()">
                    <img src="/assets/icons/cloud_save.png" class="picon" alt="save_icon">
                    Unggah
                </button>
                <span id="fileName_vid" class="fileName"></span>
            </div>
            @if ($errors->has('vid'))
                <h6 class="errorMsg">{{$errors->first('vid')}}</h6>
            @endif
        </div>
        <div class="col">
            <div id="toolSection">
                @php
                    $tools = $recipe->tools->pluck('name')->toArray();
                    $toolLength = count(session('tool', $tools));
                @endphp
                @for ($i = 0; $i < $toolLength; $i++)
                    <div class="toolContainer" data-index="{{$i}}">
                        <label for="tool{{$i}}">Alat*</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama alat" name="tool[{{$i}}]" id="tool{{$i}}" value="{{session('tool.'.$i) ? session('tool.'.$i) : $tools[$i]}}">
                            <button type="button" class="sharpBox delete-tool {{$toolLength == 1 ? 'disabled' : ''}}" onclick="deleteTool({{$i}})" {{$toolLength == 1 ? 'disabled' : ''}}><i class="fa fa-trash"></i> &ensp;Hapus alat</button>
                        </div>
                        @if ($errors->has('tool.'.$i))
                            <h6 class="errorMsg">{{$errors->first('tool.'.$i)}}</h6>
                        @endif
                    </div>
                @endfor
            </div>
            <button type="button" class="add-tool sharpBox" onclick="addTool()"><i class="fa fa-plus"></i> &ensp;Tambah alat</button>
        </div>
        <div class="col">
            <label class="form-label">Bahan</label>
                <div id="ingredientSection">
                @php
                    $ingredientHeaders = $recipe->ingredientHeaders->pluck('name')->toArray();
                    $ingredientHeaderLength = count(session('ingredientHeader', $ingredientHeaders));
                @endphp
                @for ($i = 0; $i < $ingredientHeaderLength; $i++)
                    <div class="ingredientHeader" data-header-index="{{$i}}">
                        <label for="ingredientHeader{{$i}}">Header bahan*</label>
                        <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama header bahan" name="ingredientHeader[{{$i}}]" id="ingredientHeader{{$i}}" value="{{session('ingredientHeader.'.$i) ? session('ingredientHeader.'.$i) : $ingredientHeaders[$i]}}">
                        @if ($errors->has('ingredientHeader.'.$i))
                            <h6 class="errorMsg">{{$errors->first('ingredientHeader.'.$i)}}</h6>
                        @endif
                        @php
                            $ingredientDescriptions = $recipe->ingredientHeaders[$i]->ingredients->pluck('name')->toArray();
                            $ingredientQtys = $recipe->ingredientHeaders[$i]->ingredients->pluck('pivot.quantity')->toArray();
                            $ingredientUnits = $recipe->ingredientHeaders[$i]->ingredients->pluck('pivot.unit')->toArray();
                            $ingredientDescriptionLength = count(session('ingredientDescription.'.$i, $ingredientDescriptions));
                        @endphp
                        @for ($j = 0; $j < $ingredientDescriptionLength; $j++)
                            <div class="ingredientDescription" data-description-index="{{$j}}">
                                <div class="input-group mb-3 descriptionContainer">
                                    <div class="ingredientDescriptionContainer">
                                        <label for="ingredientDescription{{$i}}_{{$j}}">Bahan*</label>
                                        <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama bahan" name="ingredientDescription[{{$i}}][{{$j}}]" id="ingredientDescription{{$i}}_{{$j}}" value="{{session('ingredientDescription.'.$i.'.'.$j) ? session('ingredientDescription.'.$i.'.'.$j) : $ingredientDescriptions[$j]}}">
                                        @if ($errors->has('ingredientDescription.'.$i.'.'.$j))
                                            <h6 class="errorMsg">{{$errors->first('ingredientDescription.'.$i.'.'.$j)}}</h6>
                                        @endif
                                    </div>
                                    <div class="ingredientDescriptionContainer sub">
                                        <label for="ingredientQty{{$i}}_{{$j}}">Jumlah*</label>
                                        <input type="text" class="form-control textField whiteBackground" placeholder="Masukan jumlah bahan" name="ingredientQty[{{$i}}][{{$j}}]" id="ingredientQty{{$i}}_{{$j}}" value="{{session('ingredientQty.'.$i.'.'.$j) ? session('ingredientQty.'.$i.'.'.$j) : $ingredientQtys[$j]}}">
                                        @if ($errors->has('ingredientQty.'.$i.'.'.$j))
                                            <h6 class="errorMsg">{{$errors->first('ingredientQty.'.$i.'.'.$j)}}</h6>
                                        @endif
                                    </div>
                                    <div class="ingredientDescriptionContainer sub">
                                        <label for="ingredientUnit{{$i}}_{{$j}}">Satuan</label>
                                        <input type="text" class="form-control textField whiteBackground" placeholder="Masukan satuan bahan" name="ingredientUnit[{{$i}}][{{$j}}]" id="ingredientUnit{{$i}}_{{$j}}" value="{{session('ingredientUnit.'.$i.'.'.$j) ? session('ingredientUnit.'.$i.'.'.$j) : $ingredientUnits[$j]}}">
                                    </div>
                                    <button type="button" class="sharpBox delete-description {{$ingredientDescriptionLength == 1 ? 'disabled' : ''}}" onclick="deleteDescription('ingredient', {{$i}}, {{$j}})" {{$ingredientDescriptionLength == 1 ? 'disabled' : ''}}><i class="fa fa-trash"></i> &ensp;Hapus bahan</button>
                                </div>
                            </div>
                        @endfor
                        <button type="button" class="sharpBox add-description" onclick="addDescription('ingredient', {{$i}})"><i class="fa fa-plus"></i> &ensp;Tambah bahan</button>
                        <button type="button" class="sharpBox delete-header {{$ingredientHeaderLength == 1 ? 'disabled' : ''}}" onclick="deleteHeader('ingredient', {{$i}})" {{$ingredientHeaderLength == 1 ? 'disabled' : ''}}><i class="fa fa-trash"></i> &ensp;Hapus header bahan</button>
                    </div>
                @endfor
            </div>
            <button type="button" class="add-header sharpBox" onclick="addHeader('ingredient')"><i class="fa fa-plus"></i> &ensp;Tambah header bahan</button>
        </div>
        <div class="col">
            <label class="form-label">Langkah</label>
            <div id="stepSection">
                @php
                    $stepHeaders = $recipe->stepHeaders->pluck('name')->toArray();
                    $stepHeaderLength = count(session('stepHeader', $stepHeaders));
                @endphp
                @for ($i = 0; $i < $stepHeaderLength; $i++)
                    <div class="stepHeader" data-header-index="{{$i}}">
                        <label for="stepHeader{{$i}}">Header langkah*</label>
                        <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama header langkah" name="stepHeader[{{$i}}]" id="stepHeader{{$i}}" value="{{session('stepHeader.'.$i) ? session('stepHeader.'.$i) : $stepHeaders[$i]}}">
                        @if ($errors->has('stepHeader.'.$i))
                            <h6 class="errorMsg">{{$errors->first('stepHeader.'.$i)}}</h6>
                        @endif
                        @php
                            $stepDescriptions = $recipe->stepHeaders[$i]->steps->pluck('step_desc')->toArray();
                            $stepDescriptionLength = count(session('stepDescription.'.$i, $stepDescriptions));
                        @endphp
                        @for ($j = 0; $j < $stepDescriptionLength; $j++)
                            <div class="stepDescription" data-description-index="{{$j}}">
                                <div class="stepCounter">Langkah {{$j + 1}}</div>
                                <label for="stepDescription{{$i}}_{{$j}}">Deskripsi langkah*</label>
                                <div class="descriptionContainer">
                                    <div class="input-group mb-3">
                                        <textarea class="form-control textField whiteBackground" placeholder="Masukan deskripsi langkah" name="stepDescription[{{$i}}][{{$j}}]" id="stepDescription{{$i}}_{{$j}}">{{session('stepDescription.'.$i.'.'.$j) ? session('stepDescription.'.$i.'.'.$j) : $stepDescriptions[$j]}}</textarea>
                                        <button type="button" class="sharpBox delete-description {{$stepDescriptionLength == 1 ? 'disabled' : ''}}" onclick="deleteDescription('step', {{$i}}, {{$j}})" {{$stepDescriptionLength == 1 ? 'disabled' : ''}}><i class="fa fa-trash"></i> &ensp;Hapus langkah</button>
                                    </div>
                                    @if ($errors->has('stepDescription.'.$i.'.'.$j))
                                        <h6 class="errorMsg">{{$errors->first('stepDescription.'.$i.'.'.$j)}}</h6>
                                    @endif
                                </div>
                                <div class="col">
                                    <label for="stepImg{{$i}}_{{$j}}" class="form-label">Foto langkah</label>
                                    <input type="file" name="stepImg[{{$i}}][{{$j}}]" id="stepImg{{$i}}_{{$j}}" onchange="showFileName(this)" hidden>
                                    <div class="d-flex justify-content-start" id="typeSection">
                                        <button type="button" class="sharpBox" onclick="document.getElementById('stepImg{{$i}}_{{$j}}').click()">
                                            <img src="/assets/icons/cloud_save.png" class="picon" alt="save_icon">
                                            Unggah
                                        </button>
                                        <span id="fileName_stepImg{{$i}}_{{$j}}" class="fileName"></span>
                                    </div>
                                </div>
                            </div>
                        @endfor
                        <button type="button" class="sharpBox add-description" onclick="addDescription('step', {{$i}})"><i class="fa fa-plus"></i> &ensp;Tambah langkah</button>
                        <button type="button" class="sharpBox delete-header {{$stepDescriptionLength == 1 ? 'disabled' : ''}}" onclick="deleteHeader('step', {{$i}})" {{$stepDescriptionLength == 1 ? 'disabled' : ''}}><i class="fa fa-trash"></i> &ensp;Hapus header langkah</button>
                    </div>
                @endfor
            </div>
            <button type="button" class="add-header sharpBox" onclick="addHeader('step')"><i class="fa fa-plus"></i> &ensp;Tambah header langkah</button>
        </div>
        <div class="col d-grid gap-2">
            <button class="sharpBox" type="submit" id="saveButton" name="btn-submit">
                <img src="/assets/icons/save_icon.png" class="picon" alt="save_icon">
                Simpan
            </button>
        </div>
    </form>
    <div class="modal fade" id="cropModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropModalLabel">Menyesuaikan gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="cropContainer">
                        <img id="imgToCrop" src="">
                    </div>
                    <div class="buttons cropper">
                        <button class="sharpBox" id="zoom-out"><i class="fa fa-search-minus"></i></button>
                        <button class="sharpBox" id="zoom-in"><i class="fa fa-search-plus"></i></button>
                        <button class="sharpBox" id="rotate-left"><i class="fa fa-rotate-left"></i></button>
                        <button class="sharpBox" id="rotate-right"><i class="fa fa-rotate-right"></i></button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="button" class="btn btn-primary" onclick="cropImage()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="saveModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="saveModalLabel">Simpan resep</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Kamu sudah yakin untuk menambahkan resep ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="backButton" data-bs-dismiss="modal">Kembali</button>
                    <button type="button" class="btn btn-primary" id="proceedButton">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/addRecipeForm.js')}}"></script>
    <script>
        var save = false;
        window.addEventListener('beforeunload', (e) => {
            if (!save) {
                e.preventDefault();
            }
        });

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

            $('#saveButton').click(function(e) {
                $('#saveModal').modal('show');
                e.preventDefault();
            });
            $('#proceedButton').on('click', function() {
                save = true;
                $('#editRecipeForm').submit();
            });
            $('#backButton').on('click', function() {
                $('#saveModal').modal('hide');
                save = false;
            });
        });

        window.onload = function() {
            let min = document.getElementById('duration').value !== '' ? document.getElementById('duration').value : '0';
            document.getElementById('durationTotal').innerText = min+' menit';
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

        let currentInput;
        let cropper;
        let file;

        function showFileName(button) {
            let input = document.getElementById(button.id);
            file = input.files[0];
            if (button.id.startsWith('stepImg') || button.id == 'img') {
                const allowedFormats = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!allowedFormats.includes(file.type)) {
                    alert('Harap unggah gambar dengan format .jpeg, .jpg, atau .png.');
                    return;
                }
                handleImageUpload(input);
            } else {
                const allowedFormats = ['video/mp4', 'video/quicktime', 'video/x-matroska'];
                if (!allowedFormats.includes(file.type)) {
                    alert('Harap unggah video dengan format .mp4 atau .mkv.');
                    return;
                }
                document.getElementById('fileName_'+button.id).textContent = file.name;
            }
        }

        function handleImageUpload(input) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const image = document.getElementById('imgToCrop');
                image.src = e.target.result;
                currentInput = input;

                image.onload = function() {
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(image, {
                        aspectRatio: 1,
                        viewMode: 1,
                        dragMode: 'move',
                        cropBoxResizable: false
                    });
                    $('#cropModal').modal('show');
                };
            };
            reader.readAsDataURL(file);
        }

        function cropImage() {
            const canvas = cropper.getCroppedCanvas();
            canvas.toBlob(function(blob) {
                const dataTransfer = new DataTransfer();

                dataTransfer.items.add(new File([blob], file.name, { type: file.type }));
                currentInput.files = dataTransfer.files;
                $('#cropModal').modal('hide');
            }, file.type);
            document.getElementById('fileName_'+currentInput.id).textContent = file.name;
        }

        document.getElementById('zoom-in').addEventListener('click', function() {
            cropper.zoom(0.1);
        });
        document.getElementById('zoom-out').addEventListener('click', function() {
            cropper.zoom(-0.1);
        });
        document.getElementById('rotate-left').addEventListener('click', function() {
            cropper.rotate(-90);
        });
        document.getElementById('rotate-right').addEventListener('click', function() {
            cropper.rotate(90);
        });
    </script>
@endsection
