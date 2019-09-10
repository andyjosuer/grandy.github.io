<?php 
require ("../conexion/connect_db.php");
//Identidad
$sql= $mysqli->query("SELECT * FROM tbl_eventos WHERE ID_ESTADO = 1");

if(mysqli_num_rows($sql) == 0){
  }else{
  $row = mysqli_fetch_assoc($sql);
}

 if ($row['CAT_PERMITIDA'] == 2){
    //echo "<label style='color:red;'></label>";
    echo "2";
 }
else {
	echo "1";
}
$sql->close();

?> 