$(document).ready(function() {

    $(".seguidor").click(function(){

        var id = this.id;

        $.ajax({
            url : 'seguidor.php',
            type: 'post',
            data: {id : id},
            dataType: 'json',
            success : function(data){
                var seguidor = data['seguidor'];
                $('#'+id).html(seguidor);
            }
        });

    });
});