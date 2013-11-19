// function selection(type, id){
//     var url = "ajax/ajax_select_"+type+".php";
//     var formId = "#form-consultation"+id;
//     $("#result").html("Chargement...");
//     var request = $.get(url, $(formId).serialize());
//     request.done(function(msg){$("#result").html(msg);});
//     request.fail(failure);
//     return false;

// }

// function selection_players(){
//     selection("players", "3");
// }


// function selection_comments(){
//     selection("comments", "2");
// }



// function selection_games(){
//     selection("games", "1");
// }



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