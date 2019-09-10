<?php
require ("../conexion/connect_db.php");

$id_gen = $_POST['id_gen'];
	
	$queryC = "SELECT * FROM tbl_categorias WHERE ID_GENERO = '$id_gen' and ID_ESTADO = 1";

	$resultadoC = $mysqli->query($queryC);
	
	$html= "<option value='0'>Seleccione una opción</option>";
	
	while($rowC = $resultadoC->fetch_assoc())
	{
		$html.= "<option value='".$rowC['ID_CATEGORIA']."'>".$rowC['NOM_CATEGORIA']."</option>";
	}
	
	echo $html;
?>
