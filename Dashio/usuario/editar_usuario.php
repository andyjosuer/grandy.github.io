  <?php include("../conexion/connect_db.php");
  
  $id = intval($_GET['id']);
  $sql = mysqli_query($mysqli, "SELECT * FROM tbl_usuario WHERE id_usuario='$id'");
    if(mysqli_num_rows($sql) == 0){
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
?>

  <form method="post"   action="usuario/update_usuario.php">
    <div class="home-wrapper">
			<div class="container">
				<div class="row">
					<!-- home content -->
					<div class="col-md-10 col-md-offset-1"><br>
            <CENTER><h3 class="white-text"> MODIFICAR USUARIO</h3></CENTER><br>
          <div class="wrap-login100 "><br>
						<div class= "form-group">
              
            <br><br>
            <input  hidden value="<?php echo $row['id_usuario']; ?>"  name="id" id="id"  >
					<!-- Apellido-->
              <label style="color:black" class="white-text col-sm-2 col-form-label" for="val-username">Nombre de Usuario<span class="text-danger"></span></label>
          <!-- Primer Apellido-->
                <div class="col-sm-3">
						<input style=" width: 200px; border: 2px solid #ccc;" value="<?php echo $row['nombre_usuario']; ?>" minlength="2" maxlength="50"  type="text" class="input-block-level" autocomplete="off" name="user" id="user" required="" placeholder="Nombre Usuario">
                </div>
                    <!-- Segundo Apellido-->
                                    <br><br>
             
            <br><br><br>
            </div>
            <center>
              <!-- BOTONES -->
              <br>
              <input type ="submit" style="font-size: 20px; width: 163px; height: 50px;" class="btn btn-success" value="ACTUALIZAR">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
