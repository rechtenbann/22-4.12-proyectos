$(document).ready(function() {

    $(".tres").click(function(){

        var id = this.id;

        $.ajax({
            url : 'like_car3.php',
            type: 'post',
            data: {id : id},
            dataType: 'json',
            success : function(data){
                var tres = data['tres'];
                $('#'+id).html(tres);		
            }
        });
    });
});

$(document).ready(function() {

    $(".ftres").click(function(){

        var id = this.id;
        var fav = 'favorito'

        $.ajax({
            url : 'favorito_car3.php',
            type: 'post',
            data: {id : id},
            dataType: 'json',
            success : function(data){
                var ftres = data['ftres'];
                $('#'+id).html(ftres);	
						
            }
        });
    });
});
