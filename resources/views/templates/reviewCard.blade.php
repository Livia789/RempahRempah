<div style="background-color:white; padding:15px; border-radius:20px; margin-bottom:30px;">
    <div class="d-flex" style="justify-content:space-between">
        <div class="d-flex">
            <img src="{{ Auth::check() ? asset(Auth::user()->profile_img) : asset('storage/users/default_profile_img.png') }}" alt="profile image" style="width:50px; height:50px; margin:auto 0px;"alt="bookmark_icon">
            <p style="margin:auto 0px auto 20px"><b>Lala</b></p>
        </div>

        <div class="sharpBox" onclick="toggleBookmark()">
            <img src="/assets/icons/like_empty.png" class="picon" alt="bookmark_icon">
            Like
        </div>
    </div>
    
    <div class="d-flex">
        @include('templates.rating', ['rating_avg' => $review->rating])
        <p style="margin:auto 10px; font-weight:bold"> |&nbsp;&nbsp;&nbsp;{{ explode(" ", $recipe->created_at)[0] }} </p>
    </div>
    <div class="d-flex">
        <img src="/assets/food.png" style="width:200px; height:auto; margin:auto 0px;"alt="bookmark_icon">
        <p style="margin-left:30px">{{$review->comment}}</p>
    </div>
</div>
