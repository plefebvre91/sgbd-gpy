function delete_object(type, id){
    var url = "ajax/ajax_delete_"+type+".php";
    var str_id = "#"+type+""+id;

    $("#result").html("Chargement...");

    var request = $.get(url, {id: id});
    request.fail(failure);
    request.done(
	function(msg){
	    success(str_id, msg); 
	    if(type == "player"){
		var player_id = "#"+id;
		$(player_id).fadeOut('slow');
	    }
	    else{
		$(str_id).fadeOut('slow');
	    }
	});

}


function delete_comment(id_comment){
    delete_object("comment", id_comment);
}

function delete_platform(id_platform){
    delete_object("platform", id_platform);
}

function delete_game(id_game, id_platform){
    var url = "ajax/ajax_delete_game.php";
    var str_id = "#game"+id_game;

    $("#result").html("Chargement...");

    var request = $.get(url, {id_game: id_game, id_platform: id_platform});
    request.fail(failure);
    request.done(
	function(msg){
	    success(str_id, msg); 
	    $(str_id).fadeOut('slow');
	    });


}


function delete_player(id_player){
    delete_object("player", id_player);
}

function delete_editor(id_editor){
    delete_object("editor", id_editor);
}
