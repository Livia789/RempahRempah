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

function setSortLabel(){
    let sortLabel = new URLSearchParams(window.location.search).get('filter');
    if(sortLabel){
        let setLableTo = 'Urutkan ';
        if(sortLabel == 'dateDesc') setLableTo = 'Review Terbaru';
        if(sortLabel == 'dateAsc') setLableTo = 'Review Terlama';
        if(sortLabel == 'ratingDesc') setLableTo = 'Review Tertinggi';
        if(sortLabel == 'ratingAsc') setLableTo = 'Review Terendah';
        const sortLabelElement = document.getElementById('sortLabel');
        sortLabelElement.innerHTML = setLableTo;
    }
}

function setHighlight() {
    if (user_id == -1) {
        $.ajax({
            url: '/getCookingProgress',
            type: 'GET',
            data: {
                recipe_id: recipe_id,
                _token: token
            },
            success: function (response) {
                for (var i = 0; i < response.tools.length; i++) {
                    var toolDiv = $('[tool_id=' + response.tools[i] + ']');
                    toolDiv.addClass('clickHighlight');
                }
                for (var i = 0; i < response.ingredients.length; i++) {
                    var ingredientDiv = $('[ingredient_id=' + response.ingredients[i] + ']');
                    ingredientDiv.addClass('clickHighlight');
                }
                for (var i = 0; i < response.steps.length; i++) {
                    var stepDiv = $('[step_id=' + response.steps[i] + ']');
                    stepDiv.addClass('clickHighlight');
                }
            },
            error: function (e) {
            }
        });
    } else {
        var progressDiv = document.getElementsByClassName('progressDiv');
        var progressDivsArray = Array.from(progressDiv);

        progressDivsArray.forEach(function (progressDiv) {
            progress = progressDiv.getAttribute('progress');
            if (progress) {
                progressDiv.classList.add('clickHighlight');
            }
        });
    }
}

function toggleBookmark() {
    const bookmarkImage = document.getElementById('bookmarkImage');
    const imgSrc = bookmarkImage.getAttribute('src');
    if (imgSrc == '/assets/icons/bookmark_black.png') {
        bookmarkImage.setAttribute('src', '/assets/icons/bookmark_white.png');
    } else {
        bookmarkImage.setAttribute('src', '/assets/icons/bookmark_black.png');
    }
}

$(document).ready(function () {
    $("#bookmarkButton").click(function () {
        toggleBookmark();
        $.ajax({
            url: '/toggleBookmark',
            type: 'POST',
            data: {
                user_id: user_id,
                recipe_id: recipe_id,
                _token: token
            },
            success: function (response) {
                console.log('bookmark status : ' + response.isBookmarked);
                let status = response.isBookmarked ? 'added' : 'removed';
                alert("Bookmark has been successfully " + status);
            },
            error: function (e) {
                msg = e.status == 401 ? "[Error] Please login to bookmark recipe" : "Error processing bookmark request"
                alert(msg);
                toggleBookmark();
            }
        });
    });
});

function likeReview(btnLike, btnDislike) {
    var review_id = $(btnLike).attr('review_id');
    $.ajax({
        url: '/likeReview',
        type: 'POST',
        data: {
            user_id: user_id,
            review_id: review_id,
            _token: token
        },
        success: function (response) {
            console.log(response);
            $(btnDislike).find('#dislikeCount').text(response.dislikeCount);
            $(btnLike).find('#likeCount').text(response.likeCount);

            var likeSrc = response.isLiked ? '/assets/icons/like_black.png' : '/assets/icons/like_empty.png';
            $(btnLike).find("img").attr('src', likeSrc);
            
            var dislikeSrc = response.isDisliked ? '/assets/icons/dislike_black.png' : '/assets/icons/dislike_empty.png';
            $(btnDislike).find("img").attr('src', dislikeSrc);
        },
        error: function (e) {
            msg = e.status == 401 ? "[Error] Please login to like this review" : "Error processing like request";
            alert(msg);
        }
    });
}

function dislikeReview(btnLike, btnDislike) {
    var review_id = $(btnDislike).attr('review_id');
    $.ajax({
        url: '/dislikeReview',
        type: 'POST',
        data: {
            user_id: user_id,
            review_id: review_id,
            _token: token
        },
        success: function (response) {
            console.log(response);
            $(btnDislike).find('#dislikeCount').text(response.dislikeCount);
            $(btnLike).find('#likeCount').text(response.likeCount);
            
            var likeSrc = response.isLiked ? '/assets/icons/like_black.png' : '/assets/icons/like_empty.png';
            $(btnLike).find("img").attr('src', likeSrc);
            var dislikeSrc = response.isDisliked ? '/assets/icons/dislike_black.png' : '/assets/icons/dislike_empty.png';
            $(btnDislike).find("img").attr('src', dislikeSrc);
        },
        error: function (e) {
            msg = e.status == 401 ? "[Error] Please login to dislike review" : "Error processing dislike request";
            alert(msg);
        }
    });
}

$(document).ready(function () {
    $(".stepDiv").click(function () {
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
            success: function (response) {
                console.log(response);
                if(response.allStepsDone === true) {
                    showDoneCookingModals();
                }
            },
            error: function (e) {
            }
        });
    });
});

$(document).ready(function () {
    $(".ingredientDiv").click(function () {
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
            success: function (response) {
                console.log(response);
            },
            error: function (e) {
            }
        });
    });
});

$(document).ready(function () {
    $(".toolDiv").click(function () {
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
            success: function (response) {
                console.log(response);
            },
            error: function (e) {
            }
        });
    });
});

function resetCookingProgress(){
    $.ajax({
        url: '/resetCookingProgress',
        type: 'POST',
        data: {
            recipe_id: recipe_id,
            _token: token
        },
        success: function (response) {
            removeHighlight();
        },
        error: function (e) {
        }
    });
}

$(document).ready(function () {
    $('#reviewFilterBtn').click(function () {
        $('#reviewFilterDropdown').toggle();
    });
});

$(document).ready(function () {
    const filter = new URLSearchParams(window.location.search).get('filter');

    if(filter){
        var sectionTop = document.getElementById('reviewSection').getBoundingClientRect().top;
        window.scrollBy({top: sectionTop - 100});
    }
});

function adjustStar(rating){
    document.getElementById('reviewRating').value = rating;
    for (let i = 1; i <= 5; i++) {
        let star = document.getElementById(`star_${i}`);
        if(i <= rating){
            star.src = '/assets/icons/full_star.png';
        } else {
            star.src = '/assets/icons/empty_star.png';
        }
    }  
}

function submitReviewForm(){
    let rating = document.getElementById('reviewRating').value;
    let comment = document.getElementById('reviewComment').value;

    let errorMsg = "";
    if (rating == '') errorMsg += "Mohon berikan bintang untuk resep ini<br>";
    if (comment == '') errorMsg += "Mohon berikan tanggapan untuk resep ini";

    if (rating && comment) {
        var form = document.getElementById('reviewForm');
        form.submit();
    } else {
        let errorMsgElement = document.getElementById('reviewErrorMsg');
        errorMsgElement.innerHTML = errorMsg;
        errorMsgElement.style.display = 'block';
    }
}

function showDoneCookingModals(){
    $('#doneCooking_resetProgressContainer').modal('show');

    $('#doneCooking_resetProgressContainer').on('shown.bs.modal', function () {
        confetti({
            particleCount: 50,
            spread: 200,
            gravity:0.5,
            origin: { y: 0.18 },
            zIndex: 1100
        });
    });

    $('#doneCooking_resetProgressContainer').on('hidden.bs.modal', function () {
        $('#reviewFormContainer').modal('show');
    });
}

function doneCookingResetProgress(resetProgress){
    if(resetProgress){
        resetCookingProgress();
    }
    $('#doneCooking_resetProgressContainer').modal('hide');
}


$(document).ready(function () {
    setHighlight();
    setSortLabel();
});
