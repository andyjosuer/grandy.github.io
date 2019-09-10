<?php include '../conexion/conexion.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanders y asociados|
       
    </title>
 
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="  https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">

</head>

<body>


    <div class="wrapper">
        <div id="formContent">
           
            <div>
                <h4>
                    <b>Sanders</b> y Asociados
                </h4>
            </div>

            <!-- Icon -->
            <div>
                <img src="../images/email.png" id="icon" alt="User Icon" />
            </div>

            <!-- form recuperar password-->
            <form  action="sendmail.php" method="POST" onsubmit=" return recuperar();" autocomplete="off">
                <input type="email" id="txtCorreoElectronic" name="txtCorreoElectronic" placeholder="Correo Electrónico" autocomplete="off" ><br>
                <span id="error1"></span> <br>
                <span class="validacion "> </span>
                <br> <br> 
                <div class="loginButton">
                    <input type="submit" value="Enviar Recuperación" id ="envia_link">
                </div>
                
            </form>

            <!-- exit Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="../index.php">Volver a iniciar sesión</a>
            </div>

        </div>
       
    </div> 
   
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="../js/vendor/jquery-1.11.3.min.js"></script>
        <script>/*FUNCION para validar las texbox con el correo */

$('#txtCorreoElectronic').keyup(function (){
$.post('ajax_correo_vali.php',{
    txtCorreoElectronic:$('#txtCorreoElectronic').val(),
beforeSend: function(){
$('.validacion').html("Espere un momento por favor..");
}
},
function(Respuesta){
$('.validacion').html(Respuesta);
});
});
</script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../cambio_pass/js_cambio/pass_cambio.js"></script>
 
</body>

</html>