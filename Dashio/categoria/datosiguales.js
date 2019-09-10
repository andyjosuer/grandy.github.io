
$('#nombrecate').keyup(function (){
	$.post('categoria/validar_categoria.php',{
	    nombrecate: $('#nombrecate').val()},
	function(Respuesta){
		$('.validacion').html(Respuesta);

		if (Respuesta == " ") {
			$("#Guardar").prop("disabled", false);
		}
		else{
			document.getElementById("nombrecate").focus();
			$("#Guardar").prop("disabled", true);

		}
	});
});
 
