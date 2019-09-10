<html>
<head>
<?php 
error_reporting(0);
    include('../consultas/consultas.class.php');
   $obj= new DbModelo();
 $consulta=$obj->get_tabla("SELECT  tbl_eventos.ID_EVENTO ,tbl_eventos.NOM_EVENTO, tbl_eventos.LUGAR_EVENTO, tbl_eventos.DESCRIPCION, tbl_subcategorias.NOM_SUBCATEGORIA,tbl_eventos.FEC_INICIAL,tbl_eventos.FEC_FINAL, tbl_eventos.DESCRIPCION, tbl_categorias.NOM_CATEGORIA, tbl_subcategorias.ID_SUBCATEGORIA FROM tbl_eventos 
INNER JOIN tbl_categoria_evento ON tbl_categoria_evento.ID_EVENTO =tbl_eventos.ID_EVENTO
INNER JOIN tbl_subcategorias ON tbl_subcategorias.ID_SUBCATEGORIA = tbl_categoria_evento.ID_SUBCATEGORIA
INNER JOIN tbl_categorias ON tbl_subcategorias.ID_CATEGORIA = tbl_categorias.ID_CATEGORIA
WHERE tbl_eventos.ID_ESTADO = 1;");
if(mysqli_num_rows($consulta) == 0){ 
    echo "<center><h1> No hay eventos disponibles.!</h1></center>"; 
}else{
 
 $row = mysqli_fetch_assoc($consulta); 
}


include ("../conexion/connect_db.php");


?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
          
  <body>
    <center>
        <h1> <?php echo $row['NOM_EVENTO']; ?></h1>
        
        <h5> <?php echo $row['LUGAR_EVENTO']; ?></h5>
        
        <label >FECHA INICIAL : <?php echo $row['FEC_INICIAL']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        <label >FECHA FINAL : <?php echo $row['FEC_FINAL']; ?></label>
        <h5> <?php echo $row['DESCRIPCION']; ?></h5>
    </center>
        <a href="javascript:void(0)"  onclick="get_html(this,'evento/categorias_eventos.php','Agregar Evento');"    href="categorias_eventos.php" title="Agregar Categorías" class="btn btn-sm btn-success"> <i class="    fa fa-plus-square"></i> Agregar Categorías</a>
        <br><br>
        <table id="tabla_eventos" class="table table-bordered table-hover ">
               <thead>
                  <tr>
                      <th>Número</th>
                      <th>Nombre Modalidad</th>
                      <th>Nombre Categoría</th>
                      <th>Desactivar</th>
                      
                  </tr>
               </thead>
               <tbody >
                  <?php 
                     $i=0;
                        while($row = mysqli_fetch_assoc($consulta)){?>
                        <center>
                        <tr style="   color:black;">
                        <th scope="row"><?=$i+1?></th>
                        <td><?=$row['NOM_CATEGORIA']?></td>
                        <td><?=$row['NOM_SUBCATEGORIA']?></td>
                          <td style="width: 127.4583px;">
                   
                        <a href="javascript:void(0)" name="borrar" id="borrar" onclick="get_html(this,'evento/desactivarcategoria.php?id=<?=$row['ID_SUBCATEGORIA']?>&idevento=<?=$row['ID_EVENTO']?>','Desactivar');"  title="Desactivar Categorìa" class="btn btn-sm btn-danger"> <i class="fa fa-power-off"></i> </a>
                       <input  hidden   value="<?php echo $row['ID_EVENTO']; ?>"  name="idevento" id="idevento"  >
                       
                       <input hidden  value="<?php echo $row['ID_SUBCATEGORIA']; ?>"  name="id" id="id"  >
                   
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
      $('#tabla_eventos').DataTable( {
        "language": {
          //Direccion donde se encuentra la plantilla dinamica
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    } );
       
       
   });

</script>
</html>
 <!--<a href="javascript:void(0)"  onclick="get_html(this,'evento/desactivarcategoria.php?id=<?=$row['ID_SUBCATEGORIA']?>&idevento=<?=$row['ID_EVENTO']?>','Desactivar');" title="Desactivar Categoria" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>-->
