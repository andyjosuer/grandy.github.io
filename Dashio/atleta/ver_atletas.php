<?php 

   include('../consultas/consultas.class.php');
   $obj= new DbModelo();



 $consulta=$obj->get_tabla("SELECT * FROM tbl_atletas
INNER JOIN tbl_personas ON tbl_personas.ID_PERSONA = tbl_atletas.ID_PERSONA
INNER JOIN tbl_inscripcion ON tbl_inscripcion.ID_ATLETA = tbl_atletas.IDENT_ATLETA
INNER JOIN tbl_inscripcion_subcategoria ON tbl_inscripcion_subcategoria.ID_INSCRIPCION = tbl_inscripcion.ID_INSCRIPCION
INNER JOIN tbl_ciudad ON tbl_ciudad.ID_CIUDAD = tbl_personas.ID_CIUDAD
INNER JOIN tbl_estado ON tbl_estado.ID_ESTADO = tbl_personas.ID_ESTADO
INNER JOIN tbl_subcategorias ON tbl_subcategorias.ID_SUBCATEGORIA = tbl_inscripcion_subcategoria.ID_SUBCATEGORIA
WHERE tbl_personas.ID_ESTADO = 1");






//  inicio de codigo html primero boton agregar atletas.
//----------despues tabla donde iran los datos de la consulta.

 ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.css"/>
	<!-- El CSS de Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">-->
</head>

 <div class="col-lg-12">
  <center><h3>ATLETAS PRE-INSCRITOS</h3></center>
                        <div class="card">
                            <div class="card-body">
         <div class="table-responsive ">
           
            <table id="tabla_atletas" class="table table-bordered table-hover ">
                

<br>
<br>

               <a  href="javascript:void(0)"  onclick="get_html(this,'atleta/atleta_nuevo.php','Crear Atletas')"  title="Agregar Atleta" class="btn btn-sm btn-success"> <i class="    fa fa-plus-square"></i> Nuevo atleta </a>

<br>
<br>



               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Identidad</th>
                     <th>Nombre Atleta</th>
                     <th>Gimnasio</th>
                     <th>Ciudad</th>
                      <th>Categoria 1</th>
                      <th>Categoria 2</th>
                     <th>Peso</th>
                     <th>Edad</th>
                     <th>Estatura</th>
                     <th>Estado</th>
                     <th>Acciones</th>
                     

                  </tr>
               </thead>
               <tbody >
                  <?php 
                     $i=0;
                        while($row = mysqli_fetch_assoc($consulta)){

                          
                            $fecha = $row['FEC_NAC'];
                            $nac = time() - strtotime($fecha);
                            $edad = floor($nac / 31556926); 

                            $subcategoria2 = $row['ID_SUBCATEGORIA2'];
                            $sub2 =$obj->get_tabla ("SELECT tbl_subcategorias.NOM_SUBCATEGORIA FROM tbl_inscripcion_subcategoria
                            INNER JOIN tbl_subcategorias ON tbl_subcategorias.ID_SUBCATEGORIA = tbl_inscripcion_subcategoria.ID_SUBCATEGORIA2
                            WHERE tbl_subcategorias.ID_SUBCATEGORIA = '$subcategoria2'");
                            $rowsub = mysqli_fetch_assoc($sub2);
                            ?>

                        <center>
                  <tr style="   color:black;">
                    
                     <th scope="row"><?=$i+1?></th>
                     <td><?=$row['IDENTIDAD']?></td>
                     <td ><?=$row['PRIMER_NOMBRE']?> <?=$row['SEGUNDO_NOMBRE']?> <?=$row['PRIMER_APELLIDO']?> <?=$row['SEGUNDO_APELLIDO']?></td>
                     <td><?=$row['NOM_GYM']?></td>
                      <td><?=$row['NOM_CIUDAD']?></td>
                      <td><?=$row['NOM_SUBCATEGORIA']?></td>
                      <td><?=$rowsub['NOM_SUBCATEGORIA']?></td>
                      <td><?=$row['PESO']?></td>
                      <td><?php echo $edad?></td>
                      <td><?=$row['ALTURA']?></td>
                      <td><?=$row['NOM_ESTADO']?></td>

                     <td style="width: 127.4583px;">
                  
                     
                     <a href="javascript:void(0)"  onclick="get_html(this,'atleta/modificar_atletas2.php?id=<?=$row['IDENT_ATLETA']?>&cate=<?=$row['ID_SUBCATEGORIA']?>','Modificar Atletas');" title="Editar Datos" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>
                     <a  title="Eliminar" class="btn btn-sm btn-danger"> <i class="fa fa-power-off"></i> </a>
                     
                     </td>
                   
                  </tr>
                  </center>
                  <?php $i++ ?>
                  <?php } ?>
               </tbody>
            </table>
         </div>
   </div>
                        </div>
                    </div>


<script type="text/javascript">

	//funcion  que hace que la tabla sea dinamica y este en espanol.( nombre de la tabla tabla_personas)

   $(document).ready( function () {
      $('#tabla_atletas').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    } );
       
       
   });



</script>