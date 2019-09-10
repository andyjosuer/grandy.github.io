<!DOCTYPE html>
<html lang="es">
<form id="form_inscripcion">
<head> 
		<meta charset="utf-8">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--*********************************** Librerias ************************************************** -->
		<title>FENAFH Inscripciones</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/fenafh.ico">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
		<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />
		<!-- Magnific Popup -->
		<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css" />
		<STYLE TYPE="text/css" MEDIA=screen>
			<!--
			body {
		 	background: url('./img/fondo.jpg');
	 		background-repeat: no-repeat;
	 		 background-position: center center;
	 		background-attachment: fixed;}
			-->
		</STYLE>
		<!---------LIBRERIA PARA EJECUTAR LA FUNCION DEL COMBOBOX ------------------------>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="Dashio/lib/jquery/jquery.validate.min.js"></script>
		<script src="Dashio/lib/jquery/messages_es.min.js"></script>

</head>
<!--******************* Inicio de la forma ************************* -->
<body oncopy = "return false" onpaste = "return false">
		<header id="home">
			<!-- ************************ Imagen de fondo *************************** -->
			<!--<div class="bg-img" style="background-image: url('./img/fondo.jpg');">	</div>-->
			<!-- ***************************** Menu superior *********************************** -->
			<div class="container">
				<nav id="nav" class="navbar nav-transparent">
				
						<div class="navbar-header">
							<!-- Logo -->
							<div class="navbar-brand">
								<a href="index.html">
									<img class="logo" src="img/fenafh_logo.png" >
									<img class="logo-alt" src="img/fenafh_logo.png" >
								</a>
							</div>
						</div>
						<!--  Navegador  -->
						<ul class="main-nav nav navbar-nav navbar-right">
							<li><a href="index.php">Principal</a></li>
							<li><a href="#home">Inicio</a></li>
							<li><a href="#about">Manual de Inscripcion</a></li>
							<li><a href="#portfolio">Galeria</a></li>
							<li><a href="#service">Requisitos</a></li>
							<li><a href="#pricing">Anti-Doping</a></li>
							<li><a href="#team">Concursos</a></li>
							<li><a href="#contact">Contactanos</a></li>

						</ul>
				</nav>
			</div>
			<br>
			<div class="home-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<br><br><br><br><br><br><br><br>
  							<form id="presentacion"  autocomplete="off"> 
  								<br><br><br>
  								<div id="contenedor" class="wrap-login100" style=" overflow-wrap : auto;">
  									<div class= "Inscripcion_atleta">
  										<h3>¡Bienvenido Participante!</h3>
  										<p>Si usted es un nuevo participante, le invitamos a llenar el siguiente formulario para hacer su preinscipción.</p>
  										<input type="button" value="Pre-inscripcion" id="preinscripcion" class="btn btn-info">
  										<br><br>
  										<p>Si ya se ha inscrito antes a través de este medio, puede validar su preinscripción entrando al siguente botón.</p>

  										<input type="button" value="Confirmar" id="confirmar" class="btn btn-info">
  										<br>
  										<br>

  										<h4>¡Les deseamos éxito y esperamos que disfruten la competencia!</h4>
  									</div>
								</div>	
  							</form>
						</div>
					</div>
				</div>
			</div>
		</header>	
	</body>
</form>
</html>

<!-------------------------- Botones --------------------------------------->
<script>
		$(document).ready(function(e){
			$('#preinscripcion').click(function(){
				$('#contenedor').load('inscripcion/inscripciones.php');
			});
			$('#confirmar').click(function(){
				$('#contenedor').load('inscripcion/confirmar_atleta.php'); 
			});
		});
	</script>

 <!-------------------- validar numeros --------------------------------------->
	<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros y punto
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>


<!-------------------- validar letras --------------------------------------->
<script>

function validaletras(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta letras tanto mayusculas como minusculas 
    patron = /[A-Za-z]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>

<!--------------------------Menu ----------------------------------->

<script type="text/javascript">
    function get_html(t,url,tit,id) {
        var a_todos =document.querySelectorAll('#sidebarnav .a_menu')
        for (var i = 0; i < a_todos.length; i++) {
        a_todos[i].className="a_menu";
        }
        t.className+=' active';
       $.get(url, function( r ) {
          
          $("#cont_principal").html(r); 
                  }); 
    }

 </script>