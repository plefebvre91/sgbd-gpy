function update_player(pseudo){
    var resultId = "#result-"+pseudo;
    $(resultId).html(pseudo + " - Chargement...");
    var formId = "#form-maj-"+pseudo;
    var request = $.get("ajax/ajax_update_player.php", $(formId).serialize()+"&pseudo="+pseudo);
    request.done(function(msg){$(resultId).html(pseudo + " - " + msg);
			       $(resultId).collapse("hide");});
    request.fail(failure);
}

function update_game(game_id){
    var resultId = "#result-jeu-"+game_id;
    $(resultId).html(" - Chargement...");
    var formId = "#form-maj-jeu-"+game_id;
    var request = $.get("ajax/ajax_update_game.php", $(formId).serialize()+"&idJeu="+game_id);
    request.done(function(msg){$(resultId).html(msg);
			       $(resultId).collapse("hide");});
    request.fail(failure);
}


function update_comment(idCommentaire){
    var resultId = "#result-commentaire-"+idCommentaire;
    $(resultId).html(idCommentaire + " - Chargement...");
    var formId = "#form-maj-commentaire-"+idCommentaire;
    var request = $.get("ajax/ajax_update_comment.php", $(formId).serialize());
    request.done(function(msg){$(resultId).html("Commentaire "+ idCommentaire + " - " + msg);
			       $(resultId).collapse("hide");});
    request.fail(failure);
}