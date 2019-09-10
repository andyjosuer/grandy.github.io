
//VALIDACIÓN DE FORMULARIOS
$.validator.setDefaults({
    submitHandler: function () {
        form.submit();
    }
});
// VALIDACIONES DEL FORMULARIO CREAR CATEGORIAS
$(document).ready(function () {
	$("#formRegCategorias").validate({
		rules: {
			nombrecate: "required",
            //Genero_atleta: "required",
            Genero_atleta: { 
      		min:1
      	},
			Descrip: {
			required: true,
			rangelength: [0, 1000]
			},
		},
		messages: {
			nombrecate: "Por favor, ingrese el nombre de la categoría.",
			Genero_atleta: "Por favor, seleccione un Género.",
			Descrip: {
		    maxlength:"Por favor, no escriba menos de 5 dígitos"
			},
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
