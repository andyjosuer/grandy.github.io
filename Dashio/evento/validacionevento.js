
//VALIDACIÓN DE FORMULARIOS
$.validator.setDefaults({
    submitHandler: function () {
        form.submit();
    }
});



// VALIDACIONES DEL FORMULARIO CREAR CATEGORIAS
$(document).ready(function () {
    $("#formnuevoevento").validate({
        rules: {
            nombre: {
                required: true,
                maxlength: [50]
            },
            inicial: "required",
            finall: "required",
            lugar: {
                required: true,
                maxlength: [100]
            },
            descrip: {
                
                maxlength: [200]
            },
            categoria: {
                
                min:1
                
           },
        },
        messages: {
            nombre:{ required: "Por favor, ingrese el nombre del evento.",
                    maxlength: "No se permiten mas de 50 caracteres.!"
              },
            inicial: "Por favor, seleccione la fecha inicial del evento.",
            finall: "Por favor, seleccione la fecha final del evento.",
            lugar:  {
                 required: "Por favor, ingrese el lugar a realizar el evento.",
                 maxlength: "No se permiten mas de 50 caracteres.!"
            },
            descrip: {
                maxlength:"No se permiten mas de 200 caracteres.!"
            },
            categoria: {
                
                min:"Debe seleccionar una opcion.!"
                
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

