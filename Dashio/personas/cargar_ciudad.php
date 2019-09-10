<?php
require ("../conexion/connect_db.php");

$id_depto = $_POST['id_depto'];
	
	$queryM = "SELECT COD_CIUDAD, NOM_CIUDAD FROM tbl_ciudad WHERE ID_DEPTO = '$id_depto' ORDER BY NOM_CIUDAD";

	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar ciudad</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['COD_CIUDAD']."'>".$rowM['NOM_CIUDAD']."</option>";
	}
	
	echo $html;
?>