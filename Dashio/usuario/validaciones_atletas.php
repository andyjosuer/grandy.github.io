<?php

if (isset($_POST["Guardar"])) { 
	require("connect_db.php");

	$Prim_nom = $_POST["PNom_atleta"];
	$Seg_nom = $_POST["SNom_atleta"];
	$correo = $_POST["correo_atleta"];
	$Prim_ape = $_POST["PApellido_atleta"];
	$Seg_ape = $_POST["SApellido_atleta"];
	$Depto =$_POST["Depto_atleta"];
	$Ciudad = $_POST["Ciudad_atleta"];
	$Genero = $_POST["Genero_atleta"]; 
	$Civil = $_POST["Ecivil_atleta"];
	$id = $_POST["Identidad_atleta"];
	$gim = $_POST["Gimnasio_atleta"];
	$cel = $_POST["celular_atleta"];
	$tel = $_POST["tel_fijo"];
	$direccion = $_POST["direc_atleta"];
	$fecha = $_POST["fecha_atleta"];


	
	


	if (!filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {
    //Si no hay error en la validacion y se registrará
	    if (mysqli_query($mysqli, "INSERT INTO tbl_personas(ID_IDENT, PRIMER_NOMBRE, SEGUNDO_NOMBRE,PRIMER_APELLIDO, SEGUNDO_APELLIDO, FEC_NAC, ID_GENERO, DIRECCION, ID_CIUDAD, CORREO, ID_TELEFONO, ID_EST_CIVIL) VALUES (1,'$Prim_nom','$Seg_nom','$Prim_ape','$Seg_ape','$fecha',1,'$direccion',1,'$correo',1,1)")) {


		echo '<script>alert("Inscripcion exitosa")</script>';
		header("principal.html");
		}

		else {

			echo "fallo la inscripcion";
		}

	} else {
	//Si Hay Validacion en el error, mostrará el mensaje y no se registrará 
	  
		echo "<script>";
		echo "if(confirm('El formato del correo es invalido'));";  
		echo "window.location = 'http://localhost/fenafh/inscripciones.html';";
		echo "</script>"; 

	}


	 }


?>