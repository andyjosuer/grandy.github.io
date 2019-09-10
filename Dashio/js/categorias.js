// //VALIDACIÓN DE FORMULARIOS
// $.validator.setDefaults({
//     submitHandler: function () {
//         form.submit();
//     }
// });
// // formRegCategorias
// // VALIDACIONES DEL FORMULARIO REGISTAR CLIENTE
// $(document).ready(function () {
// 	$("#formRegCategorias").validate({
// 		rules: {
// 			nombrecate: "required",
//             Genero_atleta: "required",
// 			Descrip: {
// 				required: true,
// 				rangelength: [5, 30]
// 			},
// 		},
// 		messages: {
// 			nombrecate: "Por favor, ingrese un nombre.",
// 			Genero_atleta: "Por favor, selecione un genero.",
// 			Descrip: {
// 				maxlength:"Por favor, no escriba menos de 5 dígitos"
// 			},
// 		},
// 		errorElement: "div",
// 		errorPlacement: function (error, element) {

// 			element.addClass('is-invalid');
// 			error.addClass("invalid-feedback");

// 			if (element.prop("type") === "checkbox") {
// 				error.insertAfter(element.parent("label"));
// 			} else {
// 				error.insertAfter(element);
// 			}
// 		},
// 		highlight: function (element, errorClass, validClass) {
// 			$(element).addClass("is-invalid").removeClass("is-valid");
// 		},
// 		unhighlight: function (element, errorClass, validClass) {
// 			$(element).removeClass("is-invalid");
// 		}
// 	});
// });