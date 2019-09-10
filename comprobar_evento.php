<?php	
if (isset($_POST["preinscrip"])) {

	require ("conexion/connect_db.php");

 	$query="SELECT * FROM tbl_eventos WHERE ID_ESTADO = 1";
	$resultado=$mysqli->query($query);

	if ($resultado->num_rows > 0){
		header("refresh:0; plantilla.php");
	} else {
		echo "<script> alert('¡Actualmente no hay eventos disponible!'); </script>";
		header("refresh:0; index.php");
	}
}
?>