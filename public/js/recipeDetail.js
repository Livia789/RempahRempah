function toggleHighlight(row) {
    row.classList.toggle('clickHighlight');
}

function hoverHighlight(row){
    row.classList.toggle('hoverHighlight');
}

function removeHighlight(){
    var rows = document.getElementsByClassName('clickHighlight');
    var rowsArray = Array.from(rows);
    rowsArray.forEach(function(row) {
        row.classList.remove('clickHighlight');
    });
}

function setHighlight() {
    if(user_id == -1){
        $.ajax({
            url: '/getCookingProgress',
            type: 'GET',
            data: {
                recipe_id: recipe_id,
                _token: token
            },
            success: function(response){
                for(var i = 0; i < response.tools.length; i++){
                    var toolDiv = $('[tool_id=' + response.tools[i] + ']');
                    toolDiv.addClass('clickHighlight');
                }
                for(var i = 0; i < response.ingredients.length; i++){
                    var ingredientDiv = $('[ingredient_id=' + response.ingredients[i] + ']');
                    ingredientDiv.addClass('clickHighlight');
                }
                for(var i = 0; i < response.steps.length; i++){
                    var stepDiv = $('[step_id=' + response.steps[i] + ']');
                    stepDiv.addClass('clickHighlight');
                }
            },
            error: function(e) {
            }
        });
    }else{
        var progressDiv = document.getElementsByClassName('progressDiv');
        var progressDivsArray = Array.from(progressDiv);
    
        progressDivsArray.forEach(function(progressDiv) {
            progress = progressDiv.getAttribute('progress');
            if(progress){
                progressDiv.classList.add('clickHighlight');
            }
        });
    }
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
                msg = e.status == 401 ? "[Error] Please login to bookmark recipe" : "Error processing bookmark request"
                alert(msg);
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
                msg = e.status == 401 ? "[Error] Please login to like this review" : "Error processing like request";
                alert(msg);
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
                msg = e.status == 401 ? "[Error] Please login to dislike review" : "Error processing dislike request";
                alert(msg);
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
                setHighlight();
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
                setHighlight();
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
                setHighlight();
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
                removeHighlight();
            },
            error: function(e) {
            }
        });
    });
});