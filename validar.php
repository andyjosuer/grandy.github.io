
<?php
//include("connect_db.php");

//$miconexion = new connect_db;

	$username=$_POST['usuario'];
	$pass=$_POST['pass'];

	require("connect_db.php");





	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$sql2=mysqli_query($mysqli,"SELECT * FROM login WHERE user='$username'");
	if($f2=mysqli_fetch_assoc($sql2)){
		if($pass==$f2['pasadmin']){
			$_SESSION['id']=$f2['id'];
			$_SESSION['user']=$f2['user'];
			$_SESSION['rol']=$f2['rol'];

			
			echo "<script>location.href='PPrincipal.php'</script>";
		
		}
	}


	$sql=mysqli_query($mysqli,"SELECT * FROM login WHERE user='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['password']){
			$_SESSION['id']=$f['id'];
			$_SESSION['user']=$f['user'];
			$_SESSION['rol']=$f['rol'];

			header("Location: usuario.php");
		}else{
			
		
			echo "<script>location.href='login.php'</script>";
		}
	}else{
		
	

	}

?>