<?php 
require ("../connect_db.php");
	//$nombre = $_GET['Nombre_categoria_']; falta el campo id cat
	$nombresub=$GET['nombresubcategoria_'];
 	$Peso = $_GET['peso_'];
 	$Altura =$_GET['altura_'];
 	$Edadmax =$_GET['desde_rango_'];
 	$Edadmin =$_GET['hasta_rango_'];
 	$Descripcion = $_GET['Descripcion_'];

 $sts="INSERT INTO tbl_subcategorias(NOM_SUBCATEGORIA,PESO,ALTURA,EDAD_MAX,EDAD_MIN,OBS) 
 		VALUES ('$nombresub','$Peso','$Altura','$Edadmax','$Edadmin','$Descripcion')";

//echo $str;
 		$r = $mysqli->query($str); // AQUI EHECTYA EL QUERY SI r variable x
// VER SI TODO FUE CORRECTO
if($r){
	echo 1;
 }else{
 	echo 0;
 }

 ?>