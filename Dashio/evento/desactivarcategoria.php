<head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       
</head>

<?php 

include ("../conexion/connect_db.php");
 
$id = intval($_GET['id']);
$idevento = intval($_GET['idevento']);

if(mysqli_query($mysqli, "UPDATE tbl_subcategorias SET ID_ESTADO = 3 WHERE  ID_SUBCATEGORIA = '".$id."'")){

	$sql="DELETE FROM tbl_categoria_evento WHERE ID_SUBCATEGORIA='".$id."'" and "ID_EVENTO='".$idevento."'"; 
    
    mysqli_query($mysqli, $sql);
	
   echo "<script>jQuery(function(){swal('¡Categoría !', 'Desactivada', 'success');});</script>";

        header("refresh:2; ../plantilla.php");

} else {
echo "<script>jQuery(function(){swal('¡¡Error!', 'Al Desactivar..!', 'warning');});</script>";

    header("refresh:2; ../plantilla.php");

} 
  
?>