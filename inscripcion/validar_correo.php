<?php 
include("../conexion/connect_db.php");
//Correo
 $correo = $mysqli -> real_escape_string(htmlentities($_POST['correo']));
 $s= $mysqli->query("SELECT CORREO FROM tbl_personas WHERE CORREO= '$correo'");
 $roww = mysqli_num_rows($s);
 if ($roww == 1){
    //echo "<label style='color:red;'>¡El correo  ya existe!</label>";
    echo "<em style='color:red' class='error help-block'>¡El correo  ya existe!</em>";
 }
$s->close();


?> 