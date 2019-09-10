<?php 

 $Fecha_I = ($_POST['inicial']);
 $Fecha_F = ($_POST['finall']);

if ($Fecha_F <= $Fecha_I) {
	echo "<label style='color:red;'>La fecha final es incorrecta.!</label>";
	return false;
}





?>