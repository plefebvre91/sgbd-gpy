function failure(){
    $("#result").html("Une erreur (AJAX) est survenue");
}

function loading(){
    $("#result").html("Chargement");
}

function success(id, msg){
    $("#result").text(msg);
    $(id).fadeOut('slow');
}


function delete_comment(id_comment){
    $("#result").html("Chargement...");
    var str_id = "#comment"+id_comment;
    var request = $.get("ajax/ajax_delete_comment.php", {id: id_comment});

    request.fail(failure);
    request.done(function(msg){success(str_id, msg); $(str_id).fadeOut('slow'); });

    return false;
}



function delete_game(id_game){
    $("#result").html("Chargement...");
    var str_id = "#game"+id_game;
    var request = $.get("ajax/ajax_delete_game.php", {id: id_game});

    request.fail(failure);
    request.done(function(msg){success(str_id, msg); $(str_id).fadeOut('slow'); });

    return false;
}

function delete_player(id_player){
    $("#result").html("Chargement...");
    var str_id = "#"+id_player;
    var request = $.get("ajax/ajax_delete_player.php", {pseudo: id_player});

    request.done(function(msg){success(str_id, msg); $(str_id).fadeOut('slow'); });
    request.fail(failure);

    return false;
}


function delete_editor(id_editor){
    $("#result").html("Chargement...");
    var str_id = "#"+id_editor;
    var request = $.get("ajax/ajax_delete_editor.php", {id: id_editor});

    request.done(function(msg){success(str_id, msg); $(str_id).fadeOut('slow'); });
    request.fail(failure);

    return false;
}


function delete_platform(id_platform){
    $("#result").html("Chargement...");
    var str_id = "#"+id_platform;
    var request = $.get("ajax/ajax_delete_platform.php", {id: id_platform});

    request.done(function(msg){success(str_id, msg); $(str_id).fadeOut('slow'); });
    request.fail(failure);

    return false;
}
