
<head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<?php


require ("../conexion/connect_db.php");//Conexion?> 

<?php 

	//Obtener los datos por el método POST
 	$id = $_POST['id'];
	$usuario = $_POST['user'];
 		//Selecciona el ID y Correo de la persona en la cual se le creará el usuario
	   // $ident=mysqli_query($mysqli,"SELECT id_usuario FROM tbl_usuario WHERE nombre_usuario='$user'");
	 	
			/*	if($ident->num_rows > 0){
				//echo $idtel->num_rows;
				while ($row = $ident->fetch_assoc()) {
					$ID = $row['ID_PERSONA']; //Obtiene el ID de la persona
					$coorreo = $row['CORREO']; //Obtiene el correo de la persona
					$PerNombre = $row['PRIMER_NOMBRE'];
					$SegNombre = $row['SEGUNDO_NOMBRE'];
				}
			}*/
		//Insertar Usuario
		//$usuarioname = nomuser($PerNombre,$SegNombre);
	 	if (mysqli_query($mysqli,"UPDATE tbl_usuario SET nombre_usuario = '$usuario' WHERE id_usuario = '$id'")){
	 		
	 		echo "<script>jQuery(function(){swal('¡Registo de Usuario Modificado!', 'Correctamente', 'success');});</script>";
           	header("refresh:1;../plantilla.html");
			}else{
 			echo '<script>alert("Error al insertar")</script> ';
 	}
?>