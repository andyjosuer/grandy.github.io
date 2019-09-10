<html>
<head>
<script type="text/javascript" src="inscripcion/combos.js"></script>
<script type="text/javascript" src="inscripcion/validaciones.js"></script>
<script type="text/javascript" src="inscripcion/datosiguales.js"></script>
</head>
<body>

<?php
include('../conexion/connect_db.php');

//CONSULTAS COMBOBOX 

$query = "SELECT ID_DEPTO, NOM_DEPTO FROM tbl_departamentos";
$resultado=$mysqli->query($query);

$query2="SELECT * FROM tbl_genero";
$resultado2=$mysqli->query($query2);

$query3="SELECT * FROM tbl_estado_civil";
$resultado3=$mysqli->query($query3);


?>

<form method="post" id="Inscripcion" action="inscripcion/validaciones_atletas.php"  autocomplete="off" > 
   	<div class= "form-inline">
   		<br><h3 class="black-text"> PRE-INSCRIPCION ONLINE</h3>

   		<div class="form-inline">

	   		<div class="form-group col-sm-3" >
	        	<label for="PNom_atleta" class="control-label">Primer Nombre:</label> 
	            <input minlength="3" maxlength="50" type="text" class="form-control" placeholder="Primer Nombre" name="PNom_atleta" id="PNom_atleta" required onkeypress="return validaletras(event)" >       
	        </div>

	    	<div class="form-group col-sm-3" >
	        	<label  for="SNom_atleta" class="control-label"> Segundo Nombre:</label> 
	        	<input minlength="3" maxlength="50" type="text" class="form-control" placeholder="Segundo Nombre" name="SNom_atleta" id="SNom_atleta" onkeypress="return validaletras(event)">   
	    	</div>

	        <div class="form-group col-sm-3" >
	        	<label for="PApellido_atleta" class="control-label">Primer Apellido:</label>
	            <input minlength="3" maxlength="50"  type="text" class="form-control" placeholder="Primer Apellido " name="PApellido_atleta" id="PApellido_atleta" required = "" onkeypress="return validaletras(event)">
	        </div>

	        <div class="form-group col-sm-3" >
	        	<label for="SApellido_atleta" class="control-label">Segundo Apellido:</label>
	        	<input minlength="3" maxlength="50"  type="text" class="form-control" placeholder=" Segundo Apellido " name="SApellido_atleta" id="SApellido_atleta" required onkeypress="return validaletras(event)">  
	        </div>

	   	</div><br><br><br><br>

	   	<div class="form-inline">
	   	 	<div class="form-group col-sm-3" >
				<label for="Identidad_atleta" class="control-label">Num.Identidad:</label>
	         	<input minlength="13" maxlength="13" type="text" class="form-control" placeholder="Numero de Identidad" name="Identidad_atleta" id="Identidad_atleta"  required = "" onkeypress="return valida(event)">  <span class="validacion2"></span>
	        </div>

	        <div class="form-group col-sm-3" >
	        	<label for="fecha_atleta" class="control-label">Fecha de nacimiento:</label>
	          	<input title="La edad minima es de 15 años" class="form-control" name="fecha_atleta" id="fecha_atleta" type="date" required min=<?php echo date('Y-m-d' ,strtotime(date('Y-m-d')."- 80 year")); ?> max=<?php echo date('Y-m-d' ,strtotime(date('Y-m-d')."- 15 year")); ?>>
	        </div>

	        <div class="form-group col-sm-3" >
	        	<label for="tel_atleta" class="control-label">Teléfono Personal:</label>
	           	<input minlength="8" maxlength="10" type="text" class="form-control" placeholder="Teléfono Personal" name="tel_atleta" id="tel_atleta" required ="" onkeypress="return valida(event)"> <span class="validacion1" ></span>
	       	</div>

	       	<div class="form-group col-sm-3" >
	        	<label for="correo_atleta" class="control-label">Correo Electrónico:</label>
	        	<input minlength="8" maxlength="100"  type="text" class="form-control" placeholder="ejemplo@ejemplo.com" name="correo_atleta" id="correo_atleta" required> <span class="validacion" id="validacion"> </span>
	        </div>
	   	 </div><br><br><br><br>

	    <div class="form-inline">
	    	<div class="form-group">
           		<label class="col-sm-3 control-label"  for="direc_atleta">Dirección:</label>
           		<div class="col-sm-10">
                <input type="text" class="form-control" style="width: 400px; height: 52px;" id="direc_atleta" name="direc_atleta" required></div>
            </div>

	       <div class="form-group col-sm-3" >
	       		<label for="Depto_atleta" class="control-label"> Departamento:</label>                  
				<select class="form-control" name="Depto_atleta" id="Depto_atleta" required="">
	               <option value="0"> Seleccione una opción:</option>
					<?php while($row = $resultado->fetch_assoc()) { ?>
					<option value="<?php echo $row['ID_DEPTO']; ?>"><?php echo $row['NOM_DEPTO']; ?></option>
					<?php } ?>
				</select>
	       </div>

	        <div class="form-group col-sm-3" > 	
				<label for="Ciudad_atleta" class="control-label">Ciudad:</label>               
				<select class="form-control" name="Ciudad_atleta" id="Ciudad_atleta" >
					<option>Seleccione una opción</option>    
				</select>
	        </div> 
	       
	    </div><br><br>

	    <div class="form-inline">

			<div class="form-group col-sm-3" >
	        	<label for="Genero_atleta" class="control-label"> Género:</label>
	        	<select class="form-control" name="Genero_atleta" id="Genero_atleta" required="" >
	                <option value="0" > Seleccione una opción:</option>
					<?php while($row = $resultado2->fetch_assoc()) { ?>
					<option value="<?php echo $row['ID_GENERO']; ?>"><?php echo $row['NOM_GENERO']; ?></option>
					<?php } ?>			
				</select>
	        </div>

	       	<div class="form-group col-sm-3" >
	        	<label for="Categoria" class="control-label"> Modalidad:</label>                  
				<select class="form-control" name="categoria" id="categoria" required="">
	                <option value="0"> Seleccione una opción:</option>
				</select>
	        </div>

	        <div class="form-group col-sm-3" >
	        	<label for="subcategoria" class="control-label">Categoría:</label>
				<select class="form-control" name="subcategoria" id="subcategoria" required="" >
					<option>Seleccione una opción</option>
				</select>
	        </div>

	        <div class="form-group col-sm-3" >
	        	<label for="Ecivil_atleta" class="control-label"> Estado civil:</label>
				<select class="form-control" name="Ecivil_atleta" id="Ecivil_atleta" required="">
	              	<option value="0"> Seleccione una opción:</option>		
					<?php while($row = $resultado3->fetch_assoc()) { ?>
					<option value="<?php echo $row['ID_EST_CIVIL']; ?>"><?php echo $row['DESCRIPCION']; ?></option>
					<?php } ?>			
				</select>
 			</div>
        </div><br><br><br><br><br><br>

        <label class="col-sm-3">Tipo de Representación:</label>

        <div class="form-inline">
        	<div class="form-group col-sm-3">
        		<input type="radio" name="radio" id="edad" value="1" onclick="desactivar()">
                <label for="edadminima">Independiente</label>
        	</div>
        </div>

        <div class="form-inline">
        	<div class="form-group col-sm-3">
        		<input type="radio" name="radio" id="edad" value="1" onclick="activar()">
                <label for="edadminima">Club/Gimnasio</label>   
       		</div> 
       		 <input type="text" class="form-control col-sm-3" placeholder="Nombre del Club/Gimnasio" name="club_gim" id="club_gim">
    	</div><br><br><br><br>

    	<label for="tel_em respon_atleta" class="control-label col-sm-3">En caso de emergencia contactar a:</label>

    	<div class="form-inline">
	        <div class="form-group col-sm-3">
	         	<input minlength="5" maxlength="50" type="text" class="form-control" placeholder="Nombre del Responsable" name="respon_atleta" id="respon_atleta"  required ="" onkeypress="return validaletras(event)" style="width: 220px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
			<div class="form-group col-sm-3">
	         	<input minlength="8" maxlength="10" type="text" class="form-control" placeholder="Teléfono de Emergencia" name="tel_em" id="tel_em"  required = "" onkeypress="return valida(event)">
	        </div> 
	    </div> <br><br><br><br><br>
	 	<center>
	 		<div class="form-group">
				<input type="submit" value="Guardar" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" name="Guardar" id="Guardar" class="btn btn-success">

				<a href="plantilla.php" class="btn btn-danger" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;">Cancelar</a>
			</div>
        </center>
	</div> 
</form>
		
</body>

</html>

<script type="text/javascript">
function activar(){

var club_gim=document.getElementById("club_gim").disabled= false;
}

</script>

<script type="text/javascript">
	$(document).ready(function(){
	var club_gim=document.getElementById("club_gim").disabled= true;
	});
</script>

<script type="text/javascript">
function desactivar(){

var club_gim =document.getElementById("club_gim").disabled= true;
document.getElementById("club_gim").value= " ";
}

</script>


