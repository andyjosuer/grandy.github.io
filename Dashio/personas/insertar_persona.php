<?php session_start(); ?>
<head>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<?php
	
require ("../conexion/connect_db.php"); //Conexion

	
	//Obtener los datos por el método POST
 	$Nacionalidad = $_POST['nac'];
 	$Identificacion = $_POST['ident'];
 	$Pnombre = $_POST['firstname'];
 	$Snombre = $_POST['secondname'];
 	$Papellido = $_POST['firstlastname'];
 	$Sapellido = $_POST['secondlastname'];
 	$Fecha = $_POST['fchnacimiento'];
 	$Genero = $_POST['genero'];
 	$Direccion = $_POST['direccion'];
 	//$Depto = $_POST['depto'];
 	$ciudad = $_POST['Ciudad_persona'];
 	$correo = $_POST['email'];
 	$telpersona = $_POST['telpersonal'];
	$tipopersona = $_POST['tipopersona'];
	$EstadoCivil = $_POST['estadocivil'];

	//echo "$Useradmin";exit;
 	//INSERTAR PERSONA
 	if (mysqli_query($mysqli,"INSERT INTO tbl_personas(IDENTIDAD, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, FEC_NAC, TEL_PERSONAL, ID_GENERO, DIRECCION, ID_CIUDAD, CORREO, ID_EST_CIVIL, ID_TIP_PERSONA,ID_ESTADO) 
 		VALUES ('$Identificacion', '$Pnombre','$Snombre','$Papellido','$Sapellido','$Fecha','$telpersona','$Genero','$Direccion','$ciudad','$correo','$EstadoCivil','$tipopersona',1)")){
		
 		echo "<script>jQuery(function(){swal('¡Persona registrado !', 'Correctamente', 'success');});</script>";
		header("refresh:1;../plantilla.php");
 		//header("Location: crear_usuario.html");
 	}else{
 		echo "<script>jQuery(function(){swal('¡Error!', 'Al Insertar', 'error');});</script>";
 		header("refresh:1;../plantilla.php");
 		//echo '<script>alert("Error al insertar")</script> ';
 	}
 	

 	//mysqli_close($conn);

	global $nameuser;
	$nameuser = $Pnombre;
