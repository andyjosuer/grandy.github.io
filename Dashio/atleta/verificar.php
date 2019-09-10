<?php 


include "../conexion/connect_db.php";

	$id	= $_POST['id'];
	$subcate = $_POST['subcate'];

	$query = "SELECT * FROM tbl_subcategorias";
	
	if(mysqli_num_rows($query) == 0){
        
    	}else{
      	$row = mysqli_fetch_assoc($query); 
    }	

    $query2 = "SELECT * FROM tbl_subcategorias WHERE ID_SUBCATEGORIA = '$subcate'";
    if(mysqli_num_rows($query) == 0){
        
    	}else{
      	$row2 = mysqli_fetch_assoc($query2); 
    }

    if () {
    	# code...
    }

?>