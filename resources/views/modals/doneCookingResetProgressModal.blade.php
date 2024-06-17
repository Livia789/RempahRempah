<div class="modal fade" id="doneCooking_resetProgressContainer" aria-hidden="true">
    <div class="modal-dialog modalContainer modal-content" style="max-width:40vw; width:40vw; background-color:white" >
        <div>
            <img src="/assets/icons/close_icon.png" alt="close_icon" class="picon closeModalBtn" style="float:right" onclick="$('#doneCooking_resetProgressContainer').modal('hide')">
        </div>
        <div class="text-center justify-content-center" >
            <br>
            <h1>Selamat!</h1>
            <p>Anda sudah mengikuti setiap langkah pada resep <b>{{$recipe->name}}</b> ala <b>{{'@'.$recipe->creator->name}}</b></p>
            <img src="/assets/chef_happy.png" style="border-radius:50%; height:150px; width:auto;" alt="chef_happy">

            <br><br><br>
            <p>Hapus progress memasak pada resep ini?</p>
            <div style="width:80%; margin:auto">
                <div class="sharpBox" style="width:100%" onclick="doneCookingResetProgress(true)">Ya</div>
                <div class="sharpBox" style="width:100%" onclick="doneCookingResetProgress(false)">Tidak</div>
            </div>
        </div>
    </div>
</div>