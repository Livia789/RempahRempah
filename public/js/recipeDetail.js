function toggleHighlight(row) {
    row.classList.toggle('clickHighlight');
}

function hoverHighlight(row){
    row.classList.toggle('hoverHighlight');
}

function setHighlight() {
    var progressDiv = document.getElementsByClassName('progressDiv');
    var progressDivsArray = Array.from(progressDiv);

    progressDivsArray.forEach(function(progressDiv) {
        progress = progressDiv.getAttribute('progress');
        if(progress){
            progressDiv.classList.add('clickHighlight');
        }else{
            progressDiv.classList.remove('clickHighlight');
        }
    });
}

function toggleBookmark(){
    const bookmarkImage = document.getElementById('bookmarkImage');
    const imgSrc = bookmarkImage.getAttribute('src');
    if(imgSrc == '/assets/icons/bookmark_black.png'){
        bookmarkImage.setAttribute('src', '/assets/icons/bookmark_white.png');
    }else{
        bookmarkImage.setAttribute('src', '/assets/icons/bookmark_black.png');
    }
}

$(document).ready(function(){
    $("#bookmarkButton").click(function(){
        toggleBookmark();
        $.ajax({
            url: '/toggleBookmark',
            type: 'POST',
            data: {
                user_id: user_id,
                recipe_id: recipe_id,
                _token: token
            },
            success: function(response){
                console.log('bookmark status : ' + response.isBookmarked);
                let status = response.isBookmarked ? 'added' : 'removed';
                alert("Bookmark has been successfully " + status);
            },
            error: function(e) {
                alert("Error processing bookmark request");
                toggleBookmark();
            }
        });
    });
});

$(document).ready(function(){
    $("#likeButton").click(function(){
        var review_id = $(this).attr('review_id');
        $.ajax({
            url: '/likeReview',
            type: 'POST',
            data: {
                user_id: user_id,
                review_id: review_id,
                _token: token
            },
            success: function(response){
                console.log(response);
                $('#likeCount').text(response.likeCount);
                $('#dislikeCount').text(response.dislikeCount);

                var likeSrc = response.isLiked ? '/assets/icons/like_black.png' : '/assets/icons/like_empty.png';
                $('#like_icon').attr('src', likeSrc);
                var dislikeSrc = response.isDisliked ? '/assets/icons/dislike_black.png' : '/assets/icons/dislike_empty.png';
                $('#dislike_icon').attr('src', dislikeSrc);
            },
            error: function(e) {
                alert("Error processing like request");
            }
        });
    });
});

$(document).ready(function(){
    $("#dislikeButton").click(function(){
        var review_id = $(this).attr('review_id');
        $.ajax({
            url: '/dislikeReview',
            type: 'POST',
            data: {
                user_id: user_id,
                review_id: review_id,
                _token: token
            },
            success: function(response){
                console.log(response);
                $('#likeCount').text(response.likeCount);
                $('#dislikeCount').text(response.dislikeCount);

                var likeSrc = response.isLiked ? '/assets/icons/like_black.png' : '/assets/icons/like_empty.png';
                $('#like_icon').attr('src', likeSrc);

                var dislikeSrc = response.isDisliked ? '/assets/icons/dislike_black.png' : '/assets/icons/dislike_empty.png';
                $('#dislike_icon').attr('src', dislikeSrc);
            },
            error: function(e) {
                alert("Error processing like request");
            }
        });
    });
});

$(document).ready(function() {
    setHighlight();
});

$(document).ready(function(){
    $(".stepDiv").click(function(){
        var step_id = $(this).attr('step_id');
        $.ajax({
            url: '/toggleStepProgress',
            type: 'POST',
            data: {
                user_id: user_id,
                step_id: step_id,
                recipe_id: recipe_id,
                _token: token
            },
            success: function(response){
                var stepDiv = $('[step_id=' + step_id + ']');
                if(response.isProgress){
                    stepDiv.addClass('clickHighlight');

                }else{
                    stepDiv.removeClass('clickHighlight');
                }
            },
            error: function(e) {
            }
        });
    });
});

$(document).ready(function(){
    $(".ingredientDiv").click(function(){
        var ingredient_id = $(this).attr('ingredient_id');
        $.ajax({
            url: '/toggleUserIngredientProgress',
            type: 'POST',
            data: {
                user_id: user_id,
                ingredient_id: ingredient_id,
                recipe_id: recipe_id,
                _token: token
            },
            success: function(response){
                var ingredientDiv = $('[ingredient_id=' + ingredient_id + ']');
                if(response.isProgress){
                    ingredientDiv.addClass('clickHighlight');

                }else{
                    ingredientDiv.removeClass('clickHighlight');
                }
            },
            error: function(e) {
            }
        });
    });
});

$(document).ready(function(){
    $(".toolDiv").click(function(){
        var tool_id = $(this).attr('tool_id');
        $.ajax({
            url: '/toggleUserToolProgress',
            type: 'POST',
            data: {
                user_id: user_id,
                tool_id: tool_id,
                recipe_id: recipe_id,
                _token: token
            },
            success: function(response){
                var toolDiv = $('[tool_id=' + tool_id + ']');
                if(response.isProgress){
                    toolDiv.addClass('clickHighlight');

                }else{
                    toolDiv.removeClass('clickHighlight');
                }
            },
            error: function(e) {
            }
        });
    });
});

$(document).ready(function(){
    $("#btnResetCookingProgress").click(function(){
        $.ajax({
            url: '/resetCookingProgress',
            type: 'POST',
            data: {
                recipe_id: recipe_id,
                _token: token
            },
            success: function(response){
                setHighlight();
            },
            error: function(e) {
            }
        });
    });
});