<html>
<head>
  <script type="text/javascript" src="personas/validacion.js"></script>
   <script type="text/javascript" src="personas/validacion_datosiguales.js"></script>
</head>
 <?php include("../conexion/connect_db.php");

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



  <form method="post"   action="personas/insertar_persona.php" id="formRegPersonas">
    <div class="home-wrapper">
			<div class="container">
				<div class="row">
					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
            <CENTER><h3 class="white-text"> REGISTRAR PERSONAS</h3></CENTER><br>
          <div class="wrap-login100 "><br>
						<div class= "form-group">
              <fieldset style="border:2px solid black">
              <legend>Persona:</legend>
              <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Nacionalidad</label> 
          
              <div class="col-sm-3">
                <select  style=" border: 2px solid #ccc;   font-size: 13px; padding: 1px 50px;" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="input-block-level"placeholder="Nacionalidad" name="nac">
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
                  <div class="col-sm-3">
                    <input style=" width: 200px; " minlength="13" maxlength="15" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="IDENTIFICACION" onkeypress="return validanumeros(event)" name="ident" id="ident" autocomplete="off" required>
                    <span class="validacion2 "> </span>
                  </div><br><br><br><br>
              <!-- Nombre-->
				      <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Nombre</label> 
          
                <div class="col-sm-3">
                  <input style=" width: 200px; " minlength="2" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Primer Nombre" onkeypress="return validaletras(event)" autocomplete="off" name="firstname" id="firstname" required>
                </div>
      					<!-- Segundo Nombre-->
      					<div class="col-sm-3">
      						<input style=" width: 200px; " minlength="2" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Segundo Nombre" onkeypress="return validaletras(event)" autocomplete="off" name="secondname" id="secondname">
      					</div>
      				<!-- label style="color:black"  class="white-text col-sm-3 col-form-label" for="val-username"<span class="text-danger"</span</label-->
      					
<br><br>

					<!-- Apellido-->
              <label style="color:black" class="white-text col-sm-2 col-form-label" for="val-username">Apellido<span class="text-danger"></span></label>
          <!-- Primer Apellido-->
                <div class="col-sm-3">
						      <input style=" width: 200px; border: 2px solid #ccc;" minlength="2" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Primer Apellido" onkeypress="return validaletras(event)" autocomplete="off" name="firstlastname" id="firstlastname" required>
                </div>
                    <!-- Segundo Apellido-->
                <div class="col-sm-3">
						      <input style=" width: 200px; border: 2px solid #ccc;" minlength="2" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Segundo Apellido" onkeypress="return validaletras(event)" autocomplete="off" name="secondlastname" id="secondlastname">
                </div>
                <br><br><br>
            <label style="width:17%; color:black" class=" white-text col-sm-3 col-form-label" for="val-username">Fecha de Nacimiento<span class="text-danger"></span></label>
                <div class="col-sm-3">
            <input type="date" style=" border: 2px solid #ccc; font-size: 13px;" min=<?php echo date('Y-m-d' ,strtotime(date('Y-m-d')."- 80 year")); ?> max=<?php echo date('Y-m-d' ,strtotime(date('Y-m-d')."- 15 year")); ?> class="input-block-level" placeholder="Altura en m/cm" name="fchnacimiento" id="fchnacimiento" required>       
                <br><br>
                </div>
            <label style="width:15%;color:black" class=" white-text col-sm-2 col-form-label" for="val-username"> Género<span class="text-danger"></span></label>                  
                <div class="col-sm-3">
                  <select  style="  border: 2px solid #ccc;   font-size: 13px; padding: 1px 35px;" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="input-block-level" placeholder="Altura en M/Cm" name="genero" required="">
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
                </div><br><br><br>

            <label style="width:17%; color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Dirección<span class="text-danger"></span></label>
    					<div class="col-sm-3">
    						<input style=" width: 530px; border: 2px solid #ccc;   font-size: 13px;     padding: 1px 6px;" minlength="5" maxlength="1000" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Dirección Domiciliaria" autocomplete="off" name="direccion" id="direccion" required>       
    					</div>
    					<br><br><br>

            <label style="width:17%;color:black" class="white-text col-sm-3 col-form-label" for="Depto_persona"> Departamento<span class="text-danger"></span></label>                  
              <div class="col-sm-3">
						    <select  style=" border: 2px solid #ccc;   font-size: 13px; padding: 1px 30px;" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="input-block-level"placeholder="Departamento" name="Depto_persona" id="Depto_persona" required="">
                	 <option value="0"> Seleccione un Departamento:</option>
                      <?php 
                      while($row = $resultado->fetch_assoc()) { ?>
                      <option value="<?php echo $row['ID_DEPTO']; ?>"><?php echo $row['NOM_DEPTO']; ?></option>
                      <?php } ?>
						    </select>
              </div>
 
					   <label style=" width:15%; color:black" class=" white-text col-sm-3 col-form-label" for="Ciudad_persona">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCiudad<span class="text-danger"></span></label>
                <div class="col-sm-3">
						      <select style="   border: 2px solid #ccc;   font-size: 13px; padding: 1px 30px;" class="input-block-level" placeholder="Seleccione una ciudad" name="Ciudad_persona" id="Ciudad_persona" required="">       
					         <option value="0"> Seleccione una Ciudad:</option>
                   </select>
				        </div>
                  <br><br><br>
                  <!--Correo-->
              <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Correo<span class="text-danger"></span></label>
                <div class="col-sm-3">
                  <input style=" width: 200px;   border: 2px solid #ccc;   font-size: 13px;" minlength="5" maxlength="50"  type="text" class="input-block-level" placeholder="Correo Electrónico" autocomplete="off" name="email" id="email" required>       
                  <span class="validacion "> </span>
                </div>
                 <!--Estado Civil-->
                 <label style="width:15%;color:black" class="white-text col-sm-3 col-form-label" for="val-username">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEstado Civil<span class="text-danger"></span></label>
                    <div class="col-sm-3">
                      <select style="   border: 2px solid #ccc;   font-size: 13px; padding: 1px 28px;" class="input-block-level" placeholder="Estado Civil" name="estadocivil" required="">
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
                  <br><br><br>
                  <label style="width:15%;color:black" class="white-text col-sm-3 col-form-label" for="val-username">Tipo Persona<span class="text-danger"></span></label>
                    <div class="col-sm-3">
                      <select style="   border: 2px solid #ccc;   font-size: 13px; padding: 1px 28px;" class="input-block-level" placeholder="Tipo Persona" name="tipopersona" required="">
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
                    </div>

                    <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTel. Personal<span class="text-danger"></span></label>
                <div class="col-sm-3">
                  <input style=" width: 200px;   border: 2px solid #ccc;   font-size: 13px;" minlength="5" maxlength="11" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Telefono Fijo" onkeypress="return validanumeros(event)" autocomplete="off" name="telpersonal" id="telpersonal" required>       
                  <span class="validacion1"> </span>
                </div>
                  <br><br><br>
				      
              <br><br>
            </fieldset> 
              <br><br>
              <fieldset style= "border:2px solid black">
              <legend>Usuario</legend>
                <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Nombre de Usuario<span class="text-danger"></span></label>
                  <div class="col-sm-3">
                    <input style=" width: 200px;   border: 2px solid #ccc;   font-size: 13px;" minlength="5" maxlength="50"  type="text" class="input-block-level" placeholder="Nombre de Usuario" autocomplete="off" name="user" id="user" required>       
                    <span class="validacion3"> </span>
                  <br><br>
                  </div>
              </fieldset>
            </div>
            <center>
              <!-- BOTONES -->
              <br><br>
              <input type ="submit" style="font-size: 20px; width: 163px; height: 50px;" class="btn btn-success" value="Guardar">&nbsp&nbsp&nbsp&nbsp
                <!--<button style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" type="submit" class="btn btn-success">Guardar</button>&nbsp &nbsp &nbsp 
               --> <button style="font-size: 20px; width: 163px; height: 50px;" type="button" href="plantilla.php" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </center>
              <br><br> 
          </div>
          </div>



					</div>
			</div>
		</div>
  </form>


  </html>