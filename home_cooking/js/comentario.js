function editar(id){
    console.log(id);
    var id_comida = document.getElementById("metadata-id").title;
    var tipo = document.getElementById("editar-" + id).title;
    var anchor = document.getElementById("caja-" + id).id;
    var comentario = document.getElementById("comentario-" + id);
    var texto = document.getElementById("comentario-" + id + "-texto").innerText;


    //console.log(tipo);
    //console.log(id_comida);
    console.log(comentario);
    console.log(texto);
    console.log(anchor);

    comentario.innerHTML = "<form action='editar_comentario.php?tipo=" + tipo + "&id=" + id + "&location=detalles_receta.php&id_comida=" + id_comida + "&anchor=" + anchor +"' id='formulario' method='POST' class='mb-4'><textarea class='form-control' rows='3' placeholder='Comenta!' name='comentario' REQUIRED>" + texto + "</textarea><br><button type='submit' id='enviar' class='btn btn-light'>Editar</button><button type='reset' name='Cancelar' style='margin-left: 5px;' class='btn btn-light' onclick='cancelar("+ id +")'>Cancelar</button></form>";
    //comentario.innerHTML = "<form id='formulario' method='POST' class='mb-4'><textarea class='form-control' rows='3' placeholder='Comenta!' name='comentario' REQUIRED>" + texto + "</textarea><br><button type='button' id='enviar' class='btn btn-light'>Editar</button></form><div id='resultado'></div><script> $('#enviar').click(function(){ $.ajax({ url: 'editar_comentario.php?id=" + id + "&location=detalles_receta.php&id_comida=" + id_comida + "', type: 'post', data: $(#formulario).serialize(), success: function(resultado) { $('#resultado').html(resultado)} }) }); </script>";
}

function editar_r(id){
    console.log(id);
    var id_comida = document.getElementById("metadata-id").title;
    var tipo = document.getElementById("editar-r-" + id).title;
    var comentario = document.getElementById("respuesta-" + id);
    var anchor = document.getElementById("caja-r-" + id).id;
    var inner = comentario.innerHTML
    var texto = document.getElementById("respuesta-" + id + "-texto").innerText;

    console.log(tipo);
    console.log(id_comida);
    console.log(comentario);
    console.log(texto);
    console.log(anchor);


    comentario.innerHTML = "<form action='editar_comentario.php?tipo=" + tipo + "&id=" + id + "&location=detalles_receta.php&id_comida=" + id_comida + "&anchor="+ anchor +"' id='formulario' method='POST' class='mb-4'><textarea class='form-control' rows='3' placeholder='Comenta!' name='comentario' REQUIRED>" + texto + "</textarea><br><button type='submit' id='enviar' class='btn btn-light'>Editar</button><button type='reset' style='margin-left: 5px' class='btn btn-light' onclick='cancelar("+ anchor + ")'>Cancelar</button></form>";
    //comentario.innerHTML = "<form id='formulario' method='POST' class='mb-4'><textarea class='form-control' rows='3' placeholder='Comenta!' name='comentario' REQUIRED>" + texto + "</textarea><br><button type='button' id='enviar' class='btn btn-light'>Editar</button></form><div id='resultado'></div><script> $('#enviar').click(function(){ $.ajax({ url: 'editar_comentario.php?id=" + id + "&location=detalles_receta.php&id_comida=" + id_comida + "', type: 'post', data: $(#formulario).serialize(), success: function(resultado) { $('#resultado').html(resultado)} }) }); </script>";
}

function responder(id){
    //console.log(id);
    var id_comida = document.getElementById("metadata-id").title;
    var comentario = document.getElementById("likes-" + id);
    var anchor = document.getElementById("caja-" + id).id;
    var inner = comentario.innerHTML;
 
    //console.log(id_comida);
    //console.log(comentario);


    comentario.innerHTML = "<form action='responder_comentario.php?id=" + id + "&location=detalles_receta.php&id_comida=" + id_comida + "#"+ anchor +"' id='formulario' method='POST' class='mb-4'><textarea class='form-control' rows='3' placeholder='Comenta!' name='comentario' REQUIRED></textarea><br><button type='submit' id='enviar' class='btn btn-light'>Comentar</button><button type='reset' style='margin-left: 5px' class='btn btn-light' onclick='cancelar("+ anchor + ")'>Cancelar</button></form>";
    //comentario.innerHTML = "<form id='formulario' method='POST' class='mb-4'><textarea class='form-control' rows='3' placeholder='Comenta!' name='comentario' REQUIRED>" + texto + "</textarea><br><button type='button' id='enviar' class='btn btn-light'>Editar</button></form><div id='resultado'></div><script> $('#enviar').click(function(){ $.ajax({ url: 'editar_comentario.php?id=" + id + "&location=detalles_receta.php&id_comida=" + id_comida + "', type: 'post', data: $(#formulario).serialize(), success: function(resultado) { $('#resultado').html(resultado)} }) }); </script>";
}

function responder_r(id, r){
    //console.log(id);
    var id_comida = document.getElementById("metadata-id").title;
    var comentario = document.getElementById("textbox-r-" + r);
    var anchor = document.getElementById("caja-r-" + r).id;
    var inner = comentario.innerHTML;
 
    //console.log(r);
    //console.log(id_comida);
    //console.log(comentario);


    comentario.innerHTML = "<div class='linea'></div><form action='responder_comentario.php?id=" + id + "&location=detalles_receta.php&id_comida=" + id_comida + "#"+ anchor +"' id='formulario' method='POST' class='mb-4'><textarea class='form-control' rows='3' placeholder='Comenta!' name='comentario' REQUIRED></textarea><br><button type='submit' id='enviar' class='btn btn-light'>Comentar</button><button type='reset' style='margin-left: 5px' class='btn btn-light''>Cancelar</button></form>";
    //comentario.innerHTML = "<form id='formulario' method='POST' class='mb-4'><textarea class='form-control' rows='3' placeholder='Comenta!' name='comentario' REQUIRED>" + texto + "</textarea><br><button type='button' id='enviar' class='btn btn-light'>Editar</button></form><div id='resultado'></div><script> $('#enviar').click(function(){ $.ajax({ url: 'editar_comentario.php?id=" + id + "&location=detalles_receta.php&id_comida=" + id_comida + "', type: 'post', data: $(#formulario).serialize(), success: function(resultado) { $('#resultado').html(resultado)} }) }); </script>";
}


function cancelar(id){
    console.log(id);    
    window.location.reload();
}