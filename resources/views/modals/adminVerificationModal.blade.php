

<div class="modal fade" id="adminRejectRecipe" aria-hidden="true">
    <div class="modal-dialog modalContainer modal-content" style="background-color:white; padding:30px">
        <form action="/rejectRecipe" style="padding:15px;" method="POST">
            @csrf
            <b>Yakin ingin menolak draft resep ini?</b>
            <br>
            <b>Berikan alasan atau masukan untuk resep ini</b>
            <br><br>

            <input type="hidden" name="recipe_id" value={{$recipe->id}}>
            <textarea name="rejectionReason" id="rejectionReason" rows="5" oninput="recountTotalChar('rejectionReason', 'rejectionReasonTotalChar')" style="border:2px solid black; border-radius:5px; width:100%;" maxlength="150" required></textarea>
            <div style="float:right">
                <span id="rejectionReasonTotalChar">0</span><span">/150</span>
            </div>
            <button class="sharpBox" style="margin-top:20px">
                <img src="/assets/icons/save_icon.png" alt="save_icon" class="picon">
                Simpan
            </button> 
        </form>
    </div>
</div>

<div class="modal fade" id="adminApproveRecipe" aria-hidden="true">
    <div class="modal-dialog modalContainer modal-content" style="padding:30px; max-width:40vw; width:40vw; background-color:white" >
        
        <div class="text-center justify-content-center" >
            <form action="/approveRecipe" id="adminApproveRecipeForm" style="padding:15px;" method="POST">
                @csrf
                <input type="hidden" name="admin_id" value={{$recipe->admin->id}}>
                <input type="text" style="display:none" name="recipe_id" value={{$recipe->id}}>
                <h3>Yakin ingin menerima/approve resep ini?</h3>
                <p><i>Verifikasi resep tidak dapat diubah</i></p>
                <br><br><br>
                <p>Ketik "terima" untuk menerima/approve resep</p>
                <input type="text" name="adminApproveRecipeConfirmationText" id="adminApproveRecipeConfirmationText" required>
                <div style="width:80%; margin:auto">
                    <button type="button" class="sharpBox" style="width:100%" onclick="admin_verificationForm_yes()">Ya, terima resep ini</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function admin_verificationForm_yes(){   
        var form = document.getElementById("adminApproveRecipeForm");
        var confirmation = document.getElementById('adminApproveRecipeConfirmationText').value;
        if(confirmation.toLowerCase() == 'terima'){
            form.submit();
        }else{
            alert('Ketik "terima" untuk menyimpan verifikasi');
        }
    }
</script>
