
<head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript"> src="noatras.js"</script>
</head>

<?php 
error_reporting(0);
require ("../conexion/connect_db.php");

//DEFINIMOS LAS VARIABLES DE LOS INPUT 

  $nombre = $_POST['nombre'];
  $Fecha_I = date("Y-m-d", strtotime($_POST['inicial']));
  $Fecha_F = date("Y-m-d", strtotime($_POST['finall']));
  $Lugar = $_POST['lugar'];
  $Descripcion = $_POST['descrip'];
  $categoriap = $_POST['categoria'];
  $hoy = date("Y-m-d");

if ($Fecha_I < $hoy) {

    echo "<script>jQuery(function(){swal('¡¡Error!', 'Fecha Inicial Incorrecta', 'warning');});</script>";

    header("refresh:3; ../plantilla.php");

     } 

    elseif  ($Fecha_F<=$Fecha_I) {
   
     //echo '<script>alert("La fecha final ingresada no es valida, porfavor ingrese una fecha mayor que la inicial.")</script> ';
    echo "<script>jQuery(function(){swal('¡¡Error!', 'Fechas Incorrectas', 'warning');});</script>";

    header("refresh:2; ../plantilla.php");
  
    } else {

       if (mysqli_query($mysqli,"INSERT INTO tbl_eventos (NOM_EVENTO, FEC_INICIAL,FEC_FINAL,LUGAR_EVENTO, DESCRIPCION, ID_ESTADO, CAT_PERMITIDA) 
            VALUES( '$nombre','$Fecha_I','$Fecha_F','$Lugar','$Descripcion', 1, '$categoriap')")) {

        echo "<script>jQuery(function(){swal('¡Evento Registrado !', 'Correctamente', 'success');});</script>";

        header("refresh:2; ../plantilla.php");
    } else {

        echo "<script>jQuery(function(){swal('¡¡Evento No Registrado!', 'Error', 'warning');});</script>";

        header(" ../plantilla.php");
}
    //echo '<script>alert("Evento Registrado Correctamente.")</script> ';
     }    
//} else {
   // echo '<script>alert("Error al insertar")</script> ';
?>