<head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       
</head>

<?php 

include ("../conexion/connect_db.php");
 
$id = intval($_GET['id']);

echo $id;



$sql = "DELETE FROM tbl_eventos  WHERE  ID_EVENTO = '".$id."'";

$resultado=mysqli_query($mysqli, $sql);



if(!empty($resultado)){ 

	 echo "<script>jQuery(function(){swal('¡Evento Eliminado !', 'Correctamente', 'success');});</script>";

        header("refresh:3; ../Plantilla.html");



} else {
echo "<script>jQuery(function(){swal('¡¡Error!', 'Al Eliminar', 'warning');});</script>";

    header("refresh:3; ../Plantilla.html");

}	
	


?>