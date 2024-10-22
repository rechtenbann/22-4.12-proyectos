$(obtener_registro());

function obtener_registro(alumnos)
{
	$.ajax({
		url : 'consulta_fav.php',
		type : 'POST',
		dataType : 'html',
		data : { favoritos: alumnos },
		})

	.done(function(resultados){
		$("#tabla_favoritos").html(resultados);
	})
}

$(document).on('keyup', '#busqueda_fav', function()
{
	var valorDeBusqueda=$(this).val();
	if (valorDeBusqueda!="")
	{
		obtener_registro(valorDeBusqueda);
	}
	else
		{
			obtener_registro();
		}
});
