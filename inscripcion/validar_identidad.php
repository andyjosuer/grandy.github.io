<?php 
include("../conexion/connect_db.php");
//Identidad
$id = $mysqli -> real_escape_string(htmlentities($_POST['identidad']));
$i= $mysqli->query("SELECT IDENTIDAD FROM tbl_personas WHERE IDENTIDAD= '$id'");
$roww = mysqli_num_rows($i);
 if ($roww == 1){
    //echo "<label style='color:red;'></label>";
    echo "<em style='color:red' class='error help-block'>¡El Número de Identidad ya existe!</em>";
 }
$i->close();

?> 