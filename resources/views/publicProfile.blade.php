@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/publicProfile.css') }}">
@endsection

@section('title', 'Rempah Rempah | ' . $public_profile->name)

@section('content')

<script>
    var token = '{{csrf_token()}}';
    var public_profile_id = '{{$public_profile->id}}';
    var user_id = '{{$user->id}}';
</script>

<div>
    <div class="profileContainer">
        <div class="profileImage">
            <img src="{{asset($public_profile->img)}}" class="profilePicture" alt="profile picture">
        </div>
        <div class="profileInfoContainer">
            <h5>{{$public_profile->name}}</h5>
            <div class="d-flex" style="margin:15px 0px; width:300px; justify-content:space-between">
                @if($public_profile->id == $user->id)
                    <a href="/myProfile" style="color:black" class="sharpBox">Edit Profile</a>
                @else
                    <div class="sharpBox" id="btnFollow" onclick="toggleFollow()">
                        @if(Auth::user()->followings->contains($public_profile->id))
                            Unfollow
                        @else
                            Follow
                        @endif
                    </div>
                @endif
                <div>
                    Followers
                    <br>
                    <span id="followerCount">
                        {{$public_profile->followers->count()}}
                    </span>
                </div>
                <div>
                    Following
                    <br>
                    <span id="followingCount">
                        {{$public_profile->followings->count()}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function toggleFollow(){
        $.ajax({
            url: '/toggleFollowUser',
            type: 'POST',
            data: {
                user_id: user_id,
                other_user_id: public_profile_id,
                _token: token
            },
            success: function(res){
                document.getElementById('followerCount').textContent = res.otherUserFollowersCount,
                document.getElementById('followingCount').textContent = res.otherUserFollowingsCount,
                document.getElementById('btnFollow').textContent = res.isFollowing ? 'Unfollow' : 'Follow'
            },
        });
    }
</script>

@endsection

