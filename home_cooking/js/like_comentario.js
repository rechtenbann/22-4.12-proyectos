$(document).ready(function() {

    $(".com-like").click(function(){

        var id = this.id;
        var tipo = "comentario";

        $.ajax({
            url : 'likes_comentario.php',
            type: 'post',
            data: {id : id, tipo: tipo},
            dataType: 'json',
            success : function(data){
                var like = data['like'];
                $('#'+id).html(like);		
            }
        });
    });
});

$(document).ready(function() {

    $(".res-like").click(function(){

        var id = this.id;
        var tipo = "respuesta";

        $.ajax({
            url : 'likes_comentario.php',
            type: 'post',
            data: {id : id, tipo: tipo},
            dataType: 'json',
            success : function(data){
                var like = data['like'];
                $('#'+id).html(like);		
            }
        });
    });
});
