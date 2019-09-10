
<?php
//include("connect_db.php");

//$miconexion = new connect_db;

	$username=$_POST['usuario'];
	$pass=$_POST['pass'];

	require("connect_db.php");







	$sql=mysqli_query($mysqli,"SELECT * FROM tbl_usuario WHERE nombre_usuario COLLATE utf8_bin ='$username'");
	if($f=mysqli_fetch_assoc($sql)){
	
	// encriptacion del campo de password para comparar con la base de datos
	   $pass1  = hash('sha256', $pass); 

		if($pass==$f['pass'] or $pass1==$f['pass'] ){
			$_SESSION['id']=$f['id'];
			$_SESSION['user']=$f['user'];
		date_default_timezone_set('America/Guatemala');
		$date=date("Y-m-d H:i:s");
		echo "$date";
		$uph=mysqli_query($mysqli,"UPDATE tbl_usuario SET ultimo_ingreso = '$date' WHERE nombre_usuario = '$username' ");
			header("Location: ../Dashio/plantilla.html");
		}else{
			
			echo '<script>alert("EL USUARIO O CONTRASEÑA NO ES CORRECTO")</script> ';
			echo "<script>location.href='index.html'</script>";
		}
	}else{
		
		echo '<script>alert("ESTE USUARIO NO ESTA REGISTRADO EN EL SISTEMA.")</script> ';
		
		echo "<script>location.href='index.html'</script>";	

	}

	global $nameuser;
	$nameuser = $username;

?>