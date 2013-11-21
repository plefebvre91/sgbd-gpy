function update_player(pseudo){
    var resultId = "#result-"+pseudo;
    $(resultId).html(pseudo + " - Chargement...");
    var formId = "#form-maj-"+pseudo;
    var request = $.get("ajax/ajax_update_player.php", $(formId).serialize()+"&pseudo="+pseudo);
    request.done(function(msg){$(resultId).html(pseudo + " - " + msg);});
    request.fail(failure);
    return false;
}