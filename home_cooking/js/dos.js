$(document).ready(function() {

    $(".dos").click(function(){

        var id = this.id;

        $.ajax({
            url : 'like_car2.php',
            type: 'post',
            data: {id : id},
            dataType: 'json',
            success : function(data){
                var dos = data['dos'];
                $('#'+id).html(dos);		
            }
        });
    });
});

$(document).ready(function() {

    $(".fdos").click(function(){

        var id = this.id;
        var fav = 'favorito'

        $.ajax({
            url : 'favorito_car2.php',
            type: 'post',
            data: {id : id},
            dataType: 'json',
            success : function(data){
                var fdos = data['fdos'];
                $('#'+id).html(fdos);	
						
            }
        });
    });
});
