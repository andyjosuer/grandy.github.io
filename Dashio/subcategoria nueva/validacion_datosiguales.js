/*FUNCION para validar las texbox con el correo */

$('#edadmaxima').keyup(function (){
	$.post('subcategoria/vali_edadmaxima.php',{
	    edadmaxima:$('#edadmaxima').val(),
		edadminima:$('#edadminima').val()},
	function(Respuesta){
		$('.validacion').html(Respuesta);

		
	});
});

