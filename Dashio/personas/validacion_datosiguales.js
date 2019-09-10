/*FUNCION para validar las texbox con el correo */

$('#email').keyup(function (){
	$.post('personas/vali_correo.php',{
	    email:$('#email').val()},
	function(Respuesta){
		$('.validacion').html(Respuesta);

		if (Respuesta == " ") {
			$("#Guardar").prop("disabled", false);

		}else{
			document.getElementById("email").focus();
			$("#Guardar").prop("disabled", true);
		}
	});
});

$('#user').keyup(function (){
	$.post('personas/vali_user.php',{
	    user:$('#user').val()},
	function(Respuesta){
		$('.validacion3').html(Respuesta);

		if (Respuesta == " ") {
			$("#Guardar").prop("disabled", false);

		}else{
			document.getElementById("user").focus();
			$("#Guardar").prop("disabled", true);
		}
	});
});

$('#ident').keyup(function (){
	$.post('personas/vali_identidad.php',{
	    ident:$('#ident').val()},
	function(Respuesta){
		$('.validacion2').html(Respuesta);

		if (Respuesta == " ") {
			$("#Guardar").prop("disabled", false);

		}else{
			document.getElementById("ident").focus();
			$("#Guardar").prop("disabled", true);
		}
	});
});

$('#telpersonal').keyup(function (){
	$.post('personas/vali_telefono.php',{
	    telpersonal:$('#telpersonal').val()},
	function(Respuesta){
		$('.validacion1').html(Respuesta);

		if (Respuesta == " ") {
			$("#Guardar").prop("disabled", false);

		}else{
			document.getElementById("telpersonal").focus();
			$("#Guardar").prop("disabled", true);
		}
	});
});



