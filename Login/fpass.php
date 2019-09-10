
<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
	$user->redirect('index1.php');
}

if(isset($_POST['btn-submit']))
    
{
   
	
   	$user1 = $_POST['user'];
    
	
	$stmt = $user->runQuery("SELECT id_usuario,email FROM tbl_usuario  WHERE nombre_usuario=:user LIMIT 1");
	$stmt->execute(array( ":user"=>$user1));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
    
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['id_usuario']);
        $email = $row['email'];
		$code = md5(uniqid(rand()));
		
		$stmt = $user->runQuery("UPDATE tbl_usuario SET token=:token WHERE email=:email");
		$stmt->execute(array(":token"=>$code,"email"=>$email));
		
		$message= "
				   Recientemente hemos recibido una solicitud para recuperar la contraseña del usuario: $user1, de su cuenta del sistema FENAFH (SISTEMA DE INSCRIPCIONES) perteneciente a la FEDERACION DE FISICOCULTURISMO Y FITNESS DE HONDURAS. 
				   <br /><br />
				   Si realizaste esta peticion, haz clic en el siguiente enlace, y sigue las instrucciones para completar el proceso.
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


		$user->send_mail($email,$message,$subject);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					Se le ha enviado un correo electronico.
                   Revice su bandeja de entrada y siga las instrucciones para completar el proceso de recuperacion de su contraseña.
			  	</div>";
        	header("refresh:10;index.html");
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong></strong> El usuario no existe.
			    </div>";
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Recuperacion</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <br>
  <br>
  <br>
  <br>
  
  <body  background-size="100%" background="images/recu.jpg" id="login">
    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading"><center>Recuperar</center></h2><hr />
        
        	<?php
			if(isset($msg))
			{
				echo $msg;
			}
			else
			{
				?>
              	<div class='alert alert-info'>
				Ingrese su usuario para iniciar el proceso de recuperacion de su contraseña.
				</div>  
                <?php
			}
			?>
        
         <input style="     border: 2px solid #ccc;   font-size: 19px;     padding: 7px 23px;" minlength="5" maxlength="15" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Usuario" autocomplete="off" onpaste="return false" oncopy="return false" name="user" required />
     	<br>
     	<br>
       <center>
        <button style=" font-size: 17.5px; padding: 9px 29px;" class="btn btn-primary" type="submit" name="btn-submit">Recuperar</button> &nbsp
                <a style=" font-size: 17.5px; padding: 9px 29px;"  href="login.php" class="btn btn-danger btn-primary"  name="btn-volver">Cancelar</a>

        </center>
      </form>

    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>