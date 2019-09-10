<html>
<head>
<!--<script type="text/javascript" src="../inscripcion/validaciones.js"></script>-->
<script type="text/javascript" src="atleta/combos.js"></script>
</head>
<body>

<?php
include('../conexion/connect_db.php');
//traer por id
$id = intval($_GET['id']);
$subcate = intval($_GET['cate']);

//Traer todo tabla personas
$sql = mysqli_query($mysqli, "SELECT * FROM tbl_atletas
INNER JOIN tbl_personas ON tbl_personas.ID_PERSONA = tbl_atletas.ID_PERSONA
INNER JOIN tbl_inscripcion ON tbl_inscripcion.ID_ATLETA = tbl_atletas.IDENT_ATLETA
INNER JOIN tbl_inscripcion_subcategoria ON tbl_inscripcion_subcategoria.ID_INSCRIPCION = tbl_inscripcion.ID_INSCRIPCION
INNER JOIN tbl_ciudad ON tbl_ciudad.ID_CIUDAD = tbl_personas.ID_CIUDAD
INNER JOIN tbl_estado ON tbl_estado.ID_ESTADO = tbl_personas.ID_ESTADO
INNER JOIN tbl_estado_civil ON tbl_estado_civil.ID_EST_CIVIL = tbl_personas.ID_EST_CIVIL
INNER JOIN tbl_genero ON tbl_genero.ID_GENERO = tbl_personas.ID_GENERO
INNER JOIN tbl_departamentos ON tbl_departamentos.ID_DEPTO = tbl_ciudad.ID_DEPTO
INNER JOIN tbl_subcategorias ON tbl_subcategorias.ID_SUBCATEGORIA = tbl_inscripcion_subcategoria.ID_SUBCATEGORIA
INNER JOIN tbl_categorias ON tbl_categorias.ID_CATEGORIA = tbl_subcategorias.ID_CATEGORIA
WHERE tbl_atletas.IDENT_ATLETA = '$id'");

if(mysqli_num_rows($sql) == 0){
  }else{
  $row = mysqli_fetch_assoc($sql);
}

 $subcategoria2 = $row['ID_SUBCATEGORIA2'];
$sub2 =mysqli_query($mysqli,"SELECT tbl_subcategorias.NOM_SUBCATEGORIA FROM tbl_inscripcion_subcategoria
INNER JOIN tbl_subcategorias ON tbl_subcategorias.ID_SUBCATEGORIA = tbl_inscripcion_subcategoria.ID_SUBCATEGORIA2 WHERE tbl_subcategorias.ID_SUBCATEGORIA = '$subcategoria2'");

  $rowsub = mysqli_fetch_assoc($sub2);

//CONSULTAS COMBOBOX 

$query = "SELECT ID_DEPTO, NOM_DEPTO FROM tbl_departamentos" ;
$resultado=$mysqli->query($query);

$query2="SELECT * FROM tbl_genero";
$resultado2=$mysqli->query($query2);

$query3="SELECT * FROM tbl_estado_civil";
$resultado3=$mysqli->query($query3);

$query6="SELECT * FROM tbl_evento WHERE CAT_PERMITIDA=2 ";
$resultado6=$mysqli->query($query6);

//TRAER TODO LO DE PERSONAS
//$sql = mysqli_query($mysqli, "SELECT * FROM tbl_personas WHERE ID_PERSONA='$id'");

//TRAER TODO DE LAS OTRAS TABLAS action="inscripcion/validaciones_atletas.php"
?>

<form method="post" id="Inscripcion" action="atleta/mod_atleta.php"> 
  <div class= "form-group">
    <br><h3 class="black-text"> MODIFICAR ATLETA</h3>
    <div class="form-group col-sm-3" >
      <input  hidden value="<?php echo $row['ID_PERSONA']; ?>"  name="id" id="id"> <!--ID OCULTO--> 
      <label for="PNom_atleta" class="control-label">Primer Nombre:</label> 
      <input value="<?php echo $row['PRIMER_NOMBRE']; ?>" minlength="3" maxlength="50" type="text" class="form-control" placeholder="Primer Nombre" name="PNom_atleta" id="PNom_atleta" required onkeypress="return validaletras(event)" >       
    </div>

    <div class="form-group col-sm-3" >
      <label  for="SNom_atleta" class="control-label"> Segundo Nombre:</label> 
      <input  value="<?php echo $row['SEGUNDO_NOMBRE']; ?>" minlength="3" maxlength="50" type="text" class="form-control" placeholder="Segundo Nombre" name="SNom_atleta" id="SNom_atleta" onkeypress="return validaletras(event)">   
    </div>

    <div class="form-group col-sm-3" >
      <label for="PApellido_atleta" class="control-label">Primer Apellido:</label>
      <input value="<?php echo $row['PRIMER_APELLIDO']; ?>" minlength="3" maxlength="50"  type="text" class="form-control" placeholder="Primer Apellido " name="PApellido_atleta" id="PApellido_atleta" required = "" onkeypress="return validaletras(event)">
    </div>

    <div class="form-group col-sm-3" >
      <label for="SApellido_atleta" class="control-label">Segundo Apellido:</label>
      <input value=" <?php echo $row['SEGUNDO_APELLIDO']; ?>" minlength="3" maxlength="50"  type="text" class="form-control" placeholder=" Segundo Apellido " name="SApellido_atleta" id="SApellido_atleta" required onkeypress="return validaletras(event)">  
    </div>

    <div class="form-group col-sm-3" >
      <label for="Identidad_atleta" class="control-label">Num.Identidad:</label>
      <input value="<?php echo $row['IDENTIDAD']; ?>" minlength="13" maxlength="13" type="text" class="form-control" placeholder="Numero de Identidad" name="Identidad_atleta" id="Identidad_atleta"  required = "" onkeypress="return valida(event)">  
    </div>

    <div class="form-group col-sm-3" >
      <label for="fecha_atleta" class="control-label">Fecha de nacimiento:</label>
      <input value="<?php echo $row['FEC_NAC']; ?>" class="form-control" name="fecha_atleta" id="fecha_atleta" type="date"> <br>
    </div>

    <div class="form-group col-sm-3" >
      <label for="tel_atleta" class="control-label">Teléfono Personal:</label>
      <input value="<?php echo $row['TEL_PERSONAL']; ?>" minlength="8" maxlength="10" type="text" class="form-control" placeholder="Teléfono Personal" name="tel_atleta" id="tel_atleta" required ="" onkeypress="return valida(event)">  
    </div>

    <div class="form-group col-sm-3" >
      <label for="correo_atleta" class="control-label">Correo:</label>
      <input value="<?php echo $row['CORREO']; ?>" minlength="8" maxlength="100" type="text" class="form-control" placeholder="ejemplo@ejemplo.com" name="correo_atleta" id="correo_atleta" required=""> 
    </div>
         
    <div class="form-group col-sm-3" >
      <label  for="Depto_atleta" class="control-label"> Departamento:</label>                  
      <select class="form-control" name="Depto_atleta" id="Depto_atleta">
        <option value="<?php echo $row['ID_DEPTO']; ?>"><?php echo $row['NOM_DEPTO']; ?></option>
                 
        <?php while($rowD = $resultado->fetch_assoc()) { ?>
        <option value="<?php echo $rowD['ID_DEPTO']; ?>"><?php echo $rowD['NOM_DEPTO']; ?></option>

        <?php } ?>
      </select>
    </div>

    <div class="form-group col-sm-3" >  
      <label for="Ciudad_atleta" class="control-label">Ciudad:</label>                
      <select class="form-control" name="Ciudad_atleta" id="Ciudad_atleta" >    
        <option value="<?php echo $row['ID_CIUDAD']; ?>"><?php echo $row['NOM_CIUDAD']; ?></option> 

      </select>
    </div>

    <div class="form-group col-sm-3">
      <label class="control-label" for="val-username">Peso (Kg)</label>
      <input value="<?php echo $row['PESO']; ?>" type="text" class="form-control" placeholder="Peso" name="peso" id="peso"  onkeypress="return validanumeros(event)" >
    </div> 

    <div class="form-group col-sm-3">
      <label class="control-label" for="val-username">Altura (Mts)</label> 
      <input value="<?php echo $row['ALTURA']; ?>" type="text" class="form-control" placeholder="Altura" name="altura" id="altura" onkeypress="return validanumeros(event)">
    </div>

    <div class="form-group col-sm-3" >
      <label for="Genero_atleta" class="control-label"> Género:</label>                  
      <select class="form-control" name="Genero_atleta" id="Genero_atleta">
        <option value="<?=$row['ID_GENERO']; ?>">  <?php echo $row['NOM_GENERO']; ?>  </option>
        <?php
        $sql2 = mysqli_query($mysqli, "SELECT * FROM tbl_genero ");
        while($rowG = $sql2->fetch_assoc()) { ?>
          <option value="<?=$rowG['ID_GENERO']; ?>">  <?php echo $rowG['NOM_GENERO']; ?>  </option>
        <?php } ?>     
      </select>
    </div>

    <!--PRIMER MODALIDAD--> 
    <div class="form-group col-sm-3" >
      <label for="Categoria" class="control-label">Modalidad:</label>                  
      <select class="form-control" name="categoria" id="categoria">
         <option value="<?php echo $row['ID_CATEGORIA']; ?>"><?php echo $row['NOM_CATEGORIA']; ?></option>
      </select>
    </div>

    <div class="form-group col-sm-3" >
      <label for="subcategoria" class="control-label">Categoria:</label>
      <select class="form-control" name="subcategoria" id="subcategoria" >
        <option value="<?php echo $row['ID_SUBCATEGORIA']; ?>"><?php echo $row['NOM_SUBCATEGORIA']; ?></option>
      </select>
    </div>

    <!--SEGUNDA MODALIDAD-->

    <div class="form-group col-sm-3" >
      <label for="subcategoria" class="control-label">Segunda Categoria:</label>
      <select class="form-control" name="subcategoria2" id="subcategoria2" >
        <option value="<?php echo $row['ID_SUBCATEGORIA2']; ?>"><?php echo $rowsub['NOM_SUBCATEGORIA']; ?></option>

      </select>
    </div>

    <div class="form-group col-sm-3" >
      <label for="Ecivil_atleta" class="control-label"> Estado civil:</label>                  
      <select class="form-control" name="Ecivil_atleta" id="Ecivil_atleta">
        <?php
        echo '<option value="'.$row["ID_EST_CIVIL"].'">'.$row["DESCRIPCION"].'</option>';
        $query = "SELECT * FROM tbl_estado_civil";
        $result = mysqli_query($mysqli, $query) or die("Ocurrio un error en la consulta SQL");
        while (($fila = mysqli_fetch_array($result)) != NULL) {
          echo '<option value="'.$fila["ID_EST_CIVIL"].'">'.$fila["DESCRIPCION"].'</option>';
        }?>     
      </select>
    </div>

    <div class="form-group col-sm-3" >
      <label for="Ecivil_atleta" class="control-label"> Estado:</label>                
      <select class="form-control" name="Estado" id="Estado" required>
        <option value="<?=$row['ID_ESTADO']; ?>">  <?php echo $row['NOM_ESTADO']; ?></option>            
        <?php
        //Trae el nom_estado
        $sql2 = mysqli_query($mysqli, "SELECT * FROM tbl_estado");
        while($rowE = $sql2->fetch_assoc()) { ?>
          <option value="<?=$rowE['ID_ESTADO']; ?>">  <?php echo $rowE['NOM_ESTADO']; ?>  </option>
        <?php } ?>     
      </select>   
    </div>

     <label class="col-sm-3">Tipo de Representación:</label>

    <div class="form-group col-sm-3">
      <input type="radio" name="radio" id="edad" value="1" onclick="desactivar()">
      <label for="edadminima">Independiente</label>
    </div>

    <div class="form-group col-sm-3">
      <input type="radio" name="radio" id="edad" value="1" onclick="activar()">
      <label for="edadminima">Club/Gimnasio</label>   
    </div> 

    <div class="form-group col-sm-3">
     <input value="<?php echo $row['NOM_GYM']; ?>"  type="text" class="form-control col-sm-3" placeholder="Nombre del Club/Gimnasio" name="Gimnasio_atleta" id="Gimnasio_atleta">
    </div>

    <label for="tel_em respon_atleta" class="control-label col-sm-3">En caso de emergencia contactar a:</label>

    <div class="form-group col-sm-3">
      <input value="<?php echo $row['NOM_RESPON']; ?>" minlength="5" maxlength="50" type="text" class="form-control" placeholder="Nombre del Responsable" name="respon_atleta" id="respon_atleta"  required ="" onkeypress="return validaletras(event)" style="width: 220px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    <div class="form-group col-sm-3">
      <input value="<?php echo $row['TEL_EMERGENCIA']; ?>" minlength="8" maxlength="10" type="text" class="form-control" placeholder="Teléfono de Emergencia" name="tel_em" id="tel_em"  required = "" onkeypress="return valida(event)">
    </div>    

    <div class="form-group col-sm-10">
      <label class="control-label" for="direc_atleta">Dirección Personal:</label>
      <textarea  class="form-control" id="direc_atleta" name="direc_atleta" rows="2"  ><?php echo $row['DIRECCION']; ?></textarea>
    </div>

    <center>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <input type="submit" value="Actualizar" href="javascript:;" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" name="Actualizar" id="Actualizar" class="btn btn-success">
    </center>
  </div> 
</form>
      <div id="resultado">
                </div>
</body>

<script type="text/javascript">
function activar(){

var club_gim=document.getElementById("Gimnasio_atleta").disabled= false;
}

</script>

<script type="text/javascript">
  $(document).ready(function(){
  var club_gim=document.getElementById("Gimnasio_atleta").disabled= true;
  });
</script>

<script type="text/javascript">
function desactivar(){

var club_gim =document.getElementById("Gimnasio_atleta").disabled= true;
document.getElementById("Gimnasio_atleta").value= " ";
}

</script>

<script type="text/javascript">
  $(document).ready(function(){
    $.post('atleta/segcate.php',{},

     function(Respuesta){

    if (Respuesta == 2) {
      $("#subcategoria2").prop("disabled", false);
    }
    else{
      $("#subcategoria2").prop("disabled", true);
    }
  });
});
</script>

<script>


$(document).ready(function(){
  $.post('atleta/verificar.php',{
  subcate: $('#subcate').val()
  id: $('#id').val()},
  function(Respuesta){
    $('.validacion').html(Respuesta);
  });
});

//VALIDACIÓN DE FORMULARIOS
$.validator.setDefaults({
    submitHandler: function () {
        form.submit();
    }
});
// VALIDACIONES DEL FORMULARIO CREAR CATEGORIAS
$(document).ready(function () {
  $("#Inscripcion").validate({

    rules: {

      PNom_atleta: {
        required: true,
        rangelength: [3, 50]
      },

      SNom_atleta: {
        required: false,
        rangelength: [3, 50]
      },

      PApellido_atleta: {
        required: true,
        rangelength: [3,50]
      },
       SApellido_atleta: {
        required: true,
        rangelength: [3,50]
      },

      correo_atleta: {
        required: true,
        rangelength: [8, 100]
      }, 

        Identidad_atleta: {
        required: true,
        rangelength: [13, 13]
      }, 

        tel_atleta: {
        required: true,
        rangelength: [8, 10]
    },  

    tel_em: {
        required: true,
        rangelength: [8, 10]
    },

    respon_atleta: {
        required: true,
        rangelength: [5, 50]
    },

    Gimnasio_atleta: {
        required: true,
        rangelength: [1, 100]
    },

    direc_atleta: {
        required: true,
        rangelength: [1, 100]
    },


    altura: {
        required: true,
        rangelength: [1, 100]
    },

       peso: {
        required: true,
        
    },

    }, 
    messages: {
      PNom_atleta: "Por favor, ingrese su nombre.",

      PApellido_atleta:"Por favor, ingrese su apellido",

      SApellido_atleta:"Por favor, ingrese su apellido",

      correo_atleta:"Por favor, ingrese su correo",

      Identidad_atleta:"Por favor, ingrese su identidad",

      tel_atleta:"Por favor, ingrese su teléfono",

      tel_em:"Por favor, ingrese un teléfono de emergencia",

      respon_atleta:"Por favor, ingrese un responsable",

      Gimnasio_atleta:"Por favor, ingrese su gimnasio",

      direc_atleta:"Por favor, ingrese su dirección",

      altura: "Por Favor, ingrese su altura",

      peso: "Por favor, ingrese su peso"

    },
    errorElement: "em",
      errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
        }
      // } );
  });
});
</script>

<script>
$(function() {
$( "#fecha_atleta" ).strtotime(date('Y-m-d')."-15 year");
});
</script>


</html>

<script type="text/javascript" src="funciones_atletas.js"></script>
