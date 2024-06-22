<?php
    use App\Models\ReviewReaction;
    $liked = False;
    $disliked = False;
    if(Auth::check()){
        $liked = ReviewReaction::where('review_id', $review->id)->where('user_id', $user->id)->where('type', 'like')->exists();
        $disliked = ReviewReaction::where('review_id', $review->id)->where('user_id', $user->id)->where('type', 'dislike')->exists();
    }

    $like_icon = $liked ? "like_black.png" : "like_empty.png";
    $dislike_icon = $disliked ? "dislike_black.png" : "dislike_empty.png";
?>


<div id="reviewCard" style="background-color:white; padding:15px; border-radius:20px; margin-bottom:30px;">
    <div class="d-flex" style="justify-content:space-between">
        <div class="d-flex">
            <img src="{{ Auth::check() ? asset(Auth::user()->img) : asset('storage/users/default_profile_img.png') }}" alt="profile image" style="width:50px; height:50px; margin:auto 0px;" alt="profile_image">
        <p style="margin:auto 0px auto 20px"><b>{{$review->user->name}}</b></p>
        </div>

        @if(!Auth::user() || Auth::user()->role == 'member')
            <div class="d-flex">
                <div class="sharpBox" id="likeButton" onclick="likeReview(this, this.nextElementSibling)" review_id="{{$review->id}}" style="align-items: center">
                    <img src="/assets/icons/{{$like_icon}}" id="like_icon" class="picon" alt="like_icon">
                    <div id="likeCount">
                        {{$review->likes->count()}}
                    </div>
                </div>
                <div class="sharpBox" id="dislikeButton" onclick="dislikeReview(this.previousElementSibling, this)" review_id="{{$review->id}}" style="align-items: center">
                    <img src="/assets/icons/{{$dislike_icon}}" id="dislike_icon" class="picon" alt="dislike_icon">
                    <div id="dislikeCount">
                        {{$review->dislikes->count()}}
                    </div>
                </div>  
            </div>
        @endif

    </div>

    <div class="d-flex">
        @include('templates.rating', ['rating_avg' => $review->rating])
        <p style="margin:auto 10px; font-weight:bold"> |&nbsp;&nbsp;&nbsp;{{ explode(" ", $review->created_at)[0] }} </p>
    </div>
    <div class="text-wrapper" style="text-align: justify">
        @if($review->img)
            <img src="{{ asset('storage/reviewImages/'.$review->img) }}" style="width:45%; height:auto;" alt="review_image" class="image-wrapper">
        @endif
        <p>{{$review->comment}}</p>

    </div>
</div>

<style>
    .reviewCardImg{
        width:100%; 
        padding-right:20px; 
        height:auto; 
        margin-right:30px;
    }
    .image-wrapper {
        float: left;
        margin-right: 15px;
    }

    .text-wrapper {
        overflow: hidden;
    }

    @media(max-width:600px){
        .reviewCardImg{
            padding:0px;
        }
        .reviewImageCommentCtr{
            flex-direction:column;
        }
        #reviewCard .picon{
            width:17px;
            height:17px;
        }

        #reviewCard .sharpBox{
            padding:5px 10px !important;
        }

    }
</style>