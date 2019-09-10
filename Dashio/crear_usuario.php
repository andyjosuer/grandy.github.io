
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Sistema FENAFH</title>

  <!-- Favicons -->
 
  <link rel="shortcut icon" type="image/x-icon" href="../img/fenafh.ico">
  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">



  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
 <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Esconder / Desplegar Menu"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>FENA<span>FH</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
        
          <!-- settings end -->
          <!-- inbox dropdown start-->
      
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
         
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a href="cerrar_sesion.php" >CERRAR SESION</a> </li>

        </ul>
      </div>
    </header>


 <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/user.png" class="img-circle" width="80"></a></p>
          <h5 class="centered">ADDIM</h5>
          <li class="mt">
            <a class="active" href="sistema.html">
              <i class="fa fa-home"></i>
              <span>Inicio</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
             <i class="fas fa-address-card"></i>
              <span>Seccion Atletas</span>
              </a>
            <ul class="sub">
              <li><a href="">Ver Atletas Inscritos</a></li>
              <li><a href="">Agregar Nuevo Atleta</a></li>
          
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fas fa-dumbbell"></i>
              <span>Seccion Categorias</span>
              </a>
            <ul class="sub">
              <li><a href="grids.html">Categorias Existentes</a></li>
              <li><a href="calendar.html">Agregar Nueva Categoria</a></li>
        
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-calendar"></i>
              <span>Concursos</span>
              </a>
            <ul class="sub">
              <li><a href="blank.html">Mostrar Concursos</a></li>
              <li><a href="login.html">Agregar Nuevo Concurso</a></li>
            <li><a href="login.html">Ranking</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-lock"></i>
              <span>Seguridad</span>
              </a>
            <ul class="sub">
              <li><a href="crear_usuario.php">Usuarios</a></li>
              <li><a href="advanced_form_components.html">Roles</a></li>
              <li><a href="form_validation.html">Permisos</a></li>
               <li><a href="form_validation.html">Bitacora</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-file-signature"></i>
              <span>Mantenimientos</span>
              </a>
            <ul class="sub">
              <li><a href="basic_table.html">Basic Table</a></li>
              <li><a href="responsive_table.html">Responsive Table</a></li>
              <li><a href="advanced_table.html">Advanced Table</a></li>
            </ul>
          </li>
   
        
          
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
        

          <!-- /ESPACIO DE TRABAJO -->
  <form method="post"   action="insertar_usuario.php">
    <div class="home-wrapper">
			<div class="container">
				<div class="row">
					<!-- home content -->
					<div class="col-md-10 col-md-offset-1"><br><br><br>
            <CENTER><h3 class="white-text"> CREAR USUARIOS</h3></CENTER><br>
          <div class="wrap-login100 "><br>
						<div class= "form-group">
              <!-- Nombre-->
				      <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Nombre</label> 
          
                <div class="col-sm-3">
          <input style=" width: 200px; " minlength="2" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Primer Nombre" name="firstname" required=""></div>
					<!-- Segundo Nombre-->
					<div class="col-sm-3">
						<input style=" width: 200px; " minlength="2" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Segundo Nombre" name="secondname" required="">
					</div>
				<!-- label style="color:black"  class="white-text col-sm-3 col-form-label" for="val-username"<span class="text-danger"</span</label-->
					
<br><br>

					<!-- Apellido-->
              <label style="color:black" class="white-text col-sm-2 col-form-label" for="val-username">Apellido<span class="text-danger"></span></label>
          <!-- Primer Apellido-->
                <div class="col-sm-3">
						<input style=" width: 200px; border: 2px solid #ccc;" minlength="2" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Primer Apellido" name="firstlastname" required="">
                </div>
                    <!-- Segundo Apellido-->
                <div class="col-sm-3">
						<input style=" width: 200px; border: 2px solid #ccc;" minlength="2" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Segundo Apellido" name="secondlastname" required="">
                </div>
                <br><br><br>
            <label style="width:17%; color:black" class=" white-text col-sm-3 col-form-label" for="val-username">Fecha de Nacimiento<span class="text-danger"></span></label>
                <div class="col-sm-3">
            <input type="date" style=" border: 2px solid #ccc; font-size: 13px;"  class="input-block-level" placeholder="Altura en m/cm" name="fchnacimiento" required="">       
                <br><br>
                </div>
            <label style="width:15%;color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Género<span class="text-danger"></span></label>                  
                <div class="col-sm-3">
                  <select  style="  border: 2px solid #ccc;   font-size: 13px; padding: 1px 31px;" minlength="5" maxlength="15" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="input-block-level" placeholder="Altura en M/Cm" name="genero" required="">
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                  </select>
                </div>
               	<br><br><br>
            <label style="width:17%; color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Dirección<span class="text-danger"></span></label>
    					<div class="col-sm-3">
    						<input style=" width: 530px; border: 2px solid #ccc;   font-size: 13px;     padding: 1px 6px;" minlength="5" maxlength="15" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Dirección Domiciliaria" name="direccion" required="">       
    					</div>
    					<br><br><br>

            <label style="width:17%;color:black" class="white-text col-sm-3 col-form-label" for="val-username"> Departamento<span class="text-danger"></span></label>                  
              <div class="col-sm-3">
						    <select  style=" border: 2px solid #ccc;   font-size: 13px;     padding: 1px 31px;" minlength="5" maxlength="15" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="input-block-level"placeholder="Altura en M/Cm" name="depto" required="">
                	<option value="0">Elija una opcion</option>
                
						    </select>
              </div>
					   <label style=" width:15%; color:black" class=" white-text col-sm-3 col-form-label" for="val-username">Ciudad<span class="text-danger"></span></label>
                <div class="col-sm-3">
						      <select style="   border: 2px solid #ccc;   font-size: 13px; padding: 1px 61px;" minlength="2" maxlength="30" class="input-block-level" placeholder="Seleccione una ciudad" name="ciudad" required="">       
					         <option value="0">Elija una opcion</option>
                   </select>
				        </div>
                  <br><br><br>
              <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Correo<span class="text-danger"></span></label>
                <div class="col-sm-3">
                  <input style=" width: 200px;   border: 2px solid #ccc;   font-size: 13px;" minlength="5" maxlength="15" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Correo Electrónico" name="email" required="">       
                </div>
                  <br><br><br>
				      <label style="color:black" class=" white-text col-sm-2 col-form-label" for="val-username">Telefono<span class="text-danger"></span></label>
                <div class="col-sm-3">
                  <input style=" width: 200px;   border: 2px solid #ccc;   font-size: 13px;" minlength="5" maxlength="15" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Telefono Fijo" name="telefono" required="">       
                </div>
                  <label style="width:15%;color:black" class="white-text col-sm-3 col-form-label" for="val-username">Estado Civil<span class="text-danger"></span></label>
                    <div class="col-sm-3">
                      <select style=" width: 150px;   border: 2px solid #ccc;   font-size: 13px;     padding: 1px 6px;" class="input-block-level" placeholder="Estado Civil" name="estadocivil" required="">
                          <option value="0">Seleccione:</option>
                      </select> 
                    </div>
            </div>
            <center>
              <!-- BOTONES -->
              <br>
              <input type ="submit" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" class="btn btn-success" value="Guardar">
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
        </div>




          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
        
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Todos los Derechos reservados  <strong>ADDIM</strong>. 
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
         
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>


  <script type="text/javascript">



    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'BIENVENIDO A ADDIM!',
        // (string | mandatory) the text inside the notification
        text: ' BIENVENIDO AL SISTEMA DE REGISTRO FENAFH',
        // (string | optional) the image to display on the left
        image: 'img/user.png',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
