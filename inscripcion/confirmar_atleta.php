<html>
<head>
<script type="text/javascript" src="inscripcion/validaciones.js"></script>
</head>
<body>

<br><br>
<form > 

</form>

<form method="post" id="confirmar" action="inscripcion/buscar_atleta.php"  autocomplete="off">
	<form class="form-inline">
		<center>
		<div class="form-group">	
			<label style="color:black" for="Identidad_atleta">Ingrese su numero de identidad:</label>
       		<input style="width: 270px;" minlength="13" maxlength="13" type="text" class="form-control" placeholder="Numero de Identidad" name="Identidad_atleta" id="Identidad_atleta" required = "" onkeypress="return valida(event)"> 
		</div>
		<input type="submit" value="Buscar" name="Buscar" id="Buscar" class="btn btn-success"> 
		<a href="plantilla.php" class="btn btn-danger">Cancelar</a>
		</center>
		<br><br>
	</form>
</form>
</body>
</html>