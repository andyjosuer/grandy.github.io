<head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
   
<?php 

       include ('../conexion/connect_db.php');
       $id = $_POST['id'];
       $Cnombre = $_POST['nombrecate'];
 	   $Genero=$_POST['Genero_atleta'];
       $Descrip = $_POST['Descrip'];

           $sql = "UPDATE tbl_categoriaS SET NOM_CATEGORIA = '".$Cnombre."', ID_GENERO = '".$Genero."', OBS = '".$Descrip."'
           WHERE  ID_CATEGORIA= '".$id."'";  
           $resultado=mysqli_query($mysqli, $sql);
        if($resultado)
            {  
         echo "<script>jQuery(function(){swal('¡Actualizado !', 'Correctamente', 'success');});</script>";
        header("refresh:3; ../plantilla.php");
        } else {  
        echo "<script>jQuery(function(){swal('¡¡Error!', 'Al actualizar', 'warning');});</script>";
        header(" ../plantilla.php");
    } 

?>
