

 <head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
   
<?php 
error_reporting(0);
 include ("../conexion/connect_db.php");


  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $Fecha_I = date("Y-m-d", strtotime($_POST['inicial']));
  $Fecha_F = date("Y-m-d", strtotime($_POST['finall']));
  $Lugar = $_POST['lugar'];
  $Descripcion = $_POST['descrip'];
   $categoriap = $_POST['categoria'];
  $estado=$_POST['estado'];

//$estado="SELECT DESCRIPCION FROM tbl_estado where ID_ESTADO="

$sql = "UPDATE tbl_eventos SET NOM_EVENTO = '".$nombre."', FEC_INICIAL = '".$Fecha_I."', FEC_FINAL = '".$Fecha_F."', LUGAR_EVENTO = '".$Lugar."', DESCRIPCION = '".$Descripcion."', ID_ESTADO = '".  $estado."', CAT_PERMITIDA = '".  $categoriap."'
 WHERE  ID_EVENTO = '".$id."'";

$resultado=mysqli_query($mysqli, $sql);

if($resultado)
{  
    echo "<script>jQuery(function(){swal('¡Actualizado !', 'Correctamente', 'success');});</script>";

        header("refresh:2; ../plantilla.php");
} else {  
    echo "<script>jQuery(function(){swal('¡¡Error!', 'Al actualizar', 'warning');});</script>";

        header(" ../plantilla.php");
    } 

?>
