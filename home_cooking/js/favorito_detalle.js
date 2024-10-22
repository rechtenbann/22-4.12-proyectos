$(document).ready(function() {

    $(".favorito").click(function(){

        var id = this.id;
        var fav = 'favorito'

        $.ajax({
            url : 'favorito_detalle.php',
            type: 'post',
            data: {id : id},
            dataType: 'json',
            success : function(data){
                var favorito = data['favorito'];
                $('#'+id).html(favorito);	
						
            }
        });
    });
});

