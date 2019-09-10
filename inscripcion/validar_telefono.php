<?php 
include("../conexion/connect_db.php");
//Telefono
$tel = $mysqli -> real_escape_string(htmlentities($_POST['telpersonal']));
$t= $mysqli->query("SELECT TEL_PERSONAL FROM tbl_personas WHERE TEL_PERSONAL= '$tel'");
$roww = mysqli_num_rows($t);
 if ($roww == 1){
    echo "<label style='color:red '>¡El Número de Teléfono Ya Existe!</label>";
 }

$t->close();

?> 