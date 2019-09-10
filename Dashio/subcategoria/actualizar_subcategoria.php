<head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
   
<?php 

       include ('../conexion/connect_db.php');
       $nombre = $_POST['nombresubcategoria'];
       
       $Edadmax = (isset($_POST['edadmaxima']) ? $_POST['edadmaxima'] : 0);
       $Edadmin = (isset($_POST['edadminima']) ? $_POST['edadminima'] : 0);

       $Pesomin = (isset($_POST['pesominimo']) ? $_POST['pesominimo'] : 0);
       $Pesomax = (isset($_POST['pesomaximo']) ? $_POST['pesomaximo'] : 0);

       $Alturamin = (isset($_POST['alturaminima']) ? $_POST['alturaminima'] : 0);
       $Alturamax = (isset($_POST['alturamaxima']) ? $_POST['alturamaxima'] : 0);


       $Descripcion = $_POST['Descripcion'];
       $Id=$_POST['id'];

           $sql = "UPDATE tbl_subcategorias SET NOM_SUBCATEGORIA = '".$nombre."', EDAD_MIN = '".$Edadmin."', EDAD_MAX = '".$Edadmax."', ALTURA_MIN = '".$Alturamin."', ALTURA_MAX = '".$Alturamax."', PESO_MIN = '".$Pesomin."', PESO_MAX = '".$Pesomax."', OBS = '".$Descripcion."'
           WHERE  ID_SUBCATEGORIA= '".$Id."'";  
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
