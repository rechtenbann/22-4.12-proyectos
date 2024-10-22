$(document).ready(function() {

    $(".sesion").click(function(){

        var mail = document.getElementById("username").value;
        var pass = document.getElementById("password").value;
        var recordar = document.getElementById("cookie").value;

        $.ajax({
            url : 'login.php',
            type: 'post',
            data: {mail : mail, password: pass, recordar: recordar},
            dataType: 'json',
            success : function(data){
                if(data['header'] == true){
                    window.location="index.php"
                }
                else{
                    var msj = data['msj'];
                    $('#caja-msj').html(msj);
                    document.getElementById('password').value = '';
                }
            }
        });

    });
});