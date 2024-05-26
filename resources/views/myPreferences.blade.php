@extends('templates/profile')

@section('title', 'RempahRempah | Bahan yang Dihindari')

<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<link rel="stylesheet" href="{{ asset('css/preference.css') }}">

@section('profileContent')
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
            <form action="/updatePreferences" method="POST" class="preferenceForm" id="preferenceForm">
                @csrf
                <div class="row row-cols-2 row-cols-sm-4 row-cols-md-6 g-3" id="selectedSection">
                    @foreach(session('selected_ingredients') == null ? [] : session('selected_ingredients') as $item)
                        <div class="col">
                            <button type="button" class="sharpBox removeBtn" id="selected" data-cmd="remove" data-type="ingredient" data-value="{{$item}}">
                                <i class="fa fa-close"></i> &ensp;{{$item}}
                            </button>
                            <input type="text" name="selected_ingredients[]" value="{{$item}}" hidden>
                        </div>
                    @endforeach
                </div>
                <div class="row searchField">
                    <div class="col">
                        <input type="text" class="form-control textField whiteBackground" placeholder="Tambahkan nama bahan di sini" id="input_ingredient" name="input_ingredient" data-cmd="add" data-type="ingredient">
                    </div>
                    <div class="col">
                        <button type="submit" class="sharpBox whiteBackground addInputBtn">
                            <i class="fa fa-plus"></i> &ensp;Tambah
                        </button>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-sm-4 row-cols-md-6 g-3" id="defaultSection">
                    @foreach(session('default_ingredients') == null ? [] : session('default_ingredients') as $item)
                        <div class="col">
                            <button type="button" class="sharpBox addBtn" data-cmd="add" data-type="ingredient" data-value="{{$item}}">
                                <i class="fa fa-plus"></i> &ensp;{{$item}}
                            </button>
                        </div>
                    @endforeach
                </div>
                <button class="sharpBox {{ session('changes') == true ? '' : 'disabled' }}" type="submit" id="saveButton" name="btn-submit" {{ session('changes') == true ? '' : 'disabled' }}>
                    <img src="/assets/icons/save_icon.png" class="picon" alt="save_icon">
                    Simpan
                </button>
            </form>
        </div>
    </div>
    <div class="modal fade" id="saveModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="saveModalLabel">Simpan perubahan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Kamu sudah yakin untuk menyimpan perubahan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="backButton" data-bs-dismiss="modal">Kembali</button>
                    <button type="button" class="btn btn-primary" id="proceedButton">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var changes = "{{ session('changes', '') }}" == 'true';
        var save = false;

        window.addEventListener('beforeunload', (e) => {
            if (changes && !save) {
                e.preventDefault();
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.addBtn, .removeBtn, .addInputBtn', function(e) {
                e.preventDefault();
                updateSelected($(this));
            });
            $(document).on('keypress', '#input_ingredient', function(e) {
                if (e.which === 13) {
                    e.preventDefault();
                    updateSelected($(this));
                }
            });
            $('#saveButton').click(function(e) {
                $('#saveModal').modal('show');
                e.preventDefault();
            });
            $('#proceedButton').on('click', function() {
                save = true;
                $('#preferenceForm').submit();
            });
            $('#backButton').on('click', function() {
                $('#saveModal').modal('hide');
                save = false;
            });
        });

        function updateSelected(curr_btn) {
            var cmd = curr_btn.data('cmd') || $('#input_ingredient').data('cmd');
            var type = curr_btn.data('type') || $('#input_ingredient').data('type');
            var value = (curr_btn.data('value') || $('#input_ingredient').val()).toLowerCase();
            if (!value.trim()) return;
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
                    $('#input_ingredient').val('');
                    if (!result.updateStatus) return;
                    if (cmd == 'add') {
                        $('#selectedSection').append(`
                            <div class="col">
                                <button type="button" class="sharpBox removeBtn" data-cmd="remove" data-type="ingredient" data-value="${value}">
                                    <i class="fa fa-close"></i> &ensp;${value}
                                </button>
                                <input type="text" name="selected_ingredients[]" value="${value}" hidden>
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
                                    <button type="button" class="sharpBox addBtn" data-cmd="add" data-type="ingredient" data-value="${value}">
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
                    if (result.changes) {
                        $('#saveButton').removeClass('disabled').prop('disabled', false);
                        changes = true;
                    } else {
                        $('#saveButton').addClass('disabled').prop('disabled', true);
                        changes = false;
                    }
                },
                error: function(e) {
                    console.log('error');
                }
            });
        }

        $('#input_ingredient').typeahead({
            source: function (query, process) {
                var type = $('#input_ingredient').data('type');
                return $.get('/showResult', {
                    query: query,
                    type: type
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection
