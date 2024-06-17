<div class="modal fade" id="confirmation_resetProgressContainer" aria-hidden="true">
    <div class="modal-dialog modalContainer modal-content" style="max-width:40vw; width:40vw; background-color:white" >
        <div>
            <img src="/assets/icons/close_icon.png" alt="close_icon" class="picon closeModalBtn" style="float:right" onclick="$('#confirmation_resetProgressContainer').modal('hide')">
        </div>
        <div class="text-center justify-content-center" >
            <h1 style="margin-bottom:50px">Hapus progress memasak?</h1>
            <img src="/assets/chef_trash.png" style="border-radius:50%; height:150px; width:auto;" alt="chef_trash">

            <br><br><br>
            <p>Progress yang sudah terhapus tidak dapat dikembalikan</p>
            <div style="width:80%; margin:auto">
                <div class="sharpBox" style="width:100%" onclick="doneCookingResetProgress(true)">Ya</div>
                <div class="sharpBox" style="width:100%" onclick="doneCookingResetProgress(false)">Tidak</div>
            </div>
        </div>
    </div>
</div>