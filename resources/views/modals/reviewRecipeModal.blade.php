<div class="modal fade" id="reviewFormContainer" aria-hidden="true">
    <div class="modal-dialog modalContainer modal-content" style="max-width: 80vw; width:60vw; height:90vh; background-color:white" >

        <div>
            <img src="/assets/icons/close_icon.png" alt="close_icon" class="picon" style="float:right" onclick="$('#reviewFormContainer').modal('hide')">
        </div>
        <div class="text-center justify-content-center" >
            <h1>Berikan Ulasan</h1>
            <p>Bagaimana pengalaman memasakmu? Yuk ceritakan pengalamanmu memasak dengan resep ini!</p>
            <img src="/assets/chef_review.png" style="height:150px; width:auto; border-radius:50%" alt="chef_review">
        </div>

        
        <form action="/submitReview" id="reviewForm" enctype="multipart/form-data" style="padding:30px" method="POST">
            @csrf
            <div class="col">
                <label for="rating">Berikan bintang untuk resep ini</label><label style="color:rgb(255, 57, 57)">*</label>
                <div class="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <img src="/assets/icons/empty_star.png" id="star_{{$i}}" onclick="adjustStar({{$i}})" class="starIcon" alt="star_icon">
                    @endfor
                </div>                  
                <input type="hidden" id="reviewRating" name="rating" value=""></input>
            </div>
            <div class="col">
                <label for="comment">Apa tanggapanmu mengenai resep ini?</label><label style="color:rgb(255, 57, 57)">*</label>
                <textarea maxlength="250" class="form-control textField whiteBackground" placeholder="Tulis tanggapanmu disini" oninput="recountTotalChar('reviewComment', 'reviewTanggapanTotalChar')" id="reviewComment" name="comment" rows="3"></textarea>
                <div style="float:right">
                    <span id="reviewTanggapanTotalChar">0</span><span">/250</span>
                </div>
            </div>
            <div class="col" style="display:flex; flex-direction: column">
                <label for="img">Unggah foto masakanmu :</label>
                <input type="file" id="reviewImg" name="img" accept="image/*"></input>  
            </div>
            <button type="button" onclick="submitReviewForm()" class="sharpBox mt-5">
                <img src="/assets/icons/save_icon.png" class="picon" alt="save_icon">
                Simpan
            </button>
            <p id="reviewErrorMsg" style="display:none; margin:0px; color:rgb(255, 57, 57)"></p>
            <input type="hidden" name="recipe_id" value="{{$recipe->id}}"></input>
            <input type="hidden" name="user_id" value="{{$user ? $user->id : -1}}"></input>
        </form>
        
    </div>
</div>

<script>
    function recountTotalChar(inputId, countTextId){
        var rejectionText = document.getElementById(inputId).value;
        var totalChar = rejectionText.length;
        document.getElementById(countTextId).innerHTML = totalChar;
    }
</script>