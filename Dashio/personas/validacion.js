
//VALIDACIÓN DE FORMULARIOS
$.validator.setDefaults({
    submitHandler: function () {
        form.submit();
    }
});
// VALIDACIONES DEL FORMULARIO CREAR PERSONAS
$(document).ready(function () {

	$("#formRegPersonas").validate({
		rules: {
			ident: "required",
            firstname: "required",
            secondname: false,
            firstlastname: "required",
            //secondlastname: "required",
            fchnacimiento: "required",
            direccion: "required",
            email: "required",
            telpersonal: "required",
            telemergencia: "required",
            responsable: "required",
            user: "required",
            //Genero_atleta: "required",
        
		},
		messages: {
			ident: "Por favor, ingrese la identidad de la persona",
			firstname: "Por favor, ingrese el primer nombre",
			secondname: "Por favor, ingrese el segundo nombre",
			firstlastname: "Por favor, ingrese el primer apellido",
			//secondlastname: "Por favor, ingrese el segundo apellido",
			fchnacimiento: "Por favor, ingrese la fecha de nacimiento",
			direccion: "Por favor, ingrese la direccion",
			email: "Por favor, ingrese el correo electrónico",
			telpersonal: "Por favor, ingrese el número telefónico personal",
			telemergencia: "Por favor, ingrese el número telefónico de emergencia",
			responsable: "Por favor, ingrese el nombre de la persona",
			user: "Por favor, ingrese el nombre de usuario",
			
			/*Descrip: {
		    maxlength:"Por favor, no escriba menos de 5 dígitos"
			}*/
		},
		errorElement: "em",
			errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			// } );
	});
}); 
