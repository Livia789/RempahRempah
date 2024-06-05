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


<div style="background-color:white; padding:15px; border-radius:20px; margin-bottom:30px;">
    <div class="d-flex" style="justify-content:space-between">
        <div class="d-flex">
            <img src="{{ Auth::check() ? asset(Auth::user()->img) : asset('storage/users/default_profile_img.png') }}" alt="profile image" style="width:50px; height:50px; margin:auto 0px;" alt="profile_image">
            <p style="margin:auto 0px auto 20px"><b>Lala</b></p>
        </div>
        <div class="d-flex">

            <div class="sharpBox" id="likeButton" review_id="{{$review->id}}">
                <img src="/assets/icons/{{$like_icon}}" id="like_icon" class="picon" alt="like_icon">
                <div id="likeCount">
                    {{$review->likes->count()}}
                </div>
            </div>
            <div class="sharpBox" id="dislikeButton" review_id="{{$review->id}}">
                <img src="/assets/icons/{{$dislike_icon}}" id="dislike_icon" class="picon" alt="dislike_icon">
                <div id="dislikeCount">
                    {{$review->dislikes->count()}}
                </div>
                {{-- //TODO: icon dislike --}}
            </div>  
        </div>

    </div>
    
    <div class="d-flex">
        @include('templates.rating', ['rating_avg' => $review->rating])
        <p style="margin:auto 10px; font-weight:bold"> |&nbsp;&nbsp;&nbsp;{{ explode(" ", $review->created_at)[0] }} </p>
    </div>
    <div class="d-flex">
        <img src="{{ asset($review->img) }}" style="width:200px; height:auto; margin:auto 0px;"alt="review_image">
        <p style="margin-left:30px">{{$review->comment}}</p>
    </div>
</div>