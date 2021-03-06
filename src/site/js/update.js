function update_player(pseudo){
    var resultId = "#result-"+pseudo;
    $(resultId).html(pseudo + " - Chargement...");
    var formId = "#form-maj-"+pseudo;
    var url = $(formId).serialize();
    if (url.indexOf("=&") != -1) {
	$(resultId).html(pseudo + " - Veuillez remplir tous les champs correctement.");
	return;
    }
    var request = $.get("ajax/ajax_update_player.php", url + "&pseudo=" + pseudo);
    request.done(function(msg){$(resultId).html(pseudo + " - " + msg);
			       $(resultId).collapse("hide");});
    request.fail(failure);
}

function update_game(game_id){
    var resultId = "#result-jeu-"+game_id;
    $(resultId).html(" - Chargement...");
    var formId = "#form-maj-jeu-"+game_id;
    var url = $(formId).serialize();
    if (url.indexOf("=&idEditeur") != -1) {
	$(resultId).html("Veuillez saisir le nom du jeu.");
	return;
    }
    var request = $.get("ajax/ajax_update_game.php", url + "&idJeu=" + game_id);
    request.done(function(msg){$(resultId).html(msg);
			       $(resultId).collapse("hide");});
    request.fail(failure);
}


function update_comment(idCommentaire){
    var resultId = "#result-commentaire-"+idCommentaire;
    $(resultId).html(idCommentaire + " - Chargement...");
    var formId = "#form-maj-commentaire-"+idCommentaire;
    var url = $(formId).serialize();
    if (url.indexOf("=&") != -1) {
	$(resultId).html("Commentaire " + idCommentaire + " - Veuillez remplir tous les champs correctement.");
	return;
    }
    var request = $.get("ajax/ajax_update_comment.php", url + "&idCommentaire=" + idCommentaire);
    request.done(function(msg){$(resultId).html("Commentaire "+ idCommentaire + " - " + msg);
			       $(resultId).collapse("hide");});
    request.fail(failure);
}