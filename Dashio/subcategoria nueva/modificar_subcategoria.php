

<?php 

  include('../conexion/connect_db.php');

$id = intval($_GET['id']);

 $sql = mysqli_query($mysqli, "SELECT * FROM tbl_subcategorias WHERE ID_SUBCATEGORIA='$id'");


    if(mysqli_num_rows($sql) == 0){
        
      }else{
        $row = mysqli_fetch_assoc($sql);
      }

      
 ?>


       <form method= "post" action="subcategoria/actualizar_subcategoria.php" autocomplete="off" onpaste="return false" oncopy="return false">
          <input  hidden value="<?php echo $row['ID_SUBCATEGORIA']; ?>"  name="id" id="id" >  
          <section id="main-content">
              <section class="wrapper">
                      <div class="row">
<!-- ********************************/ESPACIO DE TRABAJO ********************************** -->
        <!--******* agregar nueva Sub-Categoria***************-->
                        <CENTER><h3 class="white-text"> MODIFICAR SUB-CATEGORIA</h3></CENTER>   
                             <br>
                                <div class="wrap-login100 ">
                                      <br>          
                                         <div class= "form-group">
                                            <!--<label style="width:18%;color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Nombre de Categoria<span class="text-danger"></span></label>
                                            <select  style="height: 3.5rem;;   border: 2px solid #ccc;   font-size: 13px;     padding: 7px 31px;" minlength="5" maxlength="15" class="input-block-level" name="Nombre_categoria" id="Nombre_categoria" required="">
                                                 <option value="0"> Seleccione una opcion:</option>
                                                    <?php        
                                                      $query = "SELECT * FROM tbl_categorias";
                                                      $result = mysqli_query($mysqli, $query) or die("Ocurrio un error en la consulta SQL");
                                                       while (($fila = mysqli_fetch_array($result)) != NULL) {
                                                       echo '<option value="'.$fila["ID_CATEGORIA"].'">'.$fila["NOM_CATEGORIA"].'</option>';
                                                        }
                                                    ?>
                                             </select>
                                                <br> <br> <br>-->
                                                    <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Nombre de SubCategoria</label> 
                                                         <div class="col-sm-3">
                                                               <input value="<?php echo $row['NOM_SUBCATEGORIA']; ?>" style=" width: 300px; " minlength="5" maxlength="100" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Nombre de SubCategoria" id="nombresubcategoria" name="nombresubcategoria" required="">
                                                         </div>          
                                                               <br><br><br>       
                                                               <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Peso (Kg)</label> 
                                                        <div class="col-sm-3">
                                                                <input value="<?php echo $row['PESO']; ?>" type="number" name="peso" min="40.00" max="90.00" step="0.01">
                                                        </div>
                                                                <br><br><br>      
                                                                <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Altura (Mts)</label> 
                                                        <div class="col-sm-3">
                                                               <form action="../../form-result.php" method="post" target="_blank">
                                                                <input value="<?php echo $row['ALTURA']; ?>" type="number" name="altura" min="01.20" max="03.00" step="00.01">
                                                        </div>          
                                                                <br><br><br>
                                                                <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Edad Minima</label> 
                                                        <div class="col-sm-3">
                                                                        <input value="<?php echo $row['EDAD_MIN']; ?>" style=" width: 200px; " minlength="2" maxlength="3" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Edad Minima" name="edadminima" required="" onkeypress="return validanumeros(event)" >
                                                        </div>
                                                                 <br><br><br>
                                                                 <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Edad Maxima</label> 
                                                        <div class="col-sm-3">
                                                                 <input value="<?php echo $row['EDAD_MAX']; ?>" style=" width: 200px; " minlength="2" maxlength="3" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Edad Maxima" name="edadmaxima" required="" onkeypress="return validanumeros(event)" >
                                                        </div>
                                                                   <br> <br><br>
                                                                    <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Descripcion</label> 
                                                                     <input value="<?php echo $row['OBS']; ?>" name="Descripcion" rows="10" cols="65" onpaste="return false" >
                                                          <center>
                                                                         <br>
                                    <!-- BOTONES -->
                                                                        <input type="submit" value="Guardar" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" name="Guardar" id="Guardar" class="btn btn-success">
                                                                        <button style="font-size: 20px";  width: 163px; height: 50px;  type="button" href="plantilla.php" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                          </center>        
                                </div>
                         </div> 
                     </div>
             </section>
        </section>

