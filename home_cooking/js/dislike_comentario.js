$(document).ready(function() {

    $(".com-dislike").click(function(){

        var id = this.id;
        

        $.ajax({
            url : 'dislike_comentario.php',
            type: 'post',
            data: {id : id},
            dataType: 'json',
            success : function(data){
                var dislike = data['dislike'];
                $('#'+id).html(dislike);		
            }
        });
    });
});