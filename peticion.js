$(obtener_registros());

function obtener_registros(alumnos)
{
	$.ajax({
		url: 'consulta.php',
		type: 'POST',
		datatype: 'html',
		data: { alumnos:alumnos },
	})
	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
		
	})
}
$(document).on('keyup', '#busqueda',function()
{
	var valor=$(this).val();
	
	if(valor !="")
	{
		console.log(valor);	
		obtener_registros(valor);
	}else{
		obtener_registros();
	}
});