<head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>



<?php

require("../conexion/connect_db.php");
$id_evento = $_POST['Nombre_evento'];

if(isset($_POST['IDS_SUBCATEGORIA'])){

  if(is_array($_POST['IDS_SUBCATEGORIA'])){

       while(list($key,$value)=each($_POST['IDS_SUBCATEGORIA'])){  
   
    
          $sql=mysqli_query($mysqli,"INSERT INTO tbl_categoria_evento (ID_EVENTO, ID_SUBCATEGORIA) VALUES( '.$id_evento.','.$value.')");
          $sql1 =mysqli_query($mysqli, "UPDATE tbl_subcategorias SET ID_ESTADO = 1 WHERE ID_SUBCATEGORIA= '$value' ");
          echo "<script>jQuery(function(){swal('¡Evento, Categorias y Subcategorias !', 'Insertado Correctamente(Subcategorias Activadas)', 'success');});</script>";
          header("refresh:2; ../plantilla.php");
    }
  } 
} 

 if(isset($_POST['IDS_SUBCATEGORIA'])==""){
   echo "<script>jQuery(function(){swal('¡¡Error!', 'Seleccione alguna subcategoria', 'warning');});</script>";
   header("refresh:2; ../plantilla.php");
   
 }
 
  

/*if($_POST['IDS_SUBCATEGORIA'] !=" "){
     echo "<script>jQuery(function(){swal('¡¡Error!', 'Seleccione alguna subcategoria', 'warning');});</script>";

       header(" ../Plantilla.html");

  if($_POST['IDS_SUBCATEGORIA'] ){


   if(is_array($_POST['IDS_SUBCATEGORIA'])){

       while(list($key,$value)=each($_POST['IDS_SUBCATEGORIA'])) {  
   
      
     
          $sql=mysqli_query($mysqli,"INSERT INTO tbl_categoria_evento (ID_EVENTO, ID_SUBCATEGORIA) VALUES( '.$id_evento.','.$value.')");

          $sql1 =mysqli_query($mysqli, "UPDATE tbl_subcategorias SET ID_ESTADO = 1 WHERE ID_SUBCATEGORIA= '$value' ");

          echo "<script>jQuery(function(){swal('¡Evento, Categorias y Subcategorias !', 'Insertado Correctamente(Subcategorias Activadas)', 'success');});</script>";

          header("refresh:2; ../Plantilla.html");


    }
    }
  }
}*/



?>

