function failure(){
    $("#result").html("Erreur");
}

function loading(){
    $("#result").html("Chargement");
}

function selection_player(){
    loading();
    var request = $.get("ajax/ajax_select_players.php", $( "#testform" ).serialize());
    request.done(function(msg){$("#result").html(msg);});
    request.fail(failure);
    return false;
}

function selection_games(){
    loading();
    var request = $.get("ajax/ajax_select_games.php", $( "#testform" ).serialize());
    request.done(function(msg){$("#result").html(msg);});
    request.fail(failure);
    return false;
}

function selection_comments(){
    loading();
    var request = $.get("ajax/ajax_select_comments.php", $( "#testform" ).serialize());
    request.done(function(msg){$("#result").html(msg);});
    request.fail(failure);
    return false;
}