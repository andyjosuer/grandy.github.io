<?php
       session_start();
  /*if (empty($_SESSION['active']))
   {
    header("Location: ../../Login/index.php");
    //echo "Usuario no ingresado";
   }*/
  if ($_SESSION['ID_TIP_USUARIO'] != 1) 
  {
    echo "No hay acceso";exit;
  }
  ?>
<html>
<head>
<!--  <script type="text/javascript" src="personas/validacion.js"></script>
   <script type="text/javascript" src="personas/validacion_datosiguales.js"></script>-->
</head>
 <?php include("../conexion/connect_db.php");

$query = "SELECT ID_DEPTO, NOM_DEPTO FROM tbl_departamentos";
$resultado=$mysqli->query($query);

$query2 = "SELECT * FROM tbl_tipo_usuario";
$resultado2= $mysqli->query($query2); 

$id = intval($_GET['id']);
$sql = mysqli_query($mysqli, "SELECT * FROM tbl_personas WHERE id_persona='$id'");
    if(mysqli_num_rows($sql) == 0){
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      ?>
<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->

<script language="javascript">
      $(document).ready(function(){
        $("#Depto_persona").change(function () {
 
          $('#Ciudad_persona').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
          
          $("#Depto_persona option:selected").each(function () {
            id_depto = $(this).val();
            $.post("personas/cargar_ciudad.php", { id_depto: id_depto }, function(data){
              $("#Ciudad_persona").html(data);
            });            
          });
        })
      });
</script>



 <form method="post"   action="usuario/insertar_usuario.php" id="formRegUsuario">
    <div class="home-wrapper">
      <div class="container">
        <div class="row">
          <!-- home content -->
          <div class="col-md-10 col-md-offset-1">
            <CENTER><h3 class="white-text"> REGISTRAR USUARIO</h3></CENTER><br>
          <div class="wrap-login100 "><br>
            <div class= "form-group">

            <!--<input  hidden value="<?php// echo $row['ID_PERSONA']; ?>"  name="id" id="id"  >-->

              <fieldset style="border:2px solid black">
              <legend>Persona:</legend>
              <!-- Identidad-->
              <div class="form-group col-sm-3">
                <label class="control-label"  for="val-username">Identidad</label>
                <input readonly="readonly" minlength="13" maxlength="15" type="text" value="<?php echo $row['IDENTIDAD']; ?>" class="form-control" placeholder="IDENTIFICACION" onkeypress="return validanumeros(event)" name="ident" id="ident" autocomplete="off" required>
                <span class="validacion2 "> </span>
              </div><br><br><br><br><br><br><br>
              <!-- Nombre-->
              <div class="col-sm-3">
                <label class="control-label" for="val-username">Primer Nombre</label> 
                <input readonly="readonly" minlength="2" maxlength="50" type="text" value="<?php echo $row['PRIMER_NOMBRE']; ?>" class="form-control" placeholder="Primer Nombre" onkeypress="return validaletras(event)" autocomplete="off" required>
              </div>
              <!-- Segundo Nombre-->
              <div class="col-sm-3">
                <label class="control-label" for="val-username">Primer Nombre</label> 
                <input readonly="readonly" minlength="2" maxlength="50" type="text" value="<?php echo $row['SEGUNDO_NOMBRE']; ?>" class="form-control" placeholder="Segundo Nombre" onkeypress="return validaletras(event)" autocomplete="off" name="secondname" id="secondname">
              </div>

              <!-- Apellido-->
              <!-- Primer Apellido-->
              <div class="col-sm-3">
                <label class="control-label" for="val-username">Primer Apellido<span class="text-danger"></span></label>
                  <input readonly="readonly" minlength="2" maxlength="50" type="text" value="<?php echo $row['PRIMER_APELLIDO']; ?>" class="form-control" placeholder="Primer Apellido" onkeypress="return validaletras(event)" autocomplete="off" name="firstlastname" id="firstlastname" required>
              </div>
              <!-- Segundo Apellido-->
              <div class="col-sm-3">
                <label class="control-label" for="val-username">Primer Apellido<span class="text-danger"></span></label>
                <input readonly="readonly" minlength="2" maxlength="50" type="text" value="<?php echo $row['SEGUNDO_APELLIDO']; ?>" class="form-control" placeholder="Segundo Apellido" onkeypress="return validaletras(event)" autocomplete="off" name="secondlastname" id="secondlastname">
              </div><br><br><br><br><br><br>
              <!-- Fecha Nacimiento-->
              
              <div class="col-sm-3">
                <label class="control-label" for="val-username">Correo<span class="text-danger"></span></label>
                <input readonly="readonly" minlength="5" maxlength="50"  type="text" value="<?php echo $row['CORREO']; ?>" class="form-control" placeholder="Ejemplo@ejemplo.com" autocomplete="off" name="email" id="email" required>       
                <span class="validacion "> </span>
              </div><br><br><br><br>
              
             
              <?php //hidden ?>
              
            </fieldset> 
              <br><br>
  
              <fieldset style= "border:2px solid black">
              <legend>Usuario</legend>
              <input hidden value="<?php echo $row['ID_PERSONA']; ?>"  name="id" id="id"  >
                <div class="col-sm-3">
                <label class="control-label" for="val-username">Nombre de Usuario<span class="text-danger"></span></label>
                  <input minlength="5" maxlength="50"  type="text" class="form-control" placeholder="Nombre de Usuario" autocomplete="off" name="user" id="user" required>       
                    
                  <br><br>
                  </div>

                  <div class="col-sm-3">    
                <label class="control-label" for="val-username">Tipo de Usuario<span class="text-danger"></span></label>
                  <select class="form-control" placeholder="Tipo Usuario" name="tipousuario" id="tipousuario">
                    <option value="0"> Seleccione el Tipo Usuario:</option>
                      <?php
                        
                        while ($row = $resultado2->fetch_assoc()){?>
                        <option value="<?php echo $row['ID_TIPO_USUARIO'];?>"><?php echo $row['DESCRIPCION'];  ?></option>
                        <?php } ?>
                  </select> 
              </div>
              </fieldset>
            </div>
            <center>
              <!-- BOTONES -->
              <br><br>
              <input type ="submit" style="font-size: 20px; width: 163px; height: 50px;" class="btn btn-success" name="Guardar" id="Guardar" value="Guardar">&nbsp&nbsp&nbsp&nbsp
                <!--<button style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" type="submit" class="btn btn-success">Guardar</button>&nbsp &nbsp &nbsp 
               --> <a href="plantilla.php" class="btn btn-danger" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;">Cancelar</a>
            </center>
              <br><br> 
          </div>
          </div>
          </div>
      </div>
    </div>
  </form>



  </html>