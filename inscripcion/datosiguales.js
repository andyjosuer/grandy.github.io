
$('#correo_atleta').keyup(function (){
	$.post('inscripcion/validar_correo.php',{
	    correo: $('#correo_atleta').val()},
	function(Respuesta){
		$('.validacion').html(Respuesta);

		if (Respuesta == " ") {
			$("#Guardar").prop("disabled", false);
		}
		else{
			document.getElementById("correo_atleta").focus();
			$("#Guardar").prop("disabled", true);

		}
	});
});
 
$('#tel_atleta').keyup(function (){
	$.post('inscripcion/validar_telefono.php',{
	    telpersonal: $('#tel_atleta').val()},
	function(Respuesta){
		$('.validacion1').html(Respuesta);

		if (Respuesta == " ") {
			$("#Guardar").prop("disabled", false);
		}
		else{
			document.getElementById("tel_atleta").focus();
			$("#Guardar").prop("disabled", true);
		}
	});
});

$('#Identidad_atleta').keyup(function (){
	$.post('inscripcion/validar_identidad.php',{
	    identidad: $('#Identidad_atleta').val()},
	function(Respuesta){
		$('.validacion2').html(Respuesta);

		if (Respuesta == " ") {
			$("#Guardar").prop("disabled", false);
		}
		else{
			document.getElementById("Identidad_atleta").focus();
			$("#Guardar").prop("disabled", true);
		}
	});
});
/*---------------------------------- validar telefono --------------------------------------------*/
	
function validar_correo(campo) {
    var RegExPattern = /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/;
    if ((campo.value.match(RegExPattern)) && (campo.value!='')) {
   // document.getElementById('input_recuperacion_pass').innerHTML='';
    } else {
        alert('correo no valido');
      //  document.getElementById('e_correo').innerHTML='Ingrese un maximo de 6 caracteres entre letras y numeros';
        campo.focus();
    }
}
