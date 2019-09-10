<!DOCTYPE html>
<html lang="es">

<head>

  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Sistema FENAFH</title>
  <!-- Icono de Pestaña -->
   <link rel="shortcut icon" type="image/x-icon" href="../img/fenafh.ico">
  <!-- *********** librerias de bootstrap **************-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap-yeti.css">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
  <script type="text/javascript" src="atleta/funciones_atletas.js"></script>
  <?php /*include "funcion.php"; */?>

</head>
<?php 
        session_start();
  if (empty($_SESSION['active']))
   {
    header("Location: ../Login/index.php");
    //echo "Usuario no ingresado";
   }else{
 
?>

      <section id="container">
           <!-- ************************************BARRA DE MENU********************************************************* -->
            <header class="header black-bg">
              <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Esconder / Desplegar Menu"></div>
              </div>
              <!--Letras de Fenafh-->
                    <a href="plantilla.php" class="logo"><b>FENA<span>FH</span></b></a>
                    
              <div class="nav notify-row" id="top_menu">
              <!--  notification start -->
                    <ul class="nav top-menu">
                    </ul>
                <!--  notification end -->
              </div>
              <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                      <li><a href="cerrar_sesion.php" >CERRAR SESION</a> </li>
                    </ul>
              </div>
            </header>
     <body style="background-color:white;">

    <!--<div class="bg-img" style="background-image: url('../img/azul.jpg');">  -->

    <!-- ****************************************************MENU VERTICAL************************************************************** -->
    <!--Foto de Perfil del Sistema-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered"><a href="#"><img src="img/user.png" class="img-circle" width="80"></a></p>
                
                <!--<h5 class="centered">ADDIM</h5>-->
                <h5 class="centered"> <?php echo $_SESSION['nombre_usuario'] .' - ' . $_SESSION['ID_TIP_USUARIO']; ?></h5>
                <li class="mt">
                  <a class="active" href="plantilla.php">
                      <i class="fa fa-home"></i>
                      <!--Menu vertical-->
                      <span>Inicio</span>
                  </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-address-card"></i>
                        <span>Seccion Atletas</span>
                    </a>
                    <ul class="sub">
                        <li><a href="javascript:void(0)" class="a_menu" id="ver_atleta" onclick="get_html(this,'atleta/ver_atletas.php','Ver Atletas');"  >Ver Atletas Inscritos</a></li>
                        <li><a href="javascript:void(0)" class="a_menu" id="insc_atleta" onclick="get_html(this,'atleta/atleta_nuevo.php','Crear Atletas');">Agregar Nuevo Atleta</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-dumbbell"></i>
                        <span>Seccion Modalidades</span>
                    </a>
                    <ul class="sub">
                     
                         <li><a href="javascript:void(0)" class="a_menu" id="crea_categoria" onclick="get_html(this,'categoria/crear_categoria.php','Ver Categoria');" >Agregar Nueva Modalidad</a></li>
                         <li><a href="javascript:void(0)" class="a_menu" id="crea_subcategoria" onclick="get_html(this,'subcategoria/crear_subcategorias.php','Ver Categoria');">Agregar Nueva Categoria</a></li>
                         <li><a href="javascript:void(0)" class="a_menu" id="ver_categoria" onclick="get_html(this,'categoria/ver_categoria.php','Ver Categoria');"  >Ver Modalidad</a></li>
                         <li><a href="javascript:void(0)" class="a_menu" id="ver_subcategoria" onclick="get_html(this,'subcategoria/ver_subcategoria.php','Ver subCategoria');"  >Ver Categorias</a></li>
                     </ul>
                </li>
                <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-calendar"></i>
                            <span>Eventos</span>
                        </a>
                        <ul class="sub">
                           <li><a href="javascript:void(0)" class="a_menu" id="crea_evento" onclick="get_html(this,'evento/crear_evento.php','Ver Categoria');">Crear Nuevo Evento</a></li>
                          <li><a href="javascript:void(0)" class="a_menu" id="agregarcate_evento" onclick="get_html(this,'evento/categorias_eventos.php','Agregar Categoria a Evento');">Agregar Categorías a Evento</a></li>
                          <li><a href="javascript:void(0)" class="a_menu" id="crea_evento" onclick="get_html(this,'evento/ver_evento_con_categoria.php','Ver evento con Categoria');">Ver evento con Categorías</a></li>
                           <li><a href="javascript:void(0)" class="a_menu" id="evento_activo" onclick="get_html(this,'evento/evento_activos.php','Evento Activo');">Eventos Activos</a></li>

                        </ul>
                </li>
                <?php 
                  if ($_SESSION['ID_TIP_USUARIO'] == 1) {
                ?>
                <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-lock"></i>
                            <span>Seguridad</span>
                        </a>
                        <ul class="sub">
                            <li><a href="javascript:void(0)" class="a_menu" id="ver_personas" onclick="get_html(this,'personas/crear_persona.php','Ver Categoria');">Crear Personas</a></li>
                            <li><a href="javascript:void(0)" class="a_menu" id="ver_usuarios" onclick="get_html(this,'usuario/ver_usuario.php','Ver Categoria');">Ver Usuarios</a></li>
                            <!--<li><a href="#">Roles</a></li>
                            <li><a href="#">Permisos</a></li>
                            <li><a href="#">Bitacora</a></li>
                            <li><a href="javascript:void(0)" class="a_menu" id="ver_bitacora" onclick="get_html(this,'bitacora/ver_bitacora.php','Ver Categoria');">Bitacora</a></li>-->
                        </ul>
                </li>
                <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-file-signature"></i>
                          <span>Mantenimientos</span>
                      </a>
                      <ul class="sub">
                          <li><a href="javascript:void(0)" class="a_menu" id="ver_personas" onclick="get_html(this,'personas/ver_persona.php','Ver Categoria');">Ver Personas</a></li>
                          <!--<li><a href="#">Responsive Table</a></li>
                          <li><a href="#">Advanced Table</a></li>-->
                      </ul>
                </li>
                 <?php } ?>
              </div>
        </aside>
        <!--main content start-->
           <br> <br> <br>

            <section id="main-content">
              <section class="wrapper" style="min-height: 650px">
                <div id="cont_principal"  class="row">
                <!-- ********************************/ESPACIO DE TRABAJO ********************************** -->   
     

                </div>
              </section>
            </section>
         <!-- ******************************************Panel inferior*********************************** -->
        <!--mensaje de derechos reservados-->
        <footer class="site-footer">
              <div class="text-center">
                <p>
                  &copy; Todos los Derechos reservados  <strong>ADDIM</strong>. 
                </p>
                <div class="credits">
                </div>
                <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
                  </a>
              </div>
        </footer>
      </body>
  </section>
  <?php } ?>
    <!--******************************************* Librerias de jquery ********************************************--> 
<script src="lib/jquery/jquery.min.js"></script>

<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="lib/jquery.sparkline.js"></script>
<script src="lib/common-scripts.js"></script>
<script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="lib/gritter-conf.js"></script>
<script src="lib/sparkline-chart.js"></script>
<script src="lib/zabuto_calendar.js"></script>
<script src="lib/jquery/jquery.validate.min.js"></script>
<script src="lib/jquery/messages_es.min.js"></script>

<script src="js/categorias.js"></script>
<!-- <script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/messages_es.min.js"></script>   -->

<!--******************** Mesaje de bienvenida ***********************-->>
  <script type="text/javascript">

    $(document).ready(function() {
      var unique_id = $.gritter.add({
        title: 'BIENVENIDO A ADDIM!',
        text: ' BIENVENIDO AL SISTEMA DE REGISTRO FENAFH ',
        image: 'img/user.png',
        sticky: false,
        time: 8000,
        class_name: 'my-sticky-class'
      });

      return false;
    });

      </script>

     <script type="text/javascript">
        function get_html(t,url,tit,id) {
            var a_todos =document.querySelectorAll('#sidebarnav .a_menu')
            for (var i = 0; i < a_todos.length; i++) {
            a_todos[i].className="a_menu";
            }
            t.className+=' active';
           $.get(url, function( r ) {
              
              $("#cont_principal").html(r); 
                      }); 
        }

      </script>

</html>
 <!-- *************funciones validacion de letras o numeros*****************-->

<script>
function validanumeros(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
       // Patron de entrada, en este caso solo acepta numeros y punto
    patron =/[0-9-.]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>



<script>

function validaletras(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta letras tanto mayusculas como minusculas 
    patron = /[A-Za-z]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>

<?php 
/*
  date_default_timezone_set('America/Guatemala');
  function fechaC(){
    $mes = array("","Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre");
    return date('d')." de ". $mes[date('n')] . " de " . date('Y');
  }
 */
?>