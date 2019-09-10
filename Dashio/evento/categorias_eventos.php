<html>
<?php 
 include("../conexion/connect_db.php");

$query = "SELECT * FROM tbl_eventos where ID_ESTADO=1";
$resultado=$mysqli->query($query);

include('../consultas/consultas.class.php');
$obj= new DbModelo();
$consulta = $obj -> get_tabla("SELECT ID_SUBCATEGORIA, NOM_SUBCATEGORIA FROM tbl_subcategorias where ID_ESTADO=3 ");


 ?>
 <head>
 <script type="text/javascript" src="evento/validacionevento.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>

<form id="agregarcategoriaevento" action="evento/agregar.php" method="post" >
    <CENTER>
                    <h3 class="white-text"> AGREGAR CATEGORIAS AL EVENTO</h3>
                    </CENTER>

          <div class="container">
                  

                   <div class="form-group col-sm-6">
                   <label label class="control-label"  for="val-username">EVENTO</label>
                   <select  class="form-control" name="Nombre_evento" id="Nombre_evento" required="">

                   <option value="0"> Seleccione un evento:</option>   
                   <?php while($row = $resultado->fetch_assoc()) { ?>
                    <option value="<?php echo $row['ID_EVENTO']; ?>"><?php echo $row['NOM_EVENTO']; ?></option>
                    <?php } ?>
                    </select>
                    
           </div > 
           </div>
           
     <div class="form-group col-sm-10">
    <table id="tabla_eventos" class="table table-bordered table-hover ">
                 <br><br>
                 <thead>
                  <tr>
                     
                     <th>Numero</th>
                     <th>Nombre de Categoría</th>
                     <th>Acciones</th>

                      
                  </tr>
                </thead>
                 <tbody >
                    <?php 
                     $i=1;
                     while($row = mysqli_fetch_assoc($consulta)){?>
                     <center>
                   <tr style="color:black;">
                    <td ><?=$row['ID_SUBCATEGORIA']?></td>
                    <td ><?=$row['NOM_SUBCATEGORIA']?></td>
                    <td style="width: 127.4583px;">  
                    <input type = "checkbox"  name = "IDS_SUBCATEGORIA[]"  id= "IDS_SUBCATEGORIA[]" class="chk-box"  value=  "<?php echo $row['ID_SUBCATEGORIA']; ?>" />
                               </td>
                   
                  </tr>
                  </center>
                  <?php $i++ ?>
                  <?php } ?>
               </tbody>
            </table>
                </div>   
            <div class="form-group col-sm-10">
         <center>
        <input type="submit" value="GUARDAR" name"button1" id="button1"  style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" class="btn btn-success" >
         <a href="plantilla.php" class="btn btn-danger" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;">CANCELAR</a>
         </center>
         </div>

  
</form>

</body>


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

<script type="text/javascript">
$.validator.setDefaults({
    submitHandler: function () {
        form.submit();
    }
});



// VALIDACIONES DEL FORMULARIO CREAR CATEGORIAS
$(document).ready(function () {
    $("#agregarcategoriaevento").validate({
        rules: {
            
            Nombre_evento: {

                
                min:1

                 },
            IDS_SUBCATEGORIA: {
                
                min:1
            
                
           },
        },
        messages: {
           
            Nombre_evento: {
               
                min:"Debe seleccionar una evento.!"
                
           },
            IDS_SUBCATEGORIA: {
                
                min:"Debe seleccionar minimo una categoría.!"
            
                
           },

            
        },
        errorElement: "em",
            errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            // } );
    });
});

</script>
</html>