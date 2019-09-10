<html>
<head>
<script type="text/javascript" src="categoria/validacion.js"></script>

</head>
  <body>

  <?php 
    include('../conexion/connect_db.php');
    $id = intval($_GET['id']);
    $sql = mysqli_query($mysqli, "SELECT * FROM tbl_categorias WHERE ID_CATEGORIA='$id'");
      if(mysqli_num_rows($sql) == 0){ 
        }else{
          $row = mysqli_fetch_assoc($sql);
        }      
 ?>


    <form id="formRegCategorias" action="categoria/actualizar_categoria.php" method= "post" autocomplete="off" onpaste="return false" oncopy="return false">
    
    <input  hidden value="<?php echo $row['ID_CATEGORIA']; ?>"  name="id" id="id" > 

    <CENTER>
    <h3 class="white-text"> MODIFICAR CATEGORIA</h3></CENTER>        
    <br><br>
        <div class="container">
              <div class="form-group col-sm-4">
                    <label for="categoria">NOMBRE CATEGORIA:</label> 
                    <input value="<?php echo $row['NOM_CATEGORIA']; ?>"  type="text" class="form-control" name="nombrecate" id="nombrecate" required  onkeypress="return validaletras(event)" autocomplete="off">
              </div>
              <div class="form-group col-sm-4">
                    <label  for="Genero_atleta" > Genero:</label>                  
                    <select    class="form-control" name="Genero_atleta" id="Genero_atleta" required="">
                       <option value="0"> Seleccione una opcion:</option>
                       <?php
                       $query = "SELECT * FROM tbl_genero";
                       $result = mysqli_query($mysqli, $query) or die("Ocurrio un error en la consulta SQL");
                      while (($fila = mysqli_fetch_array($result)) != NULL) {
                              echo '<option value="'.$fila["ID_GENERO"].'">'.$fila["NOM_GENERO"].'</option>';
                             }
                       ?>          
                   </select>
              </div>
              <div class="form-group col-sm-10">   
                    <label  for="descripcion">Descripcion</label> 
                    <input value="<?php echo $row['OBS']; ?>" class="form-control" name="Descrip" id="Descrip" required  autocomplete="off">
              </div>            
              <br><br><br><br><br><br>
              <center>
                    <input type="submit" value="Guardar" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" name="Guardar" id="Guardar" class="btn btn-success">
                    <button style="font-size: 20px;     width: 163px; height: 50px;"  type="button" href="plantilla.php" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                     
              </center>
          </div>
    </form>
  </body>
<script src="functions.js"></script>
</html>