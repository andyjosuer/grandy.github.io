






<!DOCTYPE html>
<html>
  <head>
    <title>Restablecimiento de Contraseña</title>
    <!-- Bootstrap -->
    
    
 
    <!-- Font Awesome -->
    <link href="./assets2/nuevos/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./assets2/nuevos/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="./assets2/nuevos/animate.min.css" rel="stylesheet">





<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body background="5.jpeg" id="login">
    <div class="container">
    	
    	<br>
    	<br>
			<strong style="font-size: 17pt; color: #FFFFFF;" ><center>Bienvenido a la pantalla de restablecimiento  <?php echo $rows['nombre_usuario'] ?> aqui se restablecera su contraseña.</center></strong>
       <br>
       <br>
       <br>
        <form class="form-signin" method="post">
        <h3 class="form-signin-heading">Restablecer Contraseña</h3><hr />
        
        <?php
       	if(isset($msg))
			{
				echo $msg;
			}
			else
			{
				?>
              	<div class='alert alert-info'>
			Ingrese una nueva Contraseña para su usuario.
				</div>  
                <?php
			}
		?>
       
           <div>
                <input style="     border: 2px solid #ccc;   font-size: 19px;     padding: 7px 23px;" title="No se Aceptan Espacios en Blanco" id="pwd" name="pass" type="password" class="form-control"  minlength="5" maxlength="8" pattern="[A-Za-z0-9]+" required  placeholder=" Nueva Contraseña"/> 
                <span class="input-group-btn">                                  
                   <button style=" padding: 6px 12px;  margin-bottom: 14px;" type="button"  class="btn btn-default btn-md" id="showhide" data-val='1'><span readonly id='eye' class="icon fa fa-eye"></span></button>
               </span> 
              </div>
       
        <div>
                <input style="    font-size: 19px;     padding: 7px 23px;    border: 2px solid #ccc;" title="No se Aceptan Espacios en Blanco" id="confirm-pass" name="confirm-pass" type="password" class="form-control"  minlength="5" maxlength="8" pattern="[A-Za-z0-9]+" required  placeholder="Confirmar Contraseña"/> 
                <span class="input-group-btn">                                  
                   <button style=" padding: 6px 12px;  margin-bottom: 14px;" type="button"  class="btn btn-default btn-md" id="showhide1" data-val='1'><span readonly id='eye1' class="icon fa fa-eye"></span></button>
               </span> 
              </div>
       

     	<hr />
       <center>
        <button style="    padding: 9px 19px; font-size: 20.5px;" class="btn btn-large btn-primary" type="submit" name="btn-reset-pass">Restablecer</button>
        </center>
        
        
        
      </form>

    </div> <!-- /container -->
    
    
    <script src="assets/login/login.js"></script>
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>