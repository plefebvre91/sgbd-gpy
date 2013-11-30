function delete_object(type, id){
    var url = "ajax/ajax_delete_"+type+".php";
    var str_id = "#"+type+""+id;

    $("#result").html("Chargement...");

    var request = $.get(url, {id: id});
    request.fail(failure);
    request.done(
	function(msg){
	    success(msg); 
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

function delete_game(id_game) {
    var str_id = "#jeu" + id_game;
    $("#result").html("Chargement...");
    var request = $.get("ajax/ajax_delete_game.php", {game: id_game});
    request.fail(failure);
    request.done(
	function(msg){
	    $("#result").html(msg); 
	    $(str_id).fadeOut('slow');
	    });
}


function delete_player(id_player){
    delete_object("player", id_player);
}
