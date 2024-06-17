<?php
    $allNutritions = \App\Models\Nutrition::orderBy('name')->get();

?>

@if(Auth::user() && Auth::user()->role == 'ahli_gizi')
    <div class="modal fade" id="addNutritionModalContainer" aria-hidden="true">
        <div class="modal-dialog modalContainer modal-content" style="padding-right:5px; max-width: 80vw; width:60vw; height:90vh; background-color:white;">
            <div>
                <img src="/assets/icons/close_icon.png" alt="close_icon" class="picon closeModalBtn" style="float:right; margin-right:15px;" onclick="$('#addNutritionModalContainer').modal('hide')">
            </div>
            <div class="modalContainerContent">
                <form action="/addNutrition" id="addNutritionForm" style="padding:30px;" method="POST">
                    @csrf
                    <b><h2>Nilai Gizi Per Sajian</h2></b>
                    <br><br>
                    <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
                    <input type="hidden" name="ahliGizi_id" value="{{Auth::user()->id}}">
    
                    <div class="d-flex mb-3 align-items-center">
                        <span style="min-width:200px">Energi Total</span>
                        <input type="number" min="1" name="energiTotal" style="width:200px; margin:0px 20px; border:2px solid black; border-radius:5px;" required>
                        <span>kkal</span>
                    </div>
                    <div class="d-flex mb-5 align-items-center">
                        <span style="min-width:200px">Energi Dari Lemak</span>
                        <input type="number" min="1" name="energiDariLemak" style="width:200px; margin:0px 20px; border:2px solid black; border-radius:5px;" required>
                        <span>kkal</span>
                    </div>
                    <hr style="border:1.5px solid;" class="mb-5">
                    <div class="dropdown-menu">
                        @foreach ($allNutritions as $nutrition)
                            <li class="dropdown-item" id="ddItem_{{$nutrition->name}}" onclick="addNutritionField({{$nutrition}})">{{$nutrition->name}}</li>
                        @endforeach
                    </div>
                
                    <div id="nutritionListContainer"></div>
    
                    <div class="sharpBox" data-bs-toggle="dropdown" style="margin-top:40px">
                        Tambah Nutrisi
                        <img src="/assets/icons/dropdown_black.png" style="margin-left:10px;" class="picon" alt="dropdown_icon"></img>
                    </div>
                    <button type="button" onclick="submitNutritionForm()" class="sharpBox" style="margin-top:20px">
                        <img src="/assets/icons/save_icon.png" alt="save_icon" class="picon">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmation_verification" aria-hidden="true">
        <div class="modal-dialog modalContainer modal-content" style="max-width:40vw; width:40vw; background-color:white" >
            <div>
                <img src="/assets/icons/close_icon.png" alt="close_icon" class="picon closeModalBtn" style="float:right" onclick="$('#confirmation_verification').modal('hide')">
            </div>
            <div class="modalContainerContent">
                <div class="text-center justify-content-center" >
                    <h1 style="margin-bottom:35px">Simpan Informasi Nilai Gizi?</h1>
                    <p>Pastikan data yang kamu submit sudah benar. Data yang telah disimpan tidak dapat diedit kembali.</p>
                    <br><br><br>
                    <p>Ketik "Simpan" untuk menyimpan nilai gizi</p>
                    <input type="text" id="confirmation" required>
    
                    
                    <div style="width:80%; margin:auto">
                        <div class="sharpBox" style="width:100%" onclick="verificationForm_yes()">Ya, simpan nilai gizi</div>
                        <div class="sharpBox" style="width:100%" onclick="verificationForm_no()">Tidak, kembali ke form</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function addNutritionField(nutrition){
            var nutritionField = `
                <div class="nutritionField" id="nutritionField">
                    <div class="d-flex justify-content-between align-items-center">
                        <input type="text" value="${nutrition.name}" style="border:none; width:30%">
                        <div class="d-flex">
                            <input type="number" min="1" name="nutrition[${nutrition.id}][quantity]" style="width:30%; margin:0px 20px; border:2px solid black; border-radius:5px;" placeholder="Berat"; required>
                            <input type="string" name="nutrition[${nutrition.id}][unit]"style="width:30%; margin:0px 20px; border:2px solid black; border-radius:5px;" placeholder="Unit"; required>
                            <input type="number" min="1" max="100" name="nutrition[${nutrition.id}][akgPercentage]" style="width:30%; margin:0px 20px; border:2px solid black; border-radius:5px;" placeholder="%AKG"; required>
                        </div>
                        <img src="/assets/icons/trash_closed.png" onclick="removeNutrientField(this)" nutrition="${nutrition.name}" class="picon" alt="trash_icon" style="float:right;">
                    </div>
                    <hr style="border:1.5px solid;">
                <div>
            `;
            $('#nutritionListContainer').append(nutritionField);
            nutrientDD = document.getElementById('ddItem_'+nutrition.name);
            nutrientDD.style.display = 'none';
        }

        function removeNutrientField(trash){
            trash.closest('.nutritionField').remove();
            nutritionName = trash.getAttribute('nutrition');
            nutrientDD = document.getElementById('ddItem_'+nutritionName);
            nutrientDD.style.display = 'block';
        }

        function submitNutritionForm(){
            var form = document.getElementById("addNutritionForm");
            if (form.reportValidity()) {
                var totalNutritionField = document.getElementById('nutritionField')
                if(!totalNutritionField){
                    alert("Mohon tambahkan nutrisi untuk resep ini");
                }else{
                    $('#addNutritionModalContainer').modal('hide');
                    $('#confirmation_verification').modal('show');
                }
            }
        }
        function verificationForm_yes(){
            var form = document.getElementById("addNutritionForm");
            var confirmation = document.getElementById('confirmation').value;
            if(confirmation.toLowerCase() == 'simpan'){
                form.submit();
            }else{
                alert('Ketik "Simpan" untuk menyimpan verifikasi');
            }
        }

        function verificationForm_no(){
            $('#confirmation_verification').modal('hide');
            $('#addNutritionModalContainer').modal('show');
        }
    </script>
@endif