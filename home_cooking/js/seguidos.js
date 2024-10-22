$(document).ready(function() {

    $(".siguiendo").click(function(){

        var id = this.id;

        $.ajax({
            url : 'siguiendo.php',
            type: 'post',
            data: {id : id},
            dataType: 'json',
            success : function(data){
                var siguiendo = data['siguiendo'];
                $('#'+id).html(siguiendo);
            }
        });

    });
});