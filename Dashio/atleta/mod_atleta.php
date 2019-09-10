<head>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<?php

include "../conexion/connect_db.php";

	$id	= $_POST['id'];

	$pnombre	= $_POST['PNom_atleta'];

	$snombre	= $_POST['SNom_atleta'];

	$papellido	= $_POST['PApellido_atleta'];

	$sapellido	= $_POST['SApellido_atleta'];

	$genero	= $_POST['Genero_atleta'];

	$identidad	= $_POST['Identidad_atleta'];

	$dep	= $_POST['Depto_atleta'];

	$ciudad	= $_POST['Ciudad_atleta'];

	$civil	= $_POST['Ecivil_atleta'];

	$direccion	= $_POST['direc_atleta'];

	$gym = (isset($_POST['Gimnasio_atleta']) ? $_POST['Gimnasio_atleta'] : "Independiente");

	$peso	= $_POST['peso'];

	$altura	= $_POST['altura'];

	$telefono	= $_POST['tel_atleta'];

    $correo	= $_POST['correo_atleta'];

	$fecha	= $_POST['fecha_atleta'];

	$categoria	= $_POST['categoria'];

	$cat1= $_POST['subcategoria'];
	$cat2 = $_POST['subcategoria2'];
	$respon = $_POST['respon_atleta'];
	$tel_em = $_POST['tel_em'];


//echo($peso);

 $sql = mysqli_query($mysqli, "SELECT * FROM tbl_atletas WHERE ID_PERSONA='$id'");

       if(mysqli_num_rows($sql) == 0){
        
      }else{
        $roW_1 = mysqli_fetch_assoc($sql);
        $atleta1= $roW_1['IDENT_ATLETA'];
      

     
      }

$insert_atleta = mysqli_query($mysqli, "UPDATE tbl_atletas SET TEL_EMERGENCIA ='$tel_em', NOM_RESPON ='$respon' WHERE IDENT_ATLETA='$atleta1'") or die(mysqli_error());
				if($insert_atleta){ //si inserta
					//echo '<script>alert("SI")</script>';
				
				}else{
					
						echo "<script>location.href='../plantilla.php'</script>";	
				}

               			
//INSERTA EN INSCRIPCION				
$insert = mysqli_query($mysqli, "UPDATE tbl_inscripcion SET NOM_GYM ='$gym', ALTURA='$altura',PESO='$peso' WHERE ID_ATLETA='$atleta1'") or die(mysqli_error());
				if($insert){ //si inserta
					//echo '<script>alert("SI")</script>';
				
				}else{
					
						echo "<script>location.href='../plantilla.php'</script>";	
				}


 $id_inscrip=mysqli_query($mysqli,"SELECT * FROM tbl_inscripcion WHERE  ID_ATLETA='$atleta1'");
		if($id_inscrip->num_rows > 0){
			while ($row = $id_inscrip->fetch_assoc()) {
				$inscrip = $row['ID_INSCRIPCION'];
				//no hagan caso a estos mensajes solo queria probar
				//echo '<script>alert("id persona")</script>';
				//echo $Per;
				//echo "<br>";
			}
		}               			
//ATUALIZA EN PERSONAS				
$update = mysqli_query($mysqli, "UPDATE tbl_personas SET PRIMER_NOMBRE='$pnombre',SEGUNDO_NOMBRE='$snombre',PRIMER_APELLIDO='$papellido',SEGUNDO_APELLIDO='$sapellido',FEC_NAC='$fecha',DIRECCION='$direccion',CORREO='$correo',ID_CIUDAD='$ciudad',TEL_PERSONAL='$telefono' WHERE ID_PERSONA='$id'") or die(mysqli_error());
				if($update){ //si actualiza
					
				
				}else{
					echo '<script>alert("NO SE PUDIERON ACTUALIZAR LOS DATOS")</script>';
						echo "<script>location.href='../plantilla.php'</script>";	
				}


$sql = mysqli_query($mysqli, "SELECT * FROM tbl_personas WHERE ID_PERSONA='$id'"); // consulta para traer los demas ID de las otras tablas

			  if(mysqli_num_rows($sql) == 0){
        
      }else{
        $row = mysqli_fetch_assoc($sql);
       
        
   
        $genero1= $row['ID_GENERO'];
        $estado1= $row['ID_ESTADO'];
       // $atleta1= $row2['IDENT_ATLETA']; //error
       
      
     
      }

//ACTUALIZAR CATEGORIAS
      if ($cat2 != "") {
      	//echo '<script>alert("hola si tengo cat 2")</script>';
      	 $update_INS = mysqli_query($mysqli, "UPDATE tbl_inscripcion_subcategoria SET ID_SUBCATEGORIA = '$cat1', ID_SUBCATEGORIA2 = '$cat2' WHERE ID_INSCRIPCION='$inscrip'") or die(mysqli_error());		
      			}
      else {
      	
      	//echo '<script>alert("hola no tengo cat 2")</script>';
      $update_INS = mysqli_query($mysqli, "UPDATE tbl_inscripcion_subcategoria SET ID_SUBCATEGORIA = '$cat1' WHERE ID_INSCRIPCION='$inscrip'") or die(mysqli_error());
      }
				if($update_INS){

					//echo '<script>alert("SI CAT")</script>';
			
				
				}else{
					echo '<script>alert("NO SE PUDIERON ACTUALIZAR LOS DATOS")</script>';
						echo "<script>location.href='../plantilla.php'</script>";	
							
				}



//ACTUALIZA EL GENERO
$update1 = mysqli_query($mysqli, "UPDATE tbl_personas SET ID_GENERO='$genero' WHERE ID_PERSONA='$id'") or die(mysqli_error());
				if($update1){

				}else{
					echo '<script>alert("NO SE PUDIERON ACTUALIZAR LOS DATOS")</script>';
						echo "<script>location.href='../plantilla.php'</script>";	
							
				}


//ACTUALIZA EL ESTADO CIVIL DE UNA PERSONA
$update3 = mysqli_query($mysqli, "UPDATE tbl_personas SET ID_EST_CIVIL ='$civil' WHERE ID_PERSONA='$id'") or die(mysqli_error());
				if($update3){
					echo "<script>jQuery(function(){swal('¡Datos Actualizados!', 'Correctamente', 'success');});</script>";
					echo "<script>location.href='../plantilla.php'</script>";	
						
				
				}else{
					echo '<script>alert("NO SE PUDIERON ACTUALIZAR LOS DATOS")</script>';
						echo "<script>location.href='../plantilla.php'</script>";	
							
				}
?>