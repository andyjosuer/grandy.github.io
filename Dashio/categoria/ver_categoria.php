<html>
<head>
<?php 

   include('../consultas/consultas.class.php');
   $obj= new DbModelo();
   $consulta=$obj->get_tabla("SELECT tbl_genero.NOM_GENERO, tbl_categorias.* FROM tbl_categorias 
INNER JOIN tbl_genero ON tbl_genero.ID_GENERO = tbl_categorias.ID_GENERO");
 ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body> 
  <center><h3>MODALIDADES</h3></center>

       <table id="tabla_categorias" class="table table-bordered table-hover ">
       <a href="javascript:void(0)"  onclick="get_html(this,'categoria/agregar_categoria.php','Agregar categoria');"    href="ui-button.html" title="Agregar Categoria" class="btn btn-sm btn-success"> <i class="    fa fa-plus-square"></i> Nueva Categoria </a>
              <br><br>
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Nombre de Categoria</th>
                     <th>Genero</th>
                      <th>Observaciones</th>
                     <th>Acciones</th>
                  </tr>
               </thead>

               <tbody >
                  <?php 
                     $i=0;
                        while($row = mysqli_fetch_assoc($consulta)){?>
                    <center>
                       <tr style="   color:black;">
                       <th scope="row"><?=$i+1?></th>
                       <td ><?=$row['NOM_CATEGORIA']?></td>
                       <td ><?=$row['NOM_GENERO']?></td>
                       <td><?=$row['OBS']?></td>
                        <td style="width: 127.4583px;">               
                           <a href="javascript:void(0)"  onclick="get_html(this,'categoria/modificar_categoria.php?id=<?=$row['ID_CATEGORIA']?>','Modificar categoria');" title="Editar datos" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>
                           <a  title="Eliminar" class="btn btn-sm btn-danger"> <i class="fa fa-power-off"></i> </a>
                        </td>
                        </tr>
                  </center>
                      <?php $i++ ?>
                      <?php } ?>
               </tbody>
          </table>
  </body>



<script type="text/javascript">

	//funcion  que hace que la tabla sea dinamica y este en espanol.( nombre de la tabla tabla_personas)

   $(document).ready( function () {
      $('#tabla_categorias').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    } );   
       
   });
</script>
</html>