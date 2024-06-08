function setTrashOpen(trash){
    trash.src = "/assets/icons/trash_open.png";
}

function setTrashClosed(trash){
    trash.src = "/assets/icons/trash_closed.png";
}

function removeProgress(trash){
    var recipe_id = trash.getAttribute('recipe_id');
    var progressCard = trash.closest('.progressCard');
    $.ajax({
        url: '/resetCookingProgress',
        type: 'POST',
        data: {
            recipe_id: recipe_id,
            _token: token
        },
        success: function(res){
            progressCard.remove();
            setFindRecipeDisplay(res.progress.length);
        }
    });
}

function setFindRecipeDisplay(count){
    findRecipes.style.display = count == '0' ? 'block' : 'none';
}

$(document).ready(function() {
    setFindRecipeDisplay(recipeCount);
});
