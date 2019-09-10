<?php
require ("../conexion/connect_db.php");

$id_cat = $_POST['id_cat'];
	
	$queryS = "SELECT * FROM tbl_subcategorias WHERE ID_CATEGORIA ='$id_cat'";

	$resultadoS = $mysqli->query($queryS);
	
	$html= "<option value='0'>Seleccione una opción</option>";
	
	while($rowS = $resultadoS->fetch_assoc())
	{
		$html.= "<option value='".$rowS['ID_SUBCATEGORIA']."'>".$rowS['NOM_SUBCATEGORIA']."</option>";
	}
	
	echo $html;
?>
