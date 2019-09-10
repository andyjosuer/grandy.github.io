 @-webkit-keyframes estiloError {

  0% { opacity: 0; }
  2% { opacity: 1; }
  98% { opacity: 1; }
  100% { opacity: 0; }

}

.estiloError {
   color: red;
   animation: estiloError 7s linear forwards;
     -webkit-animation: estiloError 7s linear forwards;      
}

@keyframes estiloError {
  0% { opacity: 0; }
  2% { opacity: 1; }
  98% { opacity: 1; }
  100% { opacity: 0; }
}
</style>

</head>
<body>

<?php
//Activamos sesión.
session_start();

//Reseteo de variables.
$nombreValido = $emailValido = $telefonoValido = $errorsCaptcha = $errorsNombre = $errorsEmail = $errorsTel = $errorsMen = $errorsAsun = $nombre = $email = $seleccionado = $telefono = $mensaje = $captcha = NULL;    

//Definido formulario
if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {    

  //Obtenemos datos para comprobaciones (preg_match y email filter) (Importante).
  $nombreValido = dataForm($_POST['name']);
  $emailValido = dataForm($_POST['mail']);
  $telefonoValido = dataForm($_POST['phone']);

  //Regla nombre
  if (empty($_POST['name'])) {
    $errorsNombre = "\n Por favor ingrese su nombre."; 
  } elseif (!preg_match("/^[a-zA-Z ]*$/",$nombreValido)) {
    $errorsNombre = "\n Sólo se permiten letras y espacios en blanco."; 
  } else {  //Caso verdadero obtenemos datos.  
    $nombre = dataForm($_POST['name']);
  }

  //Regla email
  if (empty($_POST['mail'])) {
    $errorsEmail = "\n Por favor ingrese su email. "; 
  } elseif (!filter_var($emailValido, FILTER_VALIDATE_EMAIL)) {
    $errorsEmail = "\n email no valido";
  } else { //Caso verdadero obtenemos datos.  
    $email = dataForm($_POST['mail']);
  }

  //Regla telefono.
  if (empty($_POST['phone'])) {
    $errorsTel = "\n Por favor ingresar su número telefono. "; 
  } elseif (!preg_match("/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/", $telefonoValido)) {
    $errorsTel = "\n Número no valido";
  } else { //Caso verdadero obtenemos datos.  
    $telefono = dataForm($_POST['phone']);
  }

  //Regla mensaje
  if (empty($_POST['message'])) {
    $errorsMen = "\n Por favor ingrese su mensaje. "; 
  } else { //Caso verdadero obtenemos datos.  
    $mensaje = dataForm($_POST['message']);
  }

  //Regla selecciona.
  if (empty($_POST['producto'][0])) {
    $errorsAsun = "\n Debe seleccionar un producto";
  } else { //Caso verdadero obtenemos datos.  
    $seleccionado = dataForm($_POST['producto']);
  }

  //Regla captcha
  if (empty($_POST['vcode'])) {
    $errorsCaptcha = "\n Por favor ingrese el código captcha";
  } elseif($_SESSION['vcode'] != $_POST['vcode']) {
    $errorsCaptcha = "Los caracteres no coincide con el código captcha";
  }  else {
    $captcha = dataForm($_POST['vcode']);
  }

  //Comprobamos si todos los datos son verdadero.
  if ($nombre && $email && $telefono && $mensaje && $seleccionado && $captcha) {

    $asunto = "";
    $message = "Usuario:".$nombre." Email:".$email." Telefono ".$telefono." Informacion ".$mensaje;
    $destino = "contacto@example.com";
    $remitente = "From: contacto@example.com";
    mail($destino,$asunto,$message,$remitente);
    unset($_POST['submit']);
    $msg = "Gracias por sus comentarios";    

  }      

}//End isset formulario.

//Function -> Salida de datos.
function dataForm($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="error">

<?php 
//Caso enviar, mensaje OK, invisible formulario.   
if(isset($msg)){
  echo "<p class='err'>".$msg."</p>";
} else { //Caso falso mostramos formulario.
?>

</div>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off" enctype="multipart/form-data">
  <div class="touch">

    <div class="name">
      <input type="text" name="name" placeholder="Name" value='<?php echo htmlentities($nombre) ?>'>
      //Mensaje error      
      
    </div>

    <div class="email">
      <input type="text" name="mail"  placeholder="Email" value='<?php echo htmlentities($email) ?>'>
      //Mensaje error     
      <?php if (!empty($errorsEmail)) {  echo "<span class=estiloError>$errorsEmail</span>";  }  ?>
    </div>

    <div class="phone">
      <input type="tel" name="phone" placeholder="Phone" value='<?php echo htmlentities($telefono) ?>'>
      //Mensaje error     
       <?php if (!empty($errorsTel)) {  echo "<span class=estiloError>$errorsTel</span>";  }  ?>
    </div>

    <div class="select-pro">
      <select name="producto">
       <?php
         $datos = array("Asunto","TV","Internet");
         for($i=0; $i<count($datos); $i++) {
            if($i==$seleccionado) {
               echo "<option value='".$i."' selected>".$datos[$i]."</option>";
            }else {
               echo "<option value='".$i."'>".$datos[$i]."</option>";
            }
         }
      ?>
      </select>
      //Mensaje error     
      <?php if (!empty($errorsAsun)) {  echo "<span class=estiloError>$errorsAsun</span>";  }  ?>
    </div>

   <div class="Customer-message">
      <textarea id="message" name="message" placeholder="Su consulta..."><?php echo htmlentities($mensaje) ?></textarea>
       //Mensaje error     
       <?php if (!empty($errorsMen)) {  echo "<span class=estiloError>$errorsMen</span>";  }  ?>


    <div class="capcha">
      <img src="image.php" name="vcode" id="phoca-captcha"/>
      <input name="vcode" type="text" placeholder="Codigo captcha">
      //Mensaje error     
      <?php if (!empty($errorsCaptcha)) {  echo "<span class=estiloError>$errorsCaptcha</span>";  }  ?>
    </div>

    <input type="submit" name="submit" value="Enviar">
  </div>
</form>
<?php 
} //Fin else.
?>

</body>
</html> 