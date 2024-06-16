@extends('templates/profile')

@section('title', 'Rempah Rempah | Ulasan Saya')

<link rel="stylesheet" href="{{ asset('css/profile/myReviews.css') }}">

<script>
    var token = '{{csrf_token()}}';
    var reviewLength = '{{count($reviews)}}';
</script>


@section('profileContent')
    @include('modals.confirmationModal')
    {{-- judulnya jgn lupa --}}
    <div style="width:75%" >
        <h1>Ulasan Saya</h1>
        <div class="profileContentContainer">
            @foreach($reviews as $review)
                <?php $recipe = $review->recipe ?>
                {{--  //TODO: link ke page recipeDetail yg baru nanti kl udah ada --}}
                <div class="d-flex" id="reviewCard" style="margin-bottom:20px; margin-right:20px; background-color:white; border:3px solid black; border-radius:7px; width:40%; justify-content:space-between">
                    <a href="/recipeDetail/{{ $recipe->id }}" class="reviewCardContainer">
                        <div class="cardContent">
                            <img src="{{ asset($review->recipe->img) }}" class="recipeImg" alt="recipe img">
                            <p class="reviewCardTitle"><b>{{ $review->recipe->name }}</b></p>
                            <div class="d-flex align-items-center">
                                Resep oleh &nbsp; <b>{{ "@".$review->recipe->creator->name }}</b>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="/assets/icons/time_icon.png" class="picon" alt="time_icon">
                                <p style="margin:auto 0px">{{ $review->recipe->getDurationStr() }}</p>
                            </div>
                        </div>
                        <div class="cardDivider"></div>
                        <div class="cardContent" style="margin-right:0px">
                            <div class="d-flex">
                                <p style="margin-top:0px;" class="reviewCardTitle">Ulasan Saya</p>
                            </div>
    
                            <img src="{{ asset($review->recipe->img) }}" class="reviewImg" alt="recipe img">
    
                            {{-- ada bagusnya taro tgl dia post reviewnya jg ga sih di cardnya --}}
                            @include('templates/rating', ['rating_avg' => $review->recipe->reviews->avg('rating')])
                            <p>{{$review->comment}}</p>
                        </div>
                    </a>
                    <div style="margin-top:10px">
                        <img src="assets/icons/trash_closed.png" alt="trash_icon" class="picon" confAction="deleteReview" onclick="showConfirmationModal(this)" review_id="{{$review->id}}" onmouseover="setTrashOpen(this)" onmouseout="setTrashClosed(this)">
                    </div>
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
            }
        }); 
    }

    function setTrashOpen(trash){
        trash.src = "/assets/icons/trash_open.png";
    }

    function setTrashClosed(trash){
        trash.src = "/assets/icons/trash_closed.png";
    }
</script>