<?php
 session_start();

?>

<html>
<head>

</head>
<body>

<?php 
error_reporting(0);
include ("../conexion/connect_db.php");

$id = intval($_GET['id']);
$sql = mysqli_query($mysqli, "SELECT tbl_eventos.ID_EVENTO, tbl_eventos.NOM_EVENTO, tbl_eventos.FEC_INICIAL, tbl_eventos.FEC_FINAL, tbl_eventos.LUGAR_EVENTO, tbl_eventos.DESCRIPCION, tbl_eventos.CAT_PERMITIDA ,tbl_estado.NOM_ESTADO FROM tbl_eventos INNER JOIN tbl_estado ON tbl_eventos.ID_ESTADO=tbl_estado.ID_ESTADO WHERE ID_EVENTO='$id'"  );
if(mysqli_num_rows($sql) == 0){
     }else{
   $row = mysqli_fetch_assoc($sql);
  }

 ?>

<script src="functions.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<meta charset="utf-8">
<form action="evento/update_evento.php" method="POST" >

        <CENTER>
            <h3 class="white-text"> MODIFICAR EVENTO</h3>
        </CENTER>

<br>
<br>
 <div class="container">

             <input  hidden value="<?php echo $row['ID_EVENTO']; ?>"  name="id" id="id"  >

             <div class="form-group col-sm-6">
             <label label class="control-label"  for="nombreevento">NOMBRE DEL EVENTO</label> 
             <input  value="<?php echo $row['NOM_EVENTO']; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" placeholder="Nombre del Evento" name="nombre" id="nombre" required  maxlength="50">
             </div>
                       
             <div class="form-group col-sm-6">
             <label label class="control-label" for="fechainicial">FECHA INICIAL DEL EVENTO</label>
             <div class="datepicker" data-date-start-date="+1d">
             <input  value="<?php echo $row['FEC_INICIAL']; ?>" type="date" class="form-control"  name="inicial"  id="inicial" required>
             </div> 
             </div> 

             <div class="form-group col-sm-6">                  
             <label label class="control-label" for="fechafinal">FECHA FINAL DEL EVENTO</label>
             <input value="<?php echo $row['FEC_FINAL']; ?>" type="date" class="form-control" name="finall" id="finall" required >
             </div>

             <div class="form-group col-sm-6">  
             <label label class="control-label" for="lugarevento">LUGAR DEL EVENTO</label>
             <input  value="<?php echo $row['LUGAR_EVENTO']; ?>" maxlength="100" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"  placeholder="Lugar del Evento" name="lugar" id="lugar" required  maxlength="100" >
             </div>

             <div class="form-group col-sm-6"> 
             <label  label class="control-label" for="descripcion">DESCRIPCIÓN</label>
             <input value="<?php echo $row['DESCRIPCION']; ?>" class="form-control" name="descrip" id="descrip"   maxlength="200" onkeyup="javascript:this.value=this.value.toUpperCase();" >
             </div>

              <div class="form-group col-sm-6">
                  
                     <label >ESTADO </label>
                   <select  class="form-control" name="estado" id="estado" required="">

                        <option value=<?php echo $row['ID_ESTADO']; ?>><?php echo $row['NOM_ESTADO']; ?></option>
                        <?php
                            $query = "SELECT * FROM tbl_estado";
                            $result = mysqli_query($mysqli, $query) or die("Ocurrio un error en la consulta SQL");
                            while (($fila = mysqli_fetch_array($result)) != NULL) {
                            echo '<option value="'.$fila["ID_ESTADO"].'">'.$fila["NOM_ESTADO"].'</option>';
                           }
                        ?>
                    </select>
                </div >

                
            <div class="form-group col-sm-6">
                   <label label class="control-label"  for="estado">CATEGORÍA PERMITIDA:</label>
                   &nbsp&nbsp&nbsp&nbsp
                    <input type="radio" name="categoria" id="categoria" value="1" onclick="activar1()">UNA CATEGORÍA 
                    &nbsp&nbsp&nbsp&nbsp
                    <input type="radio" name="categoria" id="categoria" value="2" onclick="activar2()">DOS CATEGORÍAS
             </div> 
             <div class="form-group col-sm-12">
             <center>
             <input type="submit" value="MODIFICAR" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" class="btn btn-success" >
             <a href="plantilla.php" class="btn btn-danger" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;">CANCELAR</a>
             </center>
             </div>
            </div>
         </form>
     </body>
</html>


 