//VALIDACIÓN DE FORMULARIOS
$.validator.setDefaults({
    submitHandler: function () {
        form.submit();
    }
}); 

jQuery.validator.addMethod("notEqual", function(value, element, param) { 
return this.optional(element) || value != $(param).val(); 
}, "Los numeros de teléfono no deben ser iguales"); 
// VALIDACIONES DEL FORMULARIO CREAR CATEGORIAS
$(document).ready(function () {
  $("#Inscripcion").validate({

    rules: {

      PNom_atleta: {
        required: true,
        rangelength: [3, 50]
      },

      SNom_atleta: {
        required: false,
        rangelength: [3, 50]
      },

      PApellido_atleta: {
        required: true,
        rangelength: [3,50]
      },
       SApellido_atleta: {
        required: true,
        rangelength: [3,50]
      },

        Identidad_atleta: {
        required: true,
        rangelength: [13, 13]
      }, 

    fecha_atleta:{
    required: true,
    date: true
    },

     tel_atleta: {
        required: true,
        rangelength: [8, 10],
    },  


      correo_atleta: {
        required: true,
        rangelength: [8, 100]
      }, 

       Depto_atleta: { 
      min:1
       },

      Ciudad_atleta: { 
      min:1
      },

      direc_atleta: {
        required: true,
        rangelength: [1, 100]
    },

  Genero_atleta: { 
      min:1
  },

   categoria:{ 
      min:1
  },

  subcategoria:{ 
      min:1

  },

  Ecivil_atleta: { 
      min:1
  },

  tel_em: {
        required: true,
        rangelength: [8, 10],
 
    },

    respon_atleta: {
        required: true,
        rangelength: [5, 50]
    },

    }, 
    messages: {
      PNom_atleta: "Ingrese su nombre.",
      PApellido_atleta:"Ingrese su apellido",
      SApellido_atleta:"Ingrese su apellido",
      Identidad_atleta:"Ingrese su identidad",
      fecha_atleta: "Seleccione su fecha de nacimiento",
      tel_atleta:"Ingrese su teléfono personal valido",
      correo_atleta:"Ingrese su correo",
      Depto_atleta: "Seleccione un departamento",
      Ciudad_atleta:"Seleccione una ciudad",
      direc_atleta:"Ingrese su dirección",
      Genero_atleta: "Seleccione un genero",
      categoria:"Seleccione una modalidad",
      subcategoria:"Seleccione una categoría",
      Ecivil_atleta:"Seleccione su estado civíl",
      tel_em:"Ingrese un teléfono de emergencia",
      respon_atleta:"Ingrese un responsable",

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

