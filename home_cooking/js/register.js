$(document).ready(function() {

    $(".noregis").click(function(){

        var name = document.getElementById("name").value;
        var user = document.getElementById("username").value;
        var mail = document.getElementById("mail").value;
        var genero = document.getElementById("select").value;
        var pass = document.getElementById("password").value;
        var pass2 = document.getElementById("password2").value;

        $.ajax({
            url : 'register.php',
            type: 'post',
            data: {nombre : name, usuario: user, mail: mail, password: pass, password2: pass2, select: genero},
            dataType: 'json',
            success : function(data){
                if(data['header'] == true){
                    window.location="index.php"
                }
                else{
                    var msj = data['msj'];
                    $('#caja-msj').html(msj);
                    document.getElementById('password').value = '';
                    document.getElementById('password2').value = '';
                }
            }
        });

    });
});