<head>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<?php
	
require ("../conexion/connect_db.php");

 	$Cnombre = $_POST['nombrecate'];
 	$Descrip = $_POST['Descrip'];
 	$Genero=$_POST['Genero_atleta'];
 	
 	
	 	

 	if (mysqli_query($mysqli,"INSERT INTO tbl_categorias(NOM_CATEGORIA,ID_GENERO, OBS) 
 		VALUES ('$Cnombre','$Genero','$Descrip')")){

 		//echo '<script>alert("Categoria Agragada")</script> ';
 		
 		 echo "<script>jQuery(function(){swal('¡Categoria Agregada !', 'Correctamente', 'success');});</script>";

		header("refresh:3; ../plantilla.php");
 		
 	}else{
 		
 		//echo '<script>alert("Error al insertar")</script> ';
 		 echo "<script>jQuery(function(){swal('¡¡Error!', 'Error al insertar', 'warning');});</script>";
 		 header("refresh:3; ../plantilla.php");
 	}

 	
?>