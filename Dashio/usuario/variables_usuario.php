<?php 
$ident=mysqli_query($mysqli,"SELECT * FROM tbl_identificacion WHERE NUM_IDENT='$Identificacion'");
 	
		if($ident->num_rows > 0){
			//echo $idtel->num_rows;
			while ($row = $ident->fetch_assoc()) {
				$ID = $row['ID_IDENT'];
			}
		}
	function user()


 function validarpass($pass, $error_pass){
    if(strlen($pass)<6){
      $error_pass = "La clave debe tener al menos 6 caracteres";
      return false;
    }
    if(!preg_match('`[a-z]`',$pass)){
      $error_pass = "La clave debe tener al menos una letra minuscula";
      return false; 
    }
    if(!preg_match('`[A-Z]`',$pass)){
      $error_pass = "La clave debe tener al menos una letra mayuscula";
      return false; 
    }
    if(!preg_match('`[0-9]`',$pass)){
      $error_pass = "La clave debe tener al menos un caracter numérico";
      return false; 
    }
    $error_pass = "";
    return true;
  }

                     if ($_POST) {
                      $error_encontrado="";
                      if (validarpass($_POST["pass"], $error_encontrado)){
                        echo "PASSWORD VÁLIDO";
                      }else{
                        echo "PASSWORD NO VÁLIDO: " . $error_encontrado;
                      }
                    } 
                    ?>