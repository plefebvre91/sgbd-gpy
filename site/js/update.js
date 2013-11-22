function update_player(pseudo){
    var resultId = "#result-"+pseudo;
    $(resultId).html(pseudo + " - Chargement...");
    var collapseId = "#collapse-"+pseudo;    
    var formId = "#form-maj-"+pseudo;
    var request = $.get("ajax/ajax_update_player.php", $(formId).serialize()+"&pseudo="+pseudo);
    request.done(function(msg){$(resultId).html(pseudo + " - " + msg);
			       $(collapseId).fadeOut("slow");
    $(collapseId).toggleClass("panel-collapse collapse");});
    request.fail(failure);
}

function update_comment(idCommentaire){
    var resultId = "#result-"+idCommentaire;
    $(resultId).html(idCommentaire + " - Chargement...");
    var collapseId = "#collapse-"+idCommentaire;    
    var formId = "#form-maj-"+idCommentaire;
    var request = $.get("ajax/ajax_update_comment.php", $(formId).serialize());
    request.done(function(msg){$(resultId).html(idCommentaire + " - " + msg);
			       $(collapseId).fadeOut("slow");
    $(collapseId).toggleClass("panel-collapse collapse");});
    request.fail(failure);
}