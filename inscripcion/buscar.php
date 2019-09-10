<?php
require ('../conexion/connect_db.php');

$correo = $_post["$correo_atleta"];

$query="SELECT CORREO FROM tbl_personas WHERE CORREO = '$correo'";
$resultado=$mysqli->query($query);

echo $resultado;


  $('#correo_atleta').keyup(function (){
    var correo = document.getelementbyid("correo_atleta").value.trim();

    if (correo != ""){
      $.post("Inscripcion/buscar.php"{correo: correo}, function(resultado){
        $("#resultado").html(resultado);
        

    if (resultado != ""){
        alert("El correo ingresado ya existe");
      document.getelementbyid("correo_atleta").focus();
      $("Guardar").prop("distabled",true);
    }

    else {
      $("Guardar").prop("distabled", false);
    }
  });
    };
  };
?>