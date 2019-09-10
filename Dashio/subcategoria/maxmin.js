
$('#edadmaxima').keyup(function (){
	var max = document.getElementById("edadmaxima").value;
	var min = document.getElementById("edadminima").value;
	//alert("rnuberniu");

	if (max > min || min < max) {
		$('.validacion').html("<em style='color:green' class='error help-block'>¡ta bien!</em>");
		//alert("edad maxima menor que la minima");
		//alert("soy el if");
		//alert(max);
		//alert(min);
	}

	else{
		
		$('.validacion').html("<em style='color:red' class='error help-block'>¡esto esta malo!</em>");//alert("soy el else");
			//alert(max);
		//alert(min);
	}
});

$('#edadminima').keyup(function (){
	var max = document.getElementById("edadmaxima").value;
	var min = document.getElementById("edadminima").value;
	//alert("rnuberniu");

	if (min < max || max > min) {
		$('.validacion').html("<em style='color:green' class='error help-block'>¡ta bien!</em>");
		//alert("edad maxima menor que la minima");
		
//alert("soy el if");
		//alert(max);
		//alert(min);
	}

	else {
		$('.validacion').html("<em style='color:red' class='error help-block'>¡esto esta malo!</em>");
		
		//alert("soy el else");
		//	alert(max);
		//alert(min);
	}

});

