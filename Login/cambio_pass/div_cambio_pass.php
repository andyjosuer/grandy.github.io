
<?php 
include "conn.php";
$usu=base64_encode($_GET['usu']) ;
$usu_decod=base64_decode($usu) ;
$tipo=$_GET['tipo'];
if ($tipo=='pv') {
  $msg=$usu_decod.' es necesario cambiar la contraseña debido a que esta ingresando al sistema por primera vez.';

}else{
  $msg=$usu.' es necesario cambiar la contraseña debido a que el administrador reseteo su contraseña.';
}


      



   

?>
 
 
 

<div class="container">
    	    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
  <link href="./assets2/nuevos/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->



<input value="<?= $usu ?>"  id="usuario_c" name="">



    	<br>
    	<br>
			<strong style="font-size: 17pt; color: #FFFFFF;" ><center> <?=$msg?></center></strong>
       <br>
       <br>
       <br>
        <form  background="5.jpeg" class="form-signin" style="left: 50%;z-index: 3;position: absolute;width: 420px;margin-left: -250px;">
          
        </style>
   
        <center>
        <h3 style="    font-size: 33px;" class="form-signin-heading">  Cambio de Contraseña</h3><hr />
        </center>
       
              	<div style="    font-size: 17px;" class='alert alert-info'>
			Ingrese una nueva Contraseña para su usuario.
				</div>  
     
       
           <div>
                <input style="     border: 2px solid #ccc;   font-size: 19px;     padding: 18px 23px;" title="No se Aceptan Espacios en Blanco" id="pwd1" name="pwd1" type="password" class="form-control"  minlength="5" maxlength="8" pattern="[A-Za-z0-9]+" required  placeholder=" Nueva Contraseña"/> 
                <span class="input-group-btn">                                  
                   <button style="     padding: 10px 18px;     margin-left: 369px; margin-top: -51px;  margin-bottom: 14px;" type="button"  class="btn btn-default btn-md" id="showhide1" data-val='1'><span readonly id='eye1' class="icon fa fa-eye"></span></button>
               </span> 
              </div>
       
        <div>
                <input style="    font-size: 19px;     padding: 18px 23px;    border: 2px solid #ccc;" title="No se Aceptan Espacios en Blanco" id="confirm-pass" name="confirm-pass" type="password" class="form-control"  minlength="5" maxlength="8" pattern="[A-Za-z0-9]+" required  placeholder="Confirmar Contraseña"/> 
                <span class="input-group-btn">                                  
                   <button style="     padding: 10px 18px;     margin-left: 369px; margin-top: -51px;  margin-bottom: 14px;" type="button"  class="btn btn-default btn-md" id="showhide4" data-val='1'><span readonly id='eye4' class="icon fa fa-eye"></span></button>
               </span> 
              </div>
       

     	<hr />
       <center>
        <button style="    padding: 9px 19px; font-size: 20.5px;" class="btn btn-large btn-primary" type="submit" name="btn-reset-pass">Restablecer</button>
        </center>
        
      </form>


    </div> <!-- /container -->

         <script src="assets/login/login1.js"></script>

    
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
         
