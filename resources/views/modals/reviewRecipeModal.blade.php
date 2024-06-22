<div class="modal fade" id="reviewFormContainer" aria-hidden="true">
    <div class="modal-dialog modalContainer modal-content" style="max-width: 80vw; width:60vw; height:90vh; background-color:white" >

        <div>
            <img src="/assets/icons/close_icon.png" alt="close_icon" class="picon closeModalBtn" style="float:right" onclick="$('#reviewFormContainer').modal('hide')">
        </div>
        <div class="modalContainerContent">
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
                    <input type="file" id="reviewImg" name="img" onchange="switchModal(this)" accept="image/*"></input>  
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
</div>
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

<script>
    function recountTotalChar(inputId, countTextId) {
        var rejectionText = document.getElementById(inputId).value;
        var totalChar = rejectionText.length;
        document.getElementById(countTextId).innerHTML = totalChar;
    }

    let currentInput;
    let cropper;
    let file;

    function switchModal(button) {
        $('#reviewFormContainer').modal('hide');
        handleImageUpload(button);
        $('#cropModal').on('hidden.bs.modal', function () {
            $('#reviewFormContainer').modal('show');
        });
    }

    function handleImageUpload(input) {
        file = input.files[0];

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
                    aspectRatio: 4 / 3,
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

            dataTransfer.items.add(new File([blob], file.name, {
                type: file.type
            }));
            currentInput.files = dataTransfer.files;
            $('#cropModal').modal('hide');
        }, file.type);
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
