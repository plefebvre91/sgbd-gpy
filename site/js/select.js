function failure(){
    $("#result").html("Erreur");
}

function loading(){
    $("#result").html("Chargement");
}

function selection(){
    loading();
    var categorie = $("#cat").val();
    var request = $.ajax({type:"GET",url:"ajax/ajax_select.php", data:{cat:categorie}});
    request.done(function(msg){$("#result").html(msg);});
    request.fail(failure);
}