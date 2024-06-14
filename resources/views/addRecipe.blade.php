@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/preference.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addRecipe.css') }}">
@endsection

@section('title', 'Rempah Rempah | Tambah Resep')

@section('content')
    @php
        // session()->flush();
        // dd($errors->toArray());
        $index = -1;
        $unique_ctg_groups = $category_all->unique('class');
        $form_ctg_names = ["category_id", "sub_category_1_id", "sub_category_2_id"];
    @endphp
    <form action="/addRecipe" class="addRecipe" id="addRecipeForm" method="POST" enctype="multipart/form-data">
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
            <textarea class="form-control textField whiteBackground" placeholder="Masukkan deskripsi" id="description" name="description">{{session('description') == null ? "" : session('description')}}</textarea>
            @if ($errors->has('description'))
                <h6 class="errorMsg">{{$errors->first('description')}}</h6>
            @endif
        </div>
        <div class="row" id="categorySection">
            @foreach ($unique_ctg_groups as $unique_ctg_group)
                @php
                    $index++;
                @endphp
                <div class="col">
                    <label for="description" class="form-label">
                        {{$unique_ctg_group->class}}{{$index == 0 ? '*' : ''}}
                    </label>
                    <select name="{{$form_ctg_names[$index]}}" class="form-select form-select-lg mb-3 outlinedBtn whiteBackground">
                        <option value="">-</option>
                        @foreach ($category_all as $ctg)
                            @if ($ctg->class == $unique_ctg_group->class)
                                <option value="{{$ctg->id}}" {{session($form_ctg_names[$index]) == $ctg->id ? 'selected' : ''}}>{{$ctg->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @if ($index == 0 && $errors->has($form_ctg_names[$index]))
                        <h6 class="errorMsg">{{$errors->first($form_ctg_names[$index])}}</h6>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="col" id="durationSection">
            <label for="duration" class="form-label">Durasi*</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control textField whiteBackground" placeholder="Masukkan durasi" id="duration" name="duration" value="{{session('duration') == null ? "" : session('duration')}}" oninput="calculateTime()">
                <span class="input-group-text groupTextForm" id="basic-addon1">menit</span>
                <span class="input-group-text groupTextForm" id="durationTotal"></span>
            </div>
            @if ($errors->has('duration'))
                <h6 class="errorMsg">{{$errors->first('duration')}}</h6>
            @endif
        </div>
        <div class="col">
            <label for="serving" class="form-label">Sajian*</label>
            <input type="number" class="form-control textField whiteBackground" placeholder="Masukkan jumlah sajian per resep" id="serving" name="serving" value="{{session('serving') == null ? "" : session('serving')}}">
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
            <div class="d-flex justify-content-start" id="typeSection">
                @if (Auth::user()->role == 'member')
                    <input type="text" name="type" id="type" value="{{session('type') == 'public' || session('type') == null ? "public" : "private"}}" hidden>
                    <button type="button" class="sharpBox {{session('type') == 'public' || session('type') == null ? "active" : ""}} btn-toggle" id="public" value="public" onclick="toggleActive(this)">Publik</button>
                    <button type="button" class="sharpBox {{session('type') == 'private' ? "active" : ""}} btn-toggle" id="private" value="private" onclick="toggleActive(this)">Pribadi</button>
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
                        <option value="{{$company->id}}" {{session('company') == $company->id ? 'selected' : ''}}>{{$company->name}}</option>
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
        </div>
        <div class="col">
            <div id="toolSection">
                @php
                    $toolLength = count(session('tool', ['blank']));
                @endphp
                @for ($i = 0; $i < $toolLength; $i++)
                    <div class="toolContainer" data-index="{{$i}}">
                        <label for="tool{{$i}}">Alat*</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama alat" name="tool[{{$i}}]" id="tool{{$i}}" value="{{session('tool.'.$i) ? session('tool.'.$i) : ''}}">
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
                    $ingredientHeaderLength = count(session('ingredientHeader', ['blank']));
                @endphp
                @for ($i = 0; $i < $ingredientHeaderLength; $i++)
                    <div class="ingredientHeader" data-header-index="{{$i}}">
                        <label for="ingredientHeader{{$i}}">Header bahan*</label>
                        <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama header bahan" name="ingredientHeader[{{$i}}]" id="ingredientHeader{{$i}}" value="{{session('ingredientHeader.'.$i) ? session('ingredientHeader.'.$i) : ''}}">
                        @if ($errors->has('ingredientHeader.'.$i))
                            <h6 class="errorMsg">{{$errors->first('ingredientHeader.'.$i)}}</h6>
                        @endif
                        @php
                            $ingredientDescriptionLength = count(session('ingredientDescription.'.$i, ['blank']));
                        @endphp
                        @for ($j = 0; $j < $ingredientDescriptionLength; $j++)
                            <div class="ingredientDescription" data-description-index="{{$j}}">
                                <div class="input-group mb-3 descriptionContainer">
                                    <div class="ingredientDescriptionContainer">
                                        <label for="ingredientDescription{{$i}}_{{$j}}">Bahan*</label>
                                        <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama bahan" name="ingredientDescription[{{$i}}][{{$j}}]" id="ingredientDescription{{$i}}_{{$j}}" value="{{session('ingredientDescription.'.$i.'.'.$j) ? session('ingredientDescription.'.$i.'.'.$j) : ''}}">
                                        @if ($errors->has('ingredientDescription.'.$i.'.'.$j))
                                            <h6 class="errorMsg">{{$errors->first('ingredientDescription.'.$i.'.'.$j)}}</h6>
                                        @endif
                                    </div>
                                    <div class="ingredientDescriptionContainer sub">
                                        <label for="ingredientQty{{$i}}_{{$j}}">Jumlah*</label>
                                        <input type="text" class="form-control textField whiteBackground" placeholder="Masukan jumlah bahan" name="ingredientQty[{{$i}}][{{$j}}]" id="ingredientQty{{$i}}_{{$j}}" value="{{session('ingredientQty.'.$i.'.'.$j) ? session('ingredientQty.'.$i.'.'.$j) : ''}}">
                                        @if ($errors->has('ingredientQty.'.$i.'.'.$j))
                                            <h6 class="errorMsg">{{$errors->first('ingredientQty.'.$i.'.'.$j)}}</h6>
                                        @endif
                                    </div>
                                    <div class="ingredientDescriptionContainer sub">
                                        <label for="ingredientUnit{{$i}}_{{$j}}">Satuan</label>
                                        <input type="text" class="form-control textField whiteBackground" placeholder="Masukan satuan bahan" name="ingredientUnit[{{$i}}][{{$j}}]" id="ingredientUnit{{$i}}_{{$j}}" value="{{session('ingredientUnit.'.$i.'.'.$j) ? session('ingredientUnit.'.$i.'.'.$j) : ''}}">
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
                    $stepHeaderLength = count(session('stepHeader', ['blank']));
                @endphp
                @for ($i = 0; $i < $stepHeaderLength; $i++)
                    <div class="stepHeader" data-header-index="{{$i}}">
                        <label for="stepHeader{{$i}}">Header langkah*</label>
                        <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama header langkah" name="stepHeader[{{$i}}]" id="stepHeader{{$i}}" value="{{session('stepHeader.'.$i) ? session('stepHeader.'.$i) : ''}}">
                        @if ($errors->has('stepHeader.'.$i))
                            <h6 class="errorMsg">{{$errors->first('stepHeader.'.$i)}}</h6>
                        @endif
                        @php
                            $stepDescriptionLength = count(session('stepDescription.'.$i, ['blank']));
                        @endphp
                        @for ($j = 0; $j < $stepDescriptionLength; $j++)
                            <div class="stepDescription" data-description-index="{{$j}}">
                                <div class="stepCounter">Langkah {{$j + 1}}</div>
                                <label for="stepDescription{{$i}}_{{$j}}">Deskripsi langkah*</label>
                                <div class="descriptionContainer">
                                    <div class="input-group mb-3">
                                        <textarea class="form-control textField whiteBackground" placeholder="Masukan deskripsi langkah" name="stepDescription[{{$i}}][{{$j}}]" id="stepDescription{{$i}}_{{$j}}">{{session('stepDescription.'.$i.'.'.$j) ? session('stepDescription.'.$i.'.'.$j) : ''}}</textarea>
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
                $('#addRecipeForm').submit();
            });
            $('#backButton').on('click', function() {
                $('#saveModal').modal('hide');
                save = false;
            });
        });

        function addTool() {
            const section = document.getElementById('toolSection');
            const containerIdx = section.getElementsByClassName('toolContainer').length;

            const newContainer = document.createElement('div');
            newContainer.className = 'toolContainer';
            newContainer.setAttribute('data-index', containerIdx);
            let newInnerHTML = `
                <label for="tool${containerIdx}">Alat*</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama alat" name="tool[${containerIdx}]" id="tool${containerIdx}">
                    <button type="button" class="sharpBox delete-tool" onclick="deleteTool(${containerIdx})"><i class="fa fa-trash"></i> &ensp;Hapus alat</button>
                </div>
            `;
            newContainer.innerHTML = newInnerHTML;
            section.appendChild(newContainer);

            const containers = section.querySelectorAll('.toolContainer');
            var deleteButton = containers[0].getElementsByClassName('delete-tool')[0];
            deleteButton.disabled = false;
            deleteButton.classList.remove('disabled');
        }

        function deleteTool(containerIdx) {
            const container = document.querySelector(`.toolContainer[data-index="${containerIdx}"]`);
            container.remove();

            const containers = document.querySelectorAll('.toolContainer');
            containers.forEach((container, idx) => {
                container.setAttribute('data-index', idx);

                let label = container.querySelector('label');
                label.htmlFor = `tool${idx}`;

                let input = container.querySelector('input');
                input.name = `tool[${idx}]`;
                input.id = `tool${idx}`;

                let deleteButton = container.querySelector('.delete-tool');
                deleteButton.setAttribute('onclick', `deleteTool(${idx})`);
            });

            let deleteButton = containers[0].getElementsByClassName('delete-tool')[0];
            if (containers.length === 1) {
                deleteButton.disabled = true;
                deleteButton.classList.add('disabled');
            } else {
                deleteButton.disabled = false;
                deleteButton.classList.remove('disabled');
            }
        }

        function addHeader(type) {
            if (type == 'ingredient') {
                var typeLabel = 'bahan';
            } else {
                var typeLabel = 'langkah';
            }

            const section = document.getElementById(type+'Section');
            const headerIdx = section.getElementsByClassName(type+'Header').length;

            const newHeader = document.createElement('div');
            newHeader.className = type+'Header';
            newHeader.setAttribute('data-header-index', headerIdx);
            let newInnerHTML = `
                <label for="${type}Header${headerIdx}">Header ${typeLabel}*</label>
                <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama ${typeLabel} bahan" name="${type}Header[${headerIdx}]" id="${type}Header${headerIdx}">
                <div class="${type}Description" data-description-index="0">
            `;
            if (type == 'step') {
                newInnerHTML += `
                    <div class="stepCounter">Langkah 1</div>
                    <label for="stepDescription${headerIdx}_0">Deskripsi langkah*</label>
                    <div class="descriptionContainer">
                        <div class="input-group mb-3">
                            <textarea class="form-control textField whiteBackground" placeholder="Masukan deskripsi langkah" name="stepDescription[${headerIdx}][0]" id="stepDescription${headerIdx}_0"></textarea>
                            <button type="button" class="sharpBox delete-description disabled" onclick="deleteDescription('step', ${headerIdx}, 0)" disabled><i class="fa fa-trash"></i> &ensp;Hapus langkah</button>
                        </div>
                    </div>
                    <div class="col">
                        <label for="stepImg${headerIdx}_0" class="form-label">Foto langkah</label>
                        <input type="file" name="stepImg[${headerIdx}][0]" id="stepImg${headerIdx}_0" onchange="showFileName(this)" hidden>
                        <div class="d-flex justify-content-start" id="typeSection">
                            <button type="button" class="sharpBox" onclick="document.getElementById('stepImg${headerIdx}_0').click()">
                                <img src="/assets/icons/cloud_save.png" class="picon" alt="save_icon">
                                Unggah
                            </button>
                            <span id="fileName_stepImg${headerIdx}_0" class="fileName"></span>
                        </div>
                    </div>
                `;
            } else {
                newInnerHTML += `
                    <div class="input-group mb-3 descriptionContainer">
                        <div class="ingredientDescriptionContainer">
                            <label for="ingredientDescription${headerIdx}_0">Bahan*</label>
                            <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama bahan" name="ingredientDescription[${headerIdx}][0]" id="ingredientDescription${headerIdx}_0">
                        </div>
                        <div class="ingredientDescriptionContainer sub">
                            <label for="ingredientQty${headerIdx}_0">Jumlah*</label>
                            <input type="text" class="form-control textField whiteBackground" placeholder="Masukan jumlah bahan" name="ingredientQty[${headerIdx}][0]" id="ingredientQty${headerIdx}_0">
                        </div>
                        <div class="ingredientDescriptionContainer sub">
                            <label for="ingredientUnit${headerIdx}_0">Satuan</label>
                            <input type="text" class="form-control textField whiteBackground" placeholder="Masukan satuan bahan" name="ingredientUnit[${headerIdx}][0]" id="ingredientUnit${headerIdx}_0">
                        </div>
                        <button type="button" class="sharpBox delete-description disabled" onclick="deleteDescription('ingredient', 0, 0)" disabled><i class="fa fa-trash"></i> &ensp;Hapus bahan</button>
                    </div>
                `;
            }
            newInnerHTML += `
                </div>
                <button type="button" class="sharpBox add-description" onclick="addDescription('${type}', ${headerIdx})"><i class="fa fa-plus"></i> &ensp;Tambah ${typeLabel}</button>
                <button type="button" class="sharpBox delete-header" onclick="deleteHeader('${type}', ${headerIdx})"><i class="fa fa-trash"></i> &ensp;Hapus header ${typeLabel}</button>
            `;
            newHeader.innerHTML = newInnerHTML;
            section.appendChild(newHeader);

            const headers = document.querySelectorAll('.'+type+'Header');
            var deleteButton = headers[0].getElementsByClassName('delete-header')[0];
            deleteButton.disabled = false;
            deleteButton.classList.remove('disabled');
        }

        function deleteHeader(type, headerIdx) {
            const header = document.querySelector(`.${type}Header[data-header-index="${headerIdx}"]`);
            header.remove();

            const headers = document.querySelectorAll('.'+type+'Header');
            headers.forEach((header, idx) => {
                header.setAttribute('data-header-index', idx);

                let label = header.querySelector('label');
                label.htmlFor = `${type}Header${idx}`;

                let input = header.querySelector('input');
                input.name = `${type}Header[${idx}]`;
                input.id = `${type}Header${idx}`;

                let addButton = header.querySelector('.add-description');
                addButton.setAttribute('onclick', `addDescription('${type}', ${idx})`);

                let deleteButton = header.querySelector('.delete-header');
                deleteButton.setAttribute('onclick', `deleteHeader('${type}', ${idx})`);

                let descriptions = header.querySelectorAll('.'+type+'Description');
                descriptions.forEach((description, idx2) => {
                    description.setAttribute('data-description-index', idx2);

                    if (type == 'step') {
                        label = description.querySelector('label');
                        label.htmlFor = `stepDescription${idx}_${idx2}`;

                        textarea = description.querySelector('textarea');
                        textarea.name = `stepDescription[${idx}][${idx2}]`;
                        textarea.id = `stepDescription${idx}_${idx2}`;

                        deleteButton = description.querySelector('.delete-description');
                        deleteButton.setAttribute('onclick', `deleteDescription('step', ${idx}, ${idx2})`);

                        let col = description.querySelector('.col');

                        label = col.querySelector('label');
                        label.htmlFor = `stepImg${idx}_${idx2}`;

                        input = col.querySelector('input');
                        input.name = `stepImg[${idx}][${idx2}]`;
                        input.id = `stepImg${idx}_${idx2}`;

                        deleteButton = col.querySelector('button');
                        deleteButton.setAttribute('onclick', `document.getElementById('stepImg${idx}_${idx2}').click()`);

                        let span = col.querySelector('span');
                        span.id = `fileName_stepImg${idx}_${idx2}`;
                    } else {
                        let labels = description.querySelectorAll('label');
                        labels.forEach((label, ctr) => {
                            let suffix = ctr === 0 ? 'Description' : (ctr === 1 ? 'Qty' : 'Unit');
                            label.htmlFor = `ingredient${suffix}${idx}_${idx2}`;
                        });

                        let inputs = description.querySelectorAll('input');
                        inputs.forEach((input, ctr) => {
                            let suffix = ctr === 0 ? 'Description' : (ctr === 1 ? 'Qty' : 'Unit');
                            input.name = `ingredient${suffix}[${idx}][${idx2}]`;
                            input.id = `ingredient${suffix}${idx}_${idx2}`;
                        });

                        deleteButton = description.querySelector('.delete-description');
                        deleteButton.setAttribute('onclick', `deleteDescription('ingredient', ${idx}, ${idx2})`);
                    }
                });
            });

            let deleteButton = headers[0].getElementsByClassName('delete-header')[0];
            if (headers.length === 1) {
                deleteButton.disabled = true;
                deleteButton.classList.add('disabled');
            } else {
                deleteButton.disabled = false;
                deleteButton.classList.remove('disabled');
            }
        }

        function addDescription(type, headerIdx) {
            if (type == 'ingredient') {
                var typeLabel = 'bahan';
            } else {
                var typeLabel = 'langkah';
            }

            const header = document.querySelector(`.${type}Header[data-header-index="${headerIdx}"]`);
            const descriptionIdx = header.getElementsByClassName(type+'Description').length;

            const newDescription = document.createElement('div');
            newDescription.className = type+'Description';
            newDescription.setAttribute('data-description-index', descriptionIdx);

            let newInnerHTML = '';
            if (type == 'step') {
                newInnerHTML += `
                    <div class="stepCounter">Langkah ${descriptionIdx + 1}</div>
                    <label for="stepDescription${headerIdx}_${descriptionIdx}">Deskripsi langkah*</label>
                    <div class="descriptionContainer">
                        <div class="input-group mb-3">
                            <textarea class="form-control textField whiteBackground" placeholder="Masukan deskripsi langkah" name="stepDescription[${headerIdx}][${descriptionIdx}]" id="stepDescription${headerIdx}_${descriptionIdx}"></textarea>
                            <button type="button" class="sharpBox delete-description" onclick="deleteDescription('step', ${headerIdx}, ${descriptionIdx})"><i class="fa fa-trash"></i> &ensp;Hapus langkah</button>
                        </div>
                    </div>
                    <div class="col">
                        <label for="stepImg${headerIdx}_${descriptionIdx}" class="form-label">Foto langkah</label>
                        <input type="file" name="stepImg[${headerIdx}][${descriptionIdx}]" id="stepImg${headerIdx}_${descriptionIdx}" onchange="showFileName(this)" hidden>
                        <div class="d-flex justify-content-start" id="typeSection">
                            <button type="button" class="sharpBox" onclick="document.getElementById('stepImg${headerIdx}_${descriptionIdx}').click()">
                            <img src="/assets/icons/cloud_save.png" class="picon" alt="save_icon">
                                Unggah
                            </button>
                            <span id="fileName_stepImg${headerIdx}_${descriptionIdx}" class="fileName"></span>
                        </div>
                    </div>
                `;
            } else {
                newInnerHTML += `
                    <div class="input-group mb-3 descriptionContainer">
                        <div class="ingredientDescriptionContainer">
                            <label for="ingredientDescription${headerIdx}_${descriptionIdx}">Bahan*</label>
                            <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama bahan" name="ingredientDescription[${headerIdx}][${descriptionIdx}]" id="ingredientDescription${headerIdx}_${descriptionIdx}">
                        </div>
                        <div class="ingredientDescriptionContainer sub">
                            <label for="ingredientQty${headerIdx}_${descriptionIdx}">Jumlah*</label>
                            <input type="text" class="form-control textField whiteBackground" placeholder="Masukan jumlah bahan" name="ingredientQty[${headerIdx}][${descriptionIdx}]" id="ingredientQty${headerIdx}_${descriptionIdx}">
                        </div>
                        <div class="ingredientDescriptionContainer sub">
                            <label for="ingredientUnit${headerIdx}_${descriptionIdx}">Satuan</label>
                            <input type="text" class="form-control textField whiteBackground" placeholder="Masukan satuan bahan" name="ingredientUnit[${headerIdx}][${descriptionIdx}]" id="ingredientUnit${headerIdx}_${descriptionIdx}">
                        </div>
                        <button type="button" class="sharpBox delete-description" onclick="deleteDescription('ingredient', ${headerIdx}, ${descriptionIdx})"><i class="fa fa-trash"></i> &ensp;Hapus bahan</button>
                    </div>
                `;
            }
            newDescription.innerHTML = newInnerHTML;
            header.insertBefore(newDescription, header.querySelector('.add-description'));

            const descriptions = header.querySelectorAll('.'+type+'Description');
            var deleteButton = descriptions[0].getElementsByClassName('delete-description')[0];
            deleteButton.disabled = false;
            deleteButton.classList.remove('disabled');
        }

        function deleteDescription(type, headerIdx, descriptionIdx) {
            const header = document.querySelector(`.${type}Header[data-header-index="${headerIdx}"]`);
            const description = header.querySelector(`.${type}Description[data-description-index="${descriptionIdx}"]`);
            description.remove();

            const descriptions = header.querySelectorAll('.'+type+'Description');
            descriptions.forEach((description, idx) => {
                description.setAttribute('data-description-index', idx);
                if (type == 'step') {
                    let label = description.querySelector('label');
                    label.htmlFor = `stepDescription${headerIdx}_${idx}`;

                    let textarea = description.querySelector('textarea');
                    textarea.name = `stepDescription[${headerIdx}][${idx}]`;
                    textarea.id = `stepDescription${headerIdx}_${idx}`;

                    let deleteButton = description.querySelector('.delete-description');
                    deleteButton.setAttribute('onclick', `deleteDescription('step', ${headerIdx}, ${idx})`);

                    let col = description.querySelector('.col');

                    label = col.querySelector('label');
                    label.htmlFor = `stepImg${headerIdx}_${idx}`;

                    input = col.querySelector('input');
                    input.name = `stepImg[${headerIdx}][${idx}]`;
                    input.id = `stepImg${headerIdx}_${idx}`;

                    deleteButton = col.querySelector('button');
                    deleteButton.setAttribute('onclick', `document.getElementById('stepImg${headerIdx}_${idx}').click()`);

                    let span = col.querySelector('span');
                    span.id = `fileName_stepImg${headerIdx}_${idx}`;
                } else {
                    let labels = description.querySelectorAll('label');
                    labels.forEach((label, ctr) => {
                        let suffix = ctr === 0 ? 'Description' : (ctr === 1 ? 'Qty' : 'Unit');
                        label.htmlFor = `ingredient${suffix}${headerIdx}_${idx}`;
                    });

                    let inputs = description.querySelectorAll('input');
                    inputs.forEach((input, ctr) => {
                        let suffix = ctr === 0 ? 'Description' : (ctr === 1 ? 'Qty' : 'Unit');
                        input.name = `ingredient${suffix}[${headerIdx}][${idx}]`;
                        input.id = `ingredient${suffix}${headerIdx}_${idx}`;
                    });

                    let deleteButton = description.querySelector('.delete-description');
                    deleteButton.setAttribute('onclick', `deleteDescription('ingredient', ${headerIdx}, ${idx})`);
                }
            });

            var deleteButton = descriptions[0].getElementsByClassName('delete-description')[0];
            if (descriptions.length === 1) {
                deleteButton.disabled = true;
                deleteButton.classList.add('disabled');
            } else {
                deleteButton.disabled = false;
                deleteButton.classList.remove('disabled');
            }
        }

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
                const allowedFormats = ['video/mp4', 'video/x-matroska'];
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
