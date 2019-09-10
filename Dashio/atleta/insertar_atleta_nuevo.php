<?php session_start(); ?>

  <head>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>


<?php
include "../conexion/connect_db.php";

if (isset($_POST["Guardar"])) { 

	$Prim_nom = $_POST['PNom_atleta'];
	$Seg_nom = (isset($_POST['SNom_atleta']) ? $_POST['SNom_atleta'] : " ");
	$Papellido = $_POST['PApellido_atleta'];
	$Sapellido = $_POST ['SApellido_atleta'];
	$atleta_id = $_POST['Identidad_atleta'];
	$Fecha_nac = $_POST['fecha_atleta'];
	$tel_personal = $_POST['tel_atleta'];
	$correo = $_POST['correo_atleta'];
	$Direccion = $_POST['direc_atleta'];
	$Ciudad = $_POST['Ciudad_atleta'];
	$Genero = $_POST['Genero_atleta'];
	$subcategoria = $_POST ['subcategoria'];
	$Civil = $_POST['Ecivil_atleta'];
	$Gimnasio = (isset($_POST['club_gim']) ? $_POST['club_gim'] : "Independiente");
	$tel_em = $_POST['tel_em'];
	$responsable = $_POST['respon_atleta'];
	$peso	= $_POST['peso'];

	$altura	= $_POST['altura'];
	
	//$Nacionalidad = $_POST['nac'];

	if (mysqli_query($mysqli, "INSERT INTO tbl_personas(IDENTIDAD, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, FEC_NAC, TEL_PERSONAL, ID_GENERO, DIRECCION, ID_CIUDAD, CORREO, ID_EST_CIVIL, ID_TIP_PERSONA, ID_ESTADO) VALUES ('$atleta_id','$Prim_nom','$Seg_nom','$Papellido','$Sapellido','$Fecha_nac','$tel_personal','$Genero','$Direccion','$Ciudad','$correo','$Civil',2,1)")) {
		

		echo "<script>jQuery(function(){swal('¡Datos de la persona insertados!', 'Correctamente', 'success');});</script>";

	} //cierre del insert
		//echo $atleta_id;
		//echo "<br>";
	$idp=mysqli_query($mysqli,"SELECT * FROM tbl_personas WHERE IDENTIDAD = '$atleta_id'");
	if($idp->num_rows > 0){
		while ($row = $idp->fetch_assoc()) {
			$Per = $row['ID_PERSONA'];
				//no hagan caso a estos mensajes solo queria probar
				//echo '<script>alert("id persona")</script>';
				//echo $Per;
				//echo "<br>";
		}
	}

	if (mysqli_query($mysqli, "INSERT INTO tbl_atletas(ID_PERSONA, TEL_EMERGENCIA,NOM_RESPON) VALUES ('$Per','$tel_em','$responsable')")) {
		

		echo "<script>jQuery(function(){swal('¡Datos del atleta registrados!', 'Correctamente', 'success');});</script>";
	}
			
	$ida=mysqli_query($mysqli,"SELECT * FROM tbl_atletas WHERE ID_PERSONA = '$Per'");
 	
	if($ida->num_rows > 0){
		while ($row = $ida->fetch_assoc()) {
			$atleta = $row['IDENT_ATLETA'];
			//no hagan caso a estos mensajes solo queria probar
			//echo '<script>alert("id atleta")</script>';
		}
	}	

	$ideven=mysqli_query($mysqli,"SELECT ID_EVENTO FROM tbl_eventos WHERE ID_ESTADO = 1");
 	
	if($ideven->num_rows > 0){
		while ($row = $ideven->fetch_assoc()) {
			$evento = $row['ID_EVENTO'];
				//no hagan caso a estos mensajes solo queria probar
				//echo '<script>alert("evemto")</script>';
				//echo $evento;
				//echo "<br>";
		}
	}

	if (mysqli_query($mysqli,"INSERT INTO tbl_inscripcion( ID_ATLETA, ID_EVENTO, ALTURA, PESO, NOM_GYM) VALUES 
		('$atleta','$evento','$altura','$peso','$Gimnasio')")) {

		echo "<script>jQuery(function(){swal('¡Atleta Inscripto Correcatmente!', 'Correctamente', 'success');});</script>";
		

	}

	$idins=mysqli_query($mysqli,"SELECT ID_INSCRIPCION FROM tbl_inscripcion WHERE ID_ATLETA = '$atleta'");
 	
	if($idins->num_rows > 0){
		while ($row = $idins->fetch_assoc()) {
			$inscrip = $row['ID_INSCRIPCION'];
			//no hagan caso a estos mensajes solo queria probar
			//echo '<script>alert("inscripcion")</script>';
			//echo $inscrip;
			//echo "<br>";
		}
	}

	if (mysqli_query($mysqli,"INSERT INTO tbl_inscripcion_subcategoria(ID_INSCRIPCION,ID_SUBCATEGORIA) VALUES ('$inscrip','$subcategoria')")) {
		

		echo "<script>jQuery(function(){swal('¡Atleta Inscripto!', 'Correctamente', 'success');});</script>";

		header("refresh:2; ../plantilla.php");

		}

	else {

		echo "<script>jQuery(function(){swal('¡¡Error!', 'Error al guardar los datos del atleta', 'warning');});</script>";
 		 header("refresh:2; plantilla.php");
	}

	
	


}
// cierre del isset

	


?>
