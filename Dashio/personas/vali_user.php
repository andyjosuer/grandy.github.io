<?php include("../conexion/connect_db.php");
//Identidad
$user = $mysqli -> real_escape_string(htmlentities($_POST['user']));
$u= $mysqli->query("SELECT 	nombre_usuario FROM tbl_usuario WHERE nombre_usuario= '$user'");
$roww = mysqli_num_rows($u);
 if ($roww == 1){
    echo "<label style='color:red;'>El Nombre de Usuario Existe!</label>";
    return false;
 }
$u->close();

?>