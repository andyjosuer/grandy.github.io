<?php include("../conexion/connect_db.php");
//Identidad
$id = $mysqli -> real_escape_string(htmlentities($_POST['ident']));
$d= $mysqli->query("SELECT 	IDENTIDAD FROM tbl_personas WHERE IDENTIDAD= '$id'");
$roww = mysqli_num_rows($d);
 if ($roww == 1){
    echo "<label style='color:red;'>El Número de Identidad Existe!</label>";
    return false;
 }
$d->close();

?> 