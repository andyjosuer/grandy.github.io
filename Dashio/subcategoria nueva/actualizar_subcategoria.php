<head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
   
<?php 

       include ('../conexion/connect_db.php');
       $nombre = $_POST['nombresubcategoria'];
       $Peso = $_POST['peso'];
       $Altura =$_POST['altura'];
       $Edadmax =$_POST['edadmaxima'];
       $Edadmin =$_POST['edadminima'];
       $Descripcion = $_POST['Descripcion'];
       $Id=$_POST['id'];

           $sql = "UPDATE tbl_subcategorias SET NOM_SUBCATEGORIA = '".$nombre."', EDAD_MIN = '".$Edadmin."', EDAD_MAX = '".$Edadmax."', ALTURA = '".$Altura."', PESO = '".$Peso."', OBS = '".$Descripcion."'
           WHERE  ID_SUBCATEGORIA= '".$Id."'";  
           $resultado=mysqli_query($mysqli, $sql);
        if($resultado)
            {  
         echo "<script>jQuery(function(){swal('¡Actualizado !', 'Correctamente', 'success');});</script>";
        header("refresh:3; ../Plantilla.html");
        } else {  
        echo "<script>jQuery(function(){swal('¡¡Error!', 'Al actualizar', 'warning');});</script>";
        header(" ../Plantilla.html");
    } 

?>
