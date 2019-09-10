
<?php
header('Content-type: application/json; charset=utf-8'); // CODIFICACION PARA DEVOLVER ARREGLOS JSON
// PARA QUE SE ACEPTEN SOLO PETICIONES DE TIPO AJAX
include "atleta/funciones_atletas.js";
session_start();

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
include "../conexion/connect_db.php";
  if (isset($_POST['hacer'])) {
    switch ($_POST['hacer']) {


/////////////////////////////////////     CASE DE AVTIALIZAR PARAMETROS        /////////////////////////////////////////////////////////////////7
case 'actualizar_atleta':

  

  $id = $_POST['id'];

  $pnombre  = $_POST['PNom_atleta'];

  $snombre  = $_POST['SNom_atleta'];

  $papellido  = $_POST['PApellido_atleta'];

  $sapellido  = $_POST['SApellido_atleta'];

  $dep  = $_POST['Depto_atleta'];

  $ciudad = $_POST['Ciudad_atleta'];

  $genero = $_POST['Genero_atleta'];

  $civil  = $_POST['Ecivil_atleta'];

  $correo = $_POST['correo_atleta'];

  $identidad  = $_POST['Identidad_atleta'];

  $fecha  = $_POST['fecha_atleta'];

  $peso = $_POST['peso'];

  $altura = $_POST['altura'];

  $estado = $_POST['Estado'];

  $telefono = $_POST['tel_atleta'];

  $telefono2 = $_POST['tel_em'];

  $responsable = $_POST['respon_atleta'];

  $gym  = $_POST['Gimnasio_atleta'];

  $categoria  = $_POST['categoria'];

  $cat1= $_POST['subcategoria'];

  $cat2= $_POST['subcategoria2'];

  $direccion  = $_POST['direc_atleta'];


//Calcular la edad actual del atleta
    $hoy = new DateTime();
    @$edad = $hoy->diff(@$fecha);

//Traer la identidad del atleta fk
$sql = mysqli_query($mysqli, "SELECT * FROM tbl_atletas WHERE ID_PERSONA='$id'");

       if(mysqli_num_rows($sql) == 0){
        
      }else{
        $roW_1 = mysqli_fetch_assoc($sql);
        $atleta1= $roW_1['IDENT_ATLETA'];
      }


          
//CODIGO PARA TRAER PERSO Y ALTURA DE LA TABLA SUB CATEGORIA
        
 $traer_subcategoria1 = mysqli_query($mysqli, "SELECT * FROM tbl_subcategorias WHERE ID_SUBCATEGORIA='$cat1' ");

       if(mysqli_num_rows($traer_subcategoria1) == 0){
        
      }else{
        $roW_1 = mysqli_fetch_assoc($sql);
        $edad_min_cat1= $roW_1['edad_min'];
        $edad_max_cat1= $roW_1['edad_max'];

        $altura_min_cat1= $roW_1['altura_min'];
        $altura_max_cat1= $roW_1['altura_max'];
        $peso_min_cat1= $roW_1['peso_min'];
        $peso_max_cat1= $roW_1['peso_max'];

     
      }
print_r($traer_subcategoria1);

 $traer_subcategoria2 = mysqli_query($mysqli, "SELECT * FROM tbl_subcategorias WHERE ID_SUBCATEGORIA='$cat2' ");

       if(mysqli_num_rows($traer_subcategoria2) == 0){
        
      }else{
        $roW_1 = mysqli_fetch_assoc($sql);
        $edad_min_cat2= $roW_1['edad_min'];
        $edad_max_cat2= $roW_1['edad_max'];
        $altura_min_cat2= $roW_1['altura_min'];
        $altura_max_cat2= $roW_1['altura_max'];
        $peso_min_cat2= $roW_1['peso_min'];
        $peso_max_cat2= $roW_1['peso_max'];

     
      }

      


 //Condicion antes de insert       
     

      if($edad>=$edad_min_cat1 && $edad<=$edad_max_cat1){


        $a_r['msg'] = "La edad no cumple los requisitos." ;
        $a_r['ingreso'] = "no" ;
        $a_r['color_alerta'] = "alert-warning";


      }else if ($altura>=$altura_min_cat1 && $altura<=$altura_max_cat1) {
        $a_r['msg'] = "La altura no cumple los requisitos." ;
        $a_r['color_alerta'] = "alert-warning";
        $a_r['ingreso'] = "no" ;



      }else if ($peso>=$peso_min_cat1  && $peso<=$peso_min_cat1) {
        $a_r['ingreso'] = "no " ;
        $a_r['msg'] = "El peso no cumple los requisitos." ;
        $a_r['color_alerta'] = "alert-warning";

      }


      echo json_encode($a_r);
      break;
////////////////////////////////////////////////////        CIERRE DEL CASE ACTUALIZAR CATEGORIA        //////////////////////////////////////////////////////




      default:
        # code...
        break;
    } //cierre del switch
  }
}

?>
