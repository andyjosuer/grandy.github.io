<?php 
 include('../consultas/consultas.class.php');
 $obj= new DbModelo();
 $consulta=$obj->get_tabla("SELECT * FROM tbl_eventos WHERE ID_ESTADO=3;");



 ?>
 <head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.css"/>
	<!-- El CSS de Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">-->
</head>
<form method="POST">

    <div class="col-lg-12">
       <div class="card">
          <div class="card-body">
             <div class="table-responsive ">
                <table id="tabla_eventos" class="table table-bordered table-hover ">
                 <br><br>
                 <a href="javascript:void(0)"  onclick="get_html(this,'evento/crear_evento.php','Agregar Evento');"    href="crear_evento.php" title="Agregar Evento" class="btn btn-sm btn-success"> <i class="    fa fa-plus-square"></i> Nuevo Evento </a>
                 <br><br>
                 <thead>
                  <tr>
                     <th>ID</th>
                     <th>Nombre del Evento</th>
                     <th>Fecha Inicial del Evento</th>
                     <th>Fecha Final del Evento</th>
                      <th>Lugar del Evento</th>
                      <th>Descripción</th>
                       <!--<th>Estado</th>-->
                      <th>Acciones</th>
                  </tr>
                </thead>
                 <tbody >
                    <?php 
                     $i=0;
                     while($row = mysqli_fetch_assoc($consulta)){?>
                     <center>
                   <tr style="   color:black;">
                    <!-- <th scope="row"><?=$i+1?></th>-->
                    <td ><?=$row['ID_EVENTO']?></td>
                     <td ><?=$row['NOM_EVENTO']?></td>
                     <td><?=$row['FEC_INICIAL']?></span></td>
                      <td><?=$row['FEC_FINAL']?></span></td>
                             <td><?=$row['LUGAR_EVENTO']?></span></td>
                             <td><?=$row['DESCRIPCION']?></span></td>
                            <!-- <td><?=$row['ID_ESTADO']?></span></td>-->
                            
                     <td style="width: 127.4583px;">
                     <a href="javascript:void(0)"  onclick="get_html(this,'evento/modificar_evento.php?id=<?=$row['ID_EVENTO']?>','Modificar evento');"  title="Editar datos" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>
                     <a href="javascript:void(0)" name="borrar" id="borrar" onclick="get_html(this,'mantenimiento/borrar_evento.php?id=<?=$row['ID_EVENTO']?>','Eliminar Evento');" title="Eliminar" class="btn btn-sm btn-danger"> <i class="fa fa-power-off"></i> </a>
                     <!--<input   value="<?php echo $row['ID_EVENTO']; ?>"  name="id" id="id"  >-->


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

</form>


<script type="text/javascript">

	//funcion  que hace que la tabla sea dinamica y este en espanol.( nombre de la tabla )

   $(document).ready( function () {
      $('#tabla_eventos').DataTable( {
        "language": {
          //Direccion donde se encuentra la plantilla dinamica
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    } );  
   });
</script>
