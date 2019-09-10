/*****************************Validar correo***********************************************************/
//
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
/****************************************************************************************************/


function validarLetras(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==32) return false; // espacio
  if (tecla==8) return true;
    patron =/^([a-z\xc0-\xff]+)$/i;
  te = String.fromCharCode(tecla);
  return patron.test(te);
}

function validarNumeros(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==32) return false; // espacio
  if (tecla==8) return true;

    patron = /\d/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
  }

//############# VALIDAR FECHA ############//
var patron_fecha = new Array(2,2,4);
function mascara_fechas(d,sep,pat,nums){
if(d.valant != d.value){
	val = d.value
	largo = val.length
	val = val.split(sep)
	val2 = ''
	for(r=0;r<val.length;r++){
		val2 += val[r]
	}
	if(nums){
		for(z=0;z<val2.length;z++){
			if(isNaN(val2.charAt(z))){
				letra = new RegExp(val2.charAt(z),"g")
				val2 = val2.replace(letra,"")
			}
		}
	}
	val = ''
	val3 = new Array()
	for(s=0; s<pat.length; s++){
		val3[s] = val2.substring(0,pat[s])
		val2 = val2.substr(pat[s])
	}
	for(q=0;q<val3.length; q++){
		if(q ==0){
			val = val3[q]
		}
		else{
			if(val3[q] != ""){
				val += sep + val3[q]
				}
		}
	}
	d.value = val
	d.valant = val
	}
};
//###### FIN VALIDAR FECHAS

//############# VALIDAR IDENTIDAD ############//
var patron_identidad = new Array(4,4,5);
function mascara_identidad(d,sep,pat,nums){
if(d.valant != d.value){
	val = d.value
	largo = val.length
	val = val.split(sep)
	val2 = ''
	for(r=0;r<val.length;r++){
		val2 += val[r]
	}
	if(nums){
		for(z=0;z<val2.length;z++){
			if(isNaN(val2.charAt(z))){
				letra = new RegExp(val2.charAt(z),"g")
				val2 = val2.replace(letra,"")
			}
		}
	}
	val = ''
	val3 = new Array()
	for(s=0; s<pat.length; s++){
		val3[s] = val2.substring(0,pat[s])
		val2 = val2.substr(pat[s])
	}
	for(q=0;q<val3.length; q++){
		if(q ==0){
			val = val3[q]
		}
		else{
			if(val3[q] != ""){
				val += sep + val3[q]
				}
		}
	}
	d.value = val
	d.valant = val
	}

};
//###### FIN VALIDAR IDENTIDAD

//############# VALIDAR TELEFONOS ############//
var patron_telefono = new Array(4,4);
function mascara_telefonos(d,sep,pat,nums){
  var telefono =($('#tele').val());

  if (telefono.length==11) {
      //alert('valgo nueve');

  }
if(d.valant != d.value){
	val = d.value
	largo = val.length
	val = val.split(sep)
	val2 = ''
	for(r=0;r<val.length;r++){
		val2 += val[r]
	}
	if(nums){
		for(z=0;z<val2.length;z++){
			if(isNaN(val2.charAt(z))){
				letra = new RegExp(val2.charAt(z),"g")
				val2 = val2.replace(letra,"")
			}
		}
	}
	val = ''
	val3 = new Array()
	for(s=0; s<pat.length; s++){
		val3[s] = val2.substring(0,pat[s])
		val2 = val2.substr(pat[s])
	}
	for(q=0;q<val3.length; q++){
		if(q ==0){
			val = val3[q]
		}
		else{
			if(val3[q] != ""){
				val += sep + val3[q]
				}
		}
	}
	d.value = val
	d.valant = val
	}
};
//###### FIN VALIDAR TELEFONOS

// ***********************************************************

var patron_identidad = new Array(4,4,5);
function valiindenti(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==32) return false; // espacio
  if (tecla==8) return true;

    patron = /\d/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
  }


  //********************************************************


  // function formatMiles(input) {
  //
  //     var num = input.value;
  //
  //     var comms_dots = num.match(/\.|\,/g);
  //
  //     if (!isNaN(num.replace(/[\.\,]/, '')) && (!comms_dots || comms_dots.length < 2)) {
  //
  //         num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1');
  //
  //         num = num.split('').reverse().join('').replace(/\./g, ',');
  //
  //         input.value = num;
  //
  //     } else {
  //
  //         alert('Solo se permiten numeros');
  //
  //         input.value = input.value.replace(/[^\d]*/g, '');
  //
  //     }
  //
  //     return input;
  //
  // }
