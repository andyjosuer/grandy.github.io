<?php 
//Identidad
$max = ($_POST['edadmaxima']);
$min = ($_POST['edadminima']);

if ($max < $min) {
	echo "<label style='color:red;'>La edad máxima tiene que ser menor que la mínima!</label>";
	return false;
}




?>