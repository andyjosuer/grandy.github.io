<head>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<?php
	
require("../conexion/connect_db.php");

   $Edadmax = (isset($_POST['edadmaxima']) ? $_POST['edadmaxima'] : 0);
   $Edadmin = (isset($_POST['edadminima']) ? $_POST['edadminima'] : 0);

   $Pesomin = (isset($_POST['pesominimo']) ? $_POST['pesominimo'] : 0);
   $Pesomax = (isset($_POST['pesomaximo']) ? $_POST['pesomaximo'] : 0);

   $Alturamin = (isset($_POST['alturaminima']) ? $_POST['alturaminima'] : 0);
   $Alturamax = (isset($_POST['alturamaxima']) ? $_POST['alturamaxima'] : 0);

   
 	$nombre = $_POST['nombresubcategoria'];
 	$Descripcion = $_POST['Descrip'];
    $Id_cate= $_POST['Nombre_categoria'];
 	
 		
    if (mysqli_query($mysqli,"INSERT INTO tbl_subcategorias(NOM_SUBCATEGORIA,ID_CATEGORIA,EDAD_MIN,EDAD_MAX,ALTURA_MIN,ALTURA_MAX,PESO_MIN,PESO_MAX,OBS,ID_ESTADO) 
 		VALUES ('$nombre','$Id_cate','$Edadmin','$Edadmax','$Alturamin','$Alturamax','$Pesomin','$Pesomax','$Descripcion',3)")) {


	echo "<script>jQuery(function(){swal('¡Sub-Categoria Agregada !', 'Correctamente', 'success');});</script>";
    //echo '<script>alert("Categoria Agregada")</script> ';
 		

		header("refresh:3; ../Plantilla.html");
} else {

	echo "<script>jQuery(function(){swal('¡¡Error al insertarr!', 'SubCategorias', 'warning');});</script>";
    //echo '<script>alert("Error al insertar")</script> ';
}

 	
?>