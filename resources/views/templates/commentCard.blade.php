<div id="commentCard" style="background-color:white; padding:15px; border-radius:20px; margin-bottom:30px;">
    @include('modals.confirmationModal')
    <div class="d-flex" style="justify-content:space-between">
        <div class="d-flex">
            <img src="{{ asset($comment->user->img) }}" alt="profile image" style="width:50px; height:50px; margin-bottom:auto;" alt="profile_image">
            <div class="text-wrapper" style="text-align: justify; margin-left:20px;">
                <span style="margin:0px"><b>{{$comment->user->name}}</b></span>
                &nbsp;
                <span style="color:grey">{{ '['.$comment->created_at->format('d-m-Y').']'}}</span>
                <p style="margin:0px">{{$comment->message}}</p>
            </div>
        </div>

        @if(Auth::user() && (Auth::user()->id == $comment->user_id || Auth::user()->role == 'admin'))
            <img src="/assets/icons/trash_closed.png" alt="trash_icon" class="picon editProfilePictureBtn" confAction="deleteComment" onclick="showConfirmationModal(this)" comment_id="{{$comment->id}}" onmouseover="setTrashOpen(this)" onmouseout="setTrashClosed(this)">
        @endif
    </div>

    @if($comment->replies->count() > 0)
        <br>
        <h5 class="mb-6">Balasan</h5>
        @foreach($comment->replies as $reply)
            <div class="replyCtr mt-4 d-flex" style="justify-content: space-between">
                <div class="d-flex">
                    <img src="{{ asset($reply->user->img) }}" alt="profile image" style="width:50px; height:50px; margin-bottom:auto;" alt="profile_image">
                    <div class="text-wrapper" style="text-align: justify; margin-left:20px;">
                        <span style="margin:0px"><b>{{$reply->user->name}}</b></span>
                        &nbsp;
                        <span style="color:grey">{{ '['.$reply->created_at->format('d-m-Y').']' }}</span>
                        <p style="margin:0px">{{$reply->message}}</p>
                    </div>
                </div>
                @if(Auth::user() && (Auth::user()->id == $reply->user_id || Auth::user()->role == 'admin'))
                    <img src="/assets/icons/trash_closed.png" alt="trash_icon" class="picon editProfilePictureBtn" confAction="deleteReply" onclick="showConfirmationModal(this)" reply_id="{{$reply->id}}" onmouseover="setTrashOpen(this)" onmouseout="setTrashClosed(this)">
                @endif
            </div>
        @endforeach
    @endif

    <br>

    @if(Auth::user())
        <i id="replyBtn" commentId="{{$comment->id}}" onclick="showReplyForm(this)"><b><u>Balas</u></b></i>
        <form id="replyForm{{$comment->id}}" action="/addReply" method="POST" style="display:none">
            @csrf
            <h6>Tuliskan Balasanmu</h6>
            <textarea name="message" id="" rows="3" style="width:100%; padding:5px 10px;"></textarea>
            <input type="hidden" name="comment_id" value="{{$comment->id}}">
            <button class="sharpBox" type="submit">
                Unggah
            </button>
        </form>
    @else
        <span style="color:grey"><i><u><a href="/login">Login</a></u></i></span>
        <i style="color:grey"><span>untuk dapat membalas pesan</span></i>
    @endif

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