$(document).ready(function() {

    $(".favorito").click(function(){

        var id = this.id;
        var fav = 'favorito'

        $.ajax({
            url : 'favorito.php',
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

