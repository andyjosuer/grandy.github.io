<html>
<head>
  <script type="text/javascript" src="personas/validacion.js"></script>
   <script type="text/javascript" src="personas/validacion_datosiguales.js"></script>
</head>
 <?php include("../conexion/connect_db.php");
 
  
  $id = intval($_GET['id']);
  $sql = mysqli_query($mysqli, "SELECT * FROM tbl_personas WHERE ID_PERSONA='$id'");
    if(mysqli_num_rows($sql) == 0){
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
  $cons = mysqli_query($mysqli, "SELECT * FROM tbl_usuario WHERE id_persona='$id'");
    if(mysqli_num_rows($sql) == 0){
      }else{
        $fila = mysqli_fetch_assoc($sql);
      }


$query = "SELECT ID_DEPTO, NOM_DEPTO FROM tbl_departamentos";
$resultado=$mysqli->query($query);?>
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



  <form method="post"   action="personas/update_persona.php" id="formUpdPersonas">
    <div class="home-wrapper">
			<div class="container">
				<div class="row">
					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
            <CENTER><h3 class="white-text"> MODIFICAR PERSONAS</h3></CENTER><br>
          <div class="wrap-login100 "><br>
						<div class= "form-group">
              
              <!--Nacionalidad-->
              <input  hidden value="<?php echo $row['ID_PERSONA']; ?>"  name="id" id="id"  >
              <div class="form-group col-sm-3">
                <label for="val-username">Nacionalidad</label> 
                  <select class="form-control"  name="nac" id="nac">
                     <option value="0"> Seleccione: </option>
                        <?php

                          $query = "SELECT * FROM tbl_tip_identificacion";
                         
                          $result = mysqli_query($mysqli, $query) or die("Ocurrio un error en la consulta SQL");
                          while (($fila = mysqli_fetch_array($result)) != NULL) {
                             echo '<option value="'.$fila["ID_TIP_IDENT"].'">'.$fila["DESCRIPCION"].'</option>';
                          }
                         
                        ?>
                  </select>
              </div>

              <!-- Identidad-->
              <div class="form-group col-sm-3">
                <label class="control-label"  for="val-username">Identidad</label>
                <input minlength="13" maxlength="15" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" value="<?php echo $row['IDENTIDAD']; ?>" class="form-control" placeholder="IDENTIFICACION" onkeypress="return validanumeros(event)" name="ident" id="ident" autocomplete="off" required>
                <span class="validacion2 "> </span>
              </div><br><br><br><br><br><br><br>
              <!-- Nombre-->
				      <div class="col-sm-3">
                <label class="control-label" for="val-username">Primer Nombre</label> 
                <input minlength="2" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" value="<?php echo $row['PRIMER_NOMBRE']; ?>" class="form-control" placeholder="Primer Nombre" onkeypress="return validaletras(event)" autocomplete="off" name="firstname" id="firstname" required>
              </div>
      				<!-- Segundo Nombre-->
      				<div class="col-sm-3">
                <label class="control-label" for="val-username">Primer Nombre</label> 
      					<input minlength="2" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" value="<?php echo $row['SEGUNDO_NOMBRE']; ?>" class="form-control" placeholder="Segundo Nombre" onkeypress="return validaletras(event)" autocomplete="off" name="secondname" id="secondname">
      				</div>

    					<!-- Apellido-->
              <!-- Primer Apellido-->
              <div class="col-sm-3">
                <label class="control-label" for="val-username">Primer Apellido<span class="text-danger"></span></label>
						      <input minlength="2" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" value="<?php echo $row['PRIMER_APELLIDO']; ?>" class="form-control" placeholder="Primer Apellido" onkeypress="return validaletras(event)" autocomplete="off" name="firstlastname" id="firstlastname" required>
              </div>
              <!-- Segundo Apellido-->

              <div class="col-sm-3">
                <label class="control-label" for="val-username">Primer Apellido<span class="text-danger"></span></label>
                <input minlength="2" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" value="<?php echo $row['SEGUNDO_APELLIDO']; ?>" class="form-control" placeholder="Segundo Apellido" onkeypress="return validaletras(event)" autocomplete="off" name="secondlastname" id="secondlastname">
              </div><br><br><br><br><br><br>

                <div class="col-sm-3">
                <label class="control-label" for="val-username">Correo<span class="text-danger"></span></label>
                <input minlength="5" maxlength="50"  type="text" value="<?php echo $row['CORREO']; ?>" class="form-control" placeholder="Ejemplo@ejemplo.com" autocomplete="off" name="email" id="email" required>       
                <span class="validacion "> </span>
              </div>

                <div class="col-sm-3">
                <label class="control-label" for="val-username">Tel. Personal<span class="text-danger"></span></label>
                  <input minlength="5" maxlength="11" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" value="<?php echo $row['TEL_PERSONAL']; ?>" class="form-control" placeholder="Telefono Fijo" onkeypress="return validanumeros(event)" autocomplete="off" name="telpersonal" id="telpersonal" required>       
                  <span class="validacion1"> </span>
              </div><br><br><br><br><br>

              <div class="col-sm-3">
                <label class="control-label"  for="val-username">Dirección<span class="text-danger"></span></label>
                <input style=" width: 440px; " minlength="5" maxlength="1000" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" value="<?php echo $row['DIRECCION']; ?>" class="form-control" placeholder="Dirección Domiciliaria" autocomplete="off" name="direccion" id="direccion" required>
              </div><br><br><br><br><br>
              
              <!-- Fecha Nacimiento-->
              <div class="col-sm-3">
                <label class="control-label" for="val-username">Fecha de Nacimiento<span class="text-danger"></span></label>
                <input type="date" min=<?php echo date('Y-m-d' ,strtotime(date('Y-m-d')."- 80 year")); ?> max=<?php echo date('Y-m-d' ,strtotime(date('Y-m-d')."- 15 year")); ?> value="<?php echo $row['FEC_NAC']; ?>" class="form-control" name="fchnacimiento" id="fchnacimiento" required>       

              </div>

              <!-- Género-->
              <div class="col-sm-3">
                <label class="control-label" for="val-username"> Género<span class="text-danger"></span></label>                  
                <select class="form-control" name="genero" required="">
                    <!-- option value="1">Masculino</option-->
                    <!-- option value="2">Femenino</option-->
                    <option value="0"> Seleccione el Género:</option>
                      <?php
                         
                        $query = "SELECT * FROM tbl_genero";
                       
                        $result = mysqli_query($mysqli, $query) or die("Ocurrio un error en la consulta SQL");
                        while (($fila = mysqli_fetch_array($result)) != NULL) {
                           echo '<option value="'.$fila["ID_GENERO"].'">'.$fila["NOM_GENERO"].'</option>';
                        }
                      ?>
                </select>
                </div>
              
              <!--DEPARTAMENTO-->
              <div class="col-sm-3">
                <label class="control-label" for="Depto_persona"> Departamento<span class="text-danger"></span></label>                  
                <select class="form-control" name="Depto_persona" id="Depto_persona" required="">
                   <option value="0"> Seleccione un Departamento:</option>
                      <?php 
                      while($row = $resultado->fetch_assoc()) { ?>
                      <option value="<?php echo $row['ID_DEPTO']; ?>"><?php echo $row['NOM_DEPTO']; ?></option>
                      <?php } ?>
                </select>
              </div>
              <!--CIUDAD-->
              <div class="col-sm-3">
                <label class="control-label" for="Ciudad_persona">Ciudad<span class="text-danger"></span></label>
                <select class="form-control" name="Ciudad_persona" id="Ciudad_persona" required="">       
                  <option value="0"> Seleccione una Ciudad:</option>
                </select>
              </div><br><br><br><br><br><br>

 
              <!--Estado Civil-->
              <div class="col-sm-3">
                <label class="control-label" for="val-username">Estado Civil<span class="text-danger"></span></label>
                <select class="form-control" placeholder="Estado Civil" name="estadocivil" required="Seleccione el Estado Civil:">
                  <option value="0"> Seleccione el Estado Civil:</option>
                    <?php
                      $query = "SELECT * FROM tbl_estado_civil";
                      $result = mysqli_query($mysqli, $query) or die("Ocurrio un error en la consulta SQL");
                        while (($fila = mysqli_fetch_array($result)) != NULL) {
                        echo '<option value="'.$fila["ID_EST_CIVIL"].'">'.$fila["DESCRIPCION"].'</option>';
                        }
                          $DEPTO = depto;
                    ?>
                </select> 
              </div>

              <div class="col-sm-3">    
                <label class="control-label" for="val-username">Tipo Persona<span class="text-danger"></span></label>
                  <select class="form-control" placeholder="Tipo Persona" name="tipopersona" required="">
                    <option value="0"> Seleccione el Tipo Persona:</option>
                      <?php
                        $query = "SELECT * FROM tbl_tipo_persona";
                        $result = mysqli_query($mysqli, $query) or die("Ocurrio un error en la consulta SQL");
                          while (($fila = mysqli_fetch_array($result)) != NULL) {
                            echo '<option value="'.$fila["ID_TIP_PERSONA"].'">'.$fila["NOM_PERSONA"].'</option>';
                            }
                            //$DEPTO = depto;
                      ?>
                  </select> 
                  <br><br>
              </div>
              <br><br>	
            
              <br><br>
            </div>
            <center>
              <!-- BOTONES -->
              <br><br>
              <input type ="submit" style="font-size: 20px; width: 163px; height: 50px;" class="btn btn-success" name="Guardar" id="Guardar" value="Modificar">&nbsp&nbsp&nbsp&nbsp
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