<head>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<?php

if (isset($_POST["Buscar"])) {

	require("../conexion/connect_db.php");
	
   	$identidad = $_POST['Identidad_atleta'];
   
    $query="SELECT * FROM tbl_personas WHERE IDENTIDAD = '$identidad'";
	$resultado=$mysqli->query($query);

	if ($resultado->num_rows > 0){
		echo "<script>jQuery(function(){swal('¡Pre-Inscripcion!', 'Exitosa', 'success');});</script>";
		header("refresh:2; ../plantilla.php");
	} else {
		echo "<script>jQuery(function(){swal('¡¡Error!', 'Su registro no se encontro', 'warning');});</script>";
 		header("refresh:2; ../plantilla.php");
	}
}
?>