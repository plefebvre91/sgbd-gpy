function add_player() {
    $("#result").html("Chargement...");
    var url = $("#form-ajout1").serialize();
    if (url.indexOf("=&") != -1) {
	$("#result").html("Veuillez remplir tous les champs correctement.");
	return;
    }
    var request = $.get("ajax/ajax_add_player.php", url);
    request.done(function(msg){$("#result").html(msg);
			       $("#form-ajout1").fadeOut("slow");});
    request.fail(failure);
}

function add_game() {
    $("#result").html("Chargement...");
    var request = $.get("ajax/ajax_add_game.php", $("#form-ajout2").serialize());
    request.done(function(msg){$("#result").html(msg);
			       $("#form-ajout2").fadeOut("slow");});
    request.fail(failure);
}

function add_editor() {
    $("#result").html("Chargement...");
    var request = $.get("ajax/ajax_add_editor.php", $("#form-ajout3").serialize());
    request.done(function(msg){$("#result").html(msg);
			       $("#form-ajout3").fadeOut("slow");});
    request.fail(failure);
}


function add_platform() {
    $("#result").html("Chargement...");
    var request = $.get("ajax/ajax_add_platform.php", $("#form-ajout4").serialize());
    request.done(function(msg){$("#result").html(msg);
			       $("#form-ajout4").fadeOut("slow");});
    request.fail(failure);
}


function add_category() {
    $("#result").html("Chargement...");
    var request = $.get("ajax/ajax_add_category.php", $("#form-ajout5").serialize());
    request.done(function(msg){$("#result").html(msg);
			       $("#form-ajout5").fadeOut("slow");});
    request.fail(failure);
}


function add_inch(id, value) {
    var comment_id = "#comment"+id;
    $("#result").html("Chargement...");
    var login = $("#liste_pseudo_pouce").val();
    var request = $.get("ajax/ajax_add_inch.php", {idCommentaire: id, value: value, pseudo: login});
    request.done(function(msg){$("#result").html(msg);});
    request.fail(failure);
}

function add_comment() {
    $("#result").html("Chargement...");

    var request = $.get("ajax/ajax_add_comment.php", $("#form-ajout7").serialize());
    request.done(function(msg){$("#result").html(msg);
			       $("#form-ajout7").fadeOut("slow");});
    request.fail(failure);
}