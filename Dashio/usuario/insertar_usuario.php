<?php session_start(); ?>
<head>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<?php
	
require ("../conexion/connect_db.php"); //Conexion
//include('../consultas/consultas.class.php');
require ("../class.user.php"); //Llamar a la clase de usuario
$user = new USER();
	
	$correo = $_POST['email'];
 	/*$telpersona = $_POST['telpersonal'];
	$tipopersona = $_POST['tipopersona'];
	$EstadoCivil = $_POST['estadocivil'];*/
	$idu = $_POST['id'];
 	$Usuario = $_POST['user'];
 	$TipoUsuario = $_POST['tipousuario'];
 	$Useradmin = $_SESSION['nombre_usuario'];
	//echo "$TipoUsuario";exit;
 	

 	//Guarda la funcion en una variable para insertarlo a la tabla Usuario
	$contra = randpass(); 
//echo "$correo";
	/*echo "$TipoUsuario";
	echo " ID "."$idu";
	echo "$contra";
	echo "$correo";
	echo "$Usuario";*/

 	//Insertar Usuario

 	if (mysqli_query($mysqli,"INSERT INTO tbl_usuario(id_persona, nombre_usuario, pass, email, ID_TIP_USUARIO, usr_ing) 
 		VALUES ('$idu', '$Usuario','$contra','$correo','$TipoUsuario','$Useradmin')")){

 		//Seleccion de usuario y correo para el envío de usuario y contraseña
 					$stmt = $user->runQuery("SELECT id_usuario,email FROM tbl_usuario WHERE nombre_usuario=:user LIMIT 1");
	 				$stmt->execute(array( ":user"=>$Usuario));
					$row = $stmt->fetch(PDO::FETCH_ASSOC);

					if($stmt->rowCount() == 1){
	 						 					
	 					$iduser = $row['id_usuario'];
						$id = base64_encode($row['id_usuario']);//Codificar el ID
		 				$code = md5(uniqid(rand()));
						//Modificar el Token del Usuario
						//$token = $code;
						$upid=mysqli_query($mysqli,"UPDATE tbl_usuario SET token='$code' WHERE id_usuario=$iduser");
						//$stmt->execute(array(":token"=>$code,"email"=>$coorreo));			
						$message= "
								   Recientemente se creo un usuario con el nombre de: <b> $Usuario</b>, al sistema FENAFH (SISTEMA DE INSCRIPCIONES) perteneciente a la FEDERACION DE FISICOCULTURISMO Y FITNESS DE HONDURAS. 
								   <br /><br />
								   <a href='http://localhost/fenafh/login/resetpass.php?id_usuario=$id&code=$code'>click aqui para continuar.</a>
				   				   <br /><br />
								   ¿No reconoces esta actividad?
								   <br /><br />
								   Si no solicitaste esta recuperacion, puedes hacer caso omiso de este mensaje de correo electronico, ya que otra persona pudo haber escrito tu usuario por error. 
				                    <br /><br />
				                   Gracias, <br>
				                   Equipo de Soporte FENAFH <br>
				                   Villa Olimpica<br>
				                   Tegucigalpa(MDC), Honduras. <br>		 
								   ";
						$subject = "Solicitud de Recuperacion";
						
						$user->send_mail($correo,$message,$subject);
						
 		//echo '<script>alert("Persona y Usuario Registrado")</script> ';
 		
           echo "<script>jQuery(function(){swal('¡usuario registrado !', 'Correctamente', 'success');});</script>";
           
		header("refresh:1;../plantilla.php");
		
 		
	}
}else{
	 echo "<script>jQuery(function(){swal('¡Error !', 'Al Ingresar', 'error');});</script>";
	 header("refresh:1;../plantilla.php");
}


	//Funcion para generar Contraseña
	function randpass(){
	      $length = 8;
	      $charset = "abcdefghijklmnopqrstuvwxyz0123456789%&$/()#!?";
	      $password = "";
	      for ($i=0; $i<$length; $i++) { 
	        $random = rand() % strlen($charset);
	        $password .= substr($charset,$random,1);
	      }
	      return $password;
	    }