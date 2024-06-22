<div class="modal fade" id="confirmationModal" aria-hidden="true">
    <div class="modal-dialog modalContainer modal-content" style="max-width:40vw; width:40vw; background-color:white; padding-top:10px">
        
        <div>
            <img src="/assets/icons/close_icon.png" alt="close_icon" class="picon closeModalBtn" style="float:right" onclick="$('#confirmationModal').modal('hide')">
        </div>

        <div class="text-center justify-content-center" >
            <br>
            <h1 id="confirmationModalTitle"></h1>
            <img src="/assets/chef_happy.png" id="confirmationModalImg" style="border-radius:50%; height:150px; width:auto;" alt="chef_happy">

            <br><br><br>
            <p id="confirmationModalP"></p>
            <div style="width:80%; margin:auto">
                <div class="sharpBox" style="width:100%" id="confirmationTrue">Ya</div>
                <div class="sharpBox" style="width:100%" id="confirmationFalse" onclick="$('#confirmationModal').modal('hide')">Tidak</div>
            </div>
        </div>
    </div>
</div>

<script>
    function showConfirmationModal(data){
        let confAction = data.getAttribute('confAction');

        if(confAction == "removeProgress"){
            document.getElementById('confirmationModalTitle').textContent = "Hapus progres memasak?";
            document.getElementById('confirmationModalP').textContent = "Progress yang sudah dihapus tidak dapat dikembalikan";
            document.getElementById('confirmationModalImg').src = "/assets/chef_trash.png";
        }else if(confAction == "deleteReview"){
            document.getElementById('confirmationModalTitle').textContent = "Hapus ulasan?";
            document.getElementById('confirmationModalP').textContent = "Ulasan yang sudah dihapus tidak dapat dikembalikan";
            document.getElementById('confirmationModalImg').src = "/assets/chef_trash.png";
        }


        document.getElementById('confirmationTrue').onclick = function(){
            if(confAction){
                if(confAction == "removeProgress"){
                    removeProgress(data);
                }else if(confAction == "deleteReview"){
                    deleteReview(data);
                }
            }
            $('#confirmationModal').modal('hide');
        }
        $('#confirmationModal').modal('show');
    }
</script>