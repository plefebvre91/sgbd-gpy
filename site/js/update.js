function update_player(pseudo){
    $("#result").html("Chargement...");
    var formId = "#form-maj-"+pseudo;
    var request = $.get("ajax/ajax_update_player.php", $(formId).serialize()+"&pseudo="+pseudo);
    request.done(function(msg){$("#result").html(msg);});
    request.fail(failure);
    return false;
}