<html>

<head>
<script type="text/javascript" src="categoria/validacion.js"></script>
<script type="text/javascript" src="categoria/datosiguales.js"></script>
</head>

<body>

    <?php include('../conexion/connect_db.php');?>
     <form id="formRegCategorias" action="categoria/insertar_categoria.php" method="POST" name="nuevacategorias" autocomplete="off" onpaste="return false" oncopy="return false">
        <CENTER>
            <h3 class="white-text"> AGREGAR MODALIDAD</h3>
        </CENTER>

            <div class="container">
                <div class="form-group col-sm-6">
                    <label class="control-label"  for="nombrecate">Nombre de Modalidad</label>
                    <input type="text" class="form-control" placeholder="Nombre de categoría" name="nombrecate" placeholder="Email" id="nombrecate" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    <span class="validacion" id="validacion"> </span>
                </div>

                <div class="form-group col-sm-6">
                        <label for="Genero_atleta">Genero:</label>
                        <select class="form-control" name="Genero_atleta" id="Genero_atleta" required>
                            <option value="0"> Seleccione una opcion:</option>
                            <?php
                                $query = "SELECT * FROM tbl_genero";
                                $result = mysqli_query($mysqli, $query) or die("Ocurrio un error en la consulta SQL");
                                while (($fila = mysqli_fetch_array($result)) != NULL) {
                                echo '<option value="'.$fila["ID_GENERO"].'">'.$fila["NOM_GENERO"].'</option>';
                                    } ?>
                        </select>
                </div>

                <div class="form-group col-sm-12">
                    <label for="Descrip">Descripcion</label>
                    <textarea class="form-control" id="Descrip" name="Descrip" rows="4"  required onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
                </div>

                <div class="form-group col-sm-12">
                    <center>
                        <input type="submit" value="Guardar" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" class="btn btn-success" name="Guardar" id="Guardar">
                        <a href="plantilla.php" class="btn btn-danger" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;">Cancelar</a>
                    </center>
                </div>

                </div>
            </div>
    </form>
</body>

<script>
indice = document.getElementById("Genero_atleta").selectedIndex;
if( indice == null || indice == 0 ) {
  return false;
}
</script>

</html>