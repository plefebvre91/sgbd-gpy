function add_player(){
    $("#result").html("Chargement...");
    var request = $.get("ajax/ajax_add_player.php", $("#form-ajout1").serialize());
    request.done(function(msg){$("#result").html(msg);
			       $("#form-ajout1").fadeOut("slow");});
    request.fail(failure);
    return false;
}

