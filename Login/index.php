<?php 
	$alert = '';
session_start();
if(isset($_SESSION['active']))
{
	header("Location: ../Dashio/plantilla.php");

}else{
	if (!empty($_POST)) 
	{
		if(empty($_POST['usuario']) || empty($_POST['pass']))
		{
			$alert = 'Ingrese los datos';
		}else{
			require_once ("connect_db.php");
			
			$username = mysqli_real_escape_string($mysqli, $_POST['usuario']);
			$pass     = mysqli_real_escape_string($mysqli, $_POST['pass']);

			$sql=mysqli_query($mysqli,"SELECT * FROM tbl_usuario WHERE nombre_usuario COLLATE utf8_bin ='$username'");
			$result = mysqli_num_rows($sql);

			if ($result > 0) 
			{
				$data = mysqli_fetch_array($sql);
				$pass1  = hash('sha256', $pass);
				
				if($pass==$data['pass'] or $pass1==$data['pass']){
					//echo $pass1;exit;

					$_SESSION['active'] 		= true;
					$_SESSION['id']				= $data['id_usuario'];
					$_SESSION['nombre_usuario']	= $data['nombre_usuario'];
					$_SESSION['email']			= $data['email'];
					$_SESSION['ID_TIP_USUARIO']	= $data['ID_TIP_USUARIO'];

					date_default_timezone_set('America/Guatemala');
					$date=date("Y-m-d H:i:s");
					$uph=mysqli_query($mysqli,"UPDATE tbl_usuario SET ultimo_ingreso = '$date' WHERE nombre_usuario = '$username' ");

					header("Location: ../Dashio/plantilla.php");
				}else{
					ECHO $alert ='EL USUARIO O CONTRASEÑA NO ES CORRECTO';
					session_destroy();
				}
			}else{
					ECHO $alert ='ESTE USUARIO NO ESTA REGISTRADO EN EL SISTEMA.';
					session_destroy();
				}

			}
	}
}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>INICIO DE SESION</title>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="shortcut icon" type="image/x-icon" href="images/fenafh.ico">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--==============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<header>


</header>
<body>
	
	<div class="limiter">
		
		<div class="container-login100" style="background-image: url('images/f3.jpg');">
		
			
			
			<div style="" class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form method="post"   action="" class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						<a style=" font-size: 40px; cursor:pointer;" href="../index.html"> <li class="fa fa-home"></li> </a>  INICIO DE SESION

					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Inserte Usuario">
						<span style="" class="label-input100">Nombre de Usuario:</span>
						<input id="usuario" style="    background: rgba(249, 248, 250, 0.63);" class="input100" type="text" name="usuario" placeholder="Ingrese Su Usuario." onpaste="return false" autocomplete="off" >
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input"  data-validate="Contraseña Requerida">
						<span class="label-input100">Contraseña:</span>
						<input id="pass" style="background: rgba(249, 248, 250, 0.63); color:black;" class="input100" minlength="8" maxlength="16" type="password" name="pass" placeholder="Ingrese Su Contraseña." >
						<span style="color:blue;" class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a style="color:black;" href="fpass.php">
							¿Olvidaste la Contraseña?
						</a>
					</div>
					<div class="alert">
			 			<?php //echo isset($alert) ? $alert : '';  ?>
					</div>



					<div class="container-login100-form-btn">
						<div style="" class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Ingresar
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span style=" font-size: 20px;">
						Redes Sociales
						</span>
					</div>
</strong>
					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-youtube"></i>
						</a>
					</div>

					
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>