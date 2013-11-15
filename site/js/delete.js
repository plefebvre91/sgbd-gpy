function failure(){
    $("#result").html("Erreur");
}

function loading(){
    $("#result").html("Chargement");
}



function delete_comment(id_comment){
    loading();
    var str_id = "#comment"+id_comment;

    var request = $.get("ajax/ajax_delete_comment.php", {id: id_comment});

    request.done(function(msg){$(str_id).fadeOut('slow'); });
    request.fail(failure);
    return false;
}



function delete_game(id_game){
    loading();
    var str_id = "#game"+id_game;
    var request = $.get("ajax/ajax_delete_game.php", {id: id_game});

    request.done(function(msg){$(str_id).fadeOut('slow'); });
    request.fail(failure);
    return false;
}

function delete_player(id_player){
    loading();
    var str_id = "#"+id_player;
    var request = $.get("ajax/ajax_delete_player.php", {pseudo: id_player});

    request.done(function(msg){$(str_id).fadeOut('slow'); });
    request.fail(failure);
    return false;
}
