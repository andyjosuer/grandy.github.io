/*FUNCION para validar las texbox con el correo */

$('#finall').keyup(function (){
	$.post('evento/validacionfechas.php',{
	    finall:$('#finall').val(),
		inicial:$('#inicial').val()},
	function(Respuesta){
		$('.validacion').html(Respuesta);

		
	});
});




