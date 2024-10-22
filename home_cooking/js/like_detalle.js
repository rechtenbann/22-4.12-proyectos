$(document).ready(function() {

    $(".like").click(function(){

        var id = this.id;

        $.ajax({
            url : 'like_detalle.php',
            type: 'post',
            data: {id : id},
            dataType: 'json',
            success : function(data){
                var like = data['like'];
                $('#'+id).html(like);	
						
            }
        });
    });
});

