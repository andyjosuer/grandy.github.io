<?php 
include("../conexion/connect_db.php");
//Correo
 $nombrecate = $mysqli -> real_escape_string(htmlentities($_POST['nombrecate']));
 $s= $mysqli->query("SELECT NOM_CATEGORIA FROM tbl_categorias WHERE NOM_CATEGORIA= '$nombrecate'");
 $roww = mysqli_num_rows($s);
 if ($roww == 1){
    echo "<label style='color:red;'>¡La Categoria ya existe!</label>";
 }
$s->close();


?> 