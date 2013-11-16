function selection_players(){
    $("#result").html("Chargement...");
    var request = $.get("ajax/ajax_select_players.php", $("#form-consultation3").serialize());
    request.done(function(msg){$("#result").html(msg);});
    request.fail(failure);
    return false;
}


function selection_games(){
    $("#result").html("Chargement...");
    var request = $.get("ajax/ajax_select_games.php", $( "#form-consultation1" ).serialize());
    request.done(function(msg){$("#result").html(msg);});
    request.fail(failure);
    return false;
}

function selection_comments(){
    $("#result").html("Chargement...");
    var request = $.get("ajax/ajax_select_comments.php",  $("#form-consultation2").serialize());

   request.done(function(msg){$("#result").html(msg);});
    request.fail(failure);
   return false;
}