function failure(){
    $("#result").html("Une erreur (AJAX) est survenue");
}

function loading(){
    $("#result").html("Chargement");
}


function success(msg){
    $("#result").text(msg);
}

