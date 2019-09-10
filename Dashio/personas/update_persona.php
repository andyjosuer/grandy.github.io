
<head>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<?php
	
require ("../conexion/connect_db.php"); //Conexion

	
	//Obtener los datos por el método POST
	$id = $_POST['id'];
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
 	//$Usuario = $_POST['user'];


 	
	echo "$ciudad";

	//INSERTAR PERSONA
	if(mysqli_query($mysqli,"UPDATE tbl_personas SET IDENTIDAD='$Identificacion',PRIMER_NOMBRE='$Pnombre',SEGUNDO_NOMBRE='$Snombre',PRIMER_APELLIDO='$Papellido',SEGUNDO_APELLIDO='$Sapellido',FEC_NAC='$Fecha',TEL_PERSONAL='$telpersona',ID_GENERO='$Genero', CORREO='$correo',DIRECCION='$Direccion',ID_CIUDAD='$ciudad',ID_EST_CIVIL='$EstadoCivil',ID_TIP_PERSONA='$tipopersona' WHERE ID_PERSONA='$id'")){
		
		echo "<script>jQuery(function(){swal('¡Registo de Persona Modificada !', 'Correctamente', 'success');});</script>";
           
		header("refresh:1;../plantilla.php");
		}else{
 		
 		echo '<script>alert("Error al insertar")</script> ';
 	}
 	
	/*$insb =mysqli_query($mysqli,"INSERT INTO tbl_bitacora(ID_USUARIO, FECHA_INGRESO, HORA_INGRESO, ACTIVIDAD, CAMPO_AFECTADO, TABLA) 
 		VALUES ('$iduser',current_time(),current_time(),'USUARIO REGISTRADO','USUARIO REGISTRADO','USUARIO')");
 	}else{
 		
 		echo '<script>alert("Error al insertar")</script> ';
 	}*/

 	//mysqli_close($conn);

/*	global $nameuser;
	$nameuser = $Pnombre;*/


	//Funcion para generar Contraseña
	/*function randpass(){
	      $length = 8;
	      $charset = "abcdefghijklmnopqrstuvwxyz0123456789%&$/()#!?";
	      $password = "";
	      for ($i=0; $i<$length; $i++) { 
	        $random = rand() % strlen($charset);
	        $password .= substr($charset,$random,1);
	      }
	      return $password;
	    }*/