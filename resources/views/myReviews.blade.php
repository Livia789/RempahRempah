@extends('templates/profile')

@section('title', 'Rempah Rempah | Ulasan Saya')

<link rel="stylesheet" href="{{ asset('css/profile/myReviews.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    var token = '{{csrf_token()}}';
    var reviewLength = '{{count($reviews)}}';
</script>


@section('profileContent')
    @include('modals.confirmationModal')
    <div>
        <h1>Ulasan Saya</h1>
        <div class="profileContentContainer myReviewContainer">
            <i id="noReviewLbl">Belum ada ulasan</i>
            @foreach($reviews as $review)
                <?php $recipe = $review->recipe ?>
                <div class="d-flex myReviewCard" id="reviewCard" style="flex-direction:column; margin-bottom:20px; margin-right:20px; background-color:white; border:3px solid black; border-radius:7px; width:40%; box-sizing:border-box">
                    <div style="margin-top:10px; justify-content:space-between" class="d-flex">
                        <span style="margin-left:10px">
                            Diulas pada <b>{{$review->created_at->format('d M Y')}}</b>
                        </span>
                        <img src="assets/icons/trash_closed.png" alt="trash_icon" class="picon" confAction="deleteReview" onclick="showConfirmationModal(this)" review_id="{{$review->id}}" onmouseover="setTrashOpen(this)" onmouseout="setTrashClosed(this)">
                    </div>
                    <a href="/recipeDetail/{{ $recipe->id }}" class="reviewCardContainer">
                        <div class="cardContent webView">
                            <img src="{{ asset($review->recipe->img) }}" class="recipeImg" alt="recipe img">
                            <p class="reviewCardTitle"><b>{{ $review->recipe->name }}</b></p>
                            <div class="d-flex flex-wrap mb-2">
                                <span>Resep oleh</span> &nbsp; <b>{{ "@".$review->recipe->creator->name }}</b>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="/assets/icons/time_icon.png" class="picon" alt="time_icon">
                                <p style="margin:auto 0px">{{ $review->recipe->getDurationStr() }}</p>
                            </div>
                        </div>
                        <div class="cardDivider webView"></div>

                        <div class="cardContent" style="margin-right:0px">
                            <div class="d-flex" style="flex-direction: column">
                                <b class="reviewCardTitle mwebView" style="font-size:22px">{{$recipe->name}}</b>
                                <p style="margin-top:0px;" class="reviewCardTitle">Ulasan Saya</p>
                            </div>
    
                            <img src="{{ asset($review->recipe->img) }}" class="reviewImg" alt="recipe img">
    
                            <div>
                                @include('templates/rating', ['rating_avg' => $review->recipe->reviews->avg('rating')])
                            </div>
                            <p style="text-align: justify">{{$review->comment}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
    </div>
@endsection

<script>
    function deleteReview(trash){
        var review_id = trash.getAttribute('review_id');
        var progressCard = trash.closest('#reviewCard');
        $.ajax({
            url: '/deleteReview',
            type: 'POST',
            data: {
                review_id: review_id,
                _token: token
            },
            success: function(res){
                if(res.msg == "success"){
                    progressCard.remove();
                }
                let reviewCount = document.getElementsByClassName('myReviewCard').length;
                if(reviewCount == 0){
                    $('#noReviewLbl').show();
                }
            }
        }); 
    }

    function setTrashOpen(trash){
        trash.src = "/assets/icons/trash_open.png";
    }

    function setTrashClosed(trash){
        trash.src = "/assets/icons/trash_closed.png";
    }    

    $(document).ready(function () {
        if(reviewLength == 0){
            $('#noReviewLbl').show();
        }else{
            $('#noReviewLbl').hide();
        }
    });
</script>