<html>

<head>

</head>

<body>

<?php 
include('../conexion/connect_db.php');
$id = intval($_GET['id']);
$sql = mysqli_query($mysqli, "SELECT * FROM tbl_subcategorias WHERE ID_SUBCATEGORIA='$id'");
if(mysqli_num_rows($sql) == 0){       
}else{
$row = mysqli_fetch_assoc($sql);
}    
?>

<form id="formactsubcategorias" method= "post" action="subcategoria/actualizar_subcategoria.php" autocomplete="off" onpaste="return false" oncopy="return false">
          
          <div class="container">
              <input  hidden value="<?php echo $row['ID_SUBCATEGORIA']; ?>"  name="id" id="id" >  
              <CENTER><h3> MODIFICAR SUB-CATEGORIA</h3></CENTER>                                            
              <div class="form-group col-sm-6">
                     <label class="control-label" for="nombre">Nombre de SubCategoria</label> 
                     <input value="<?php echo $row['NOM_SUBCATEGORIA']; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" placeholder="Nombre de SubCategoria" id="nombresubcategoria" name="nombresubcategoria" required="">
              </div> 

                <br><br><br><br><br><br>

               <div class="form-group col-sm-4">
                               <input type="radio" name="radio" id="edad" value="1" onclick="activar1()">
                               <label for="edadminima">Edad</label>
                              <input type="text" class="form-control" disabled="disabled"  onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Edad Minima" id="edadminima" name="edadminima"  onkeypress="return validanumeros(event)" >                                                                  
                                <br>
                               <input type="text" class="form-control" disabled="disabled"  onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Edad Maxima" id="edadmaxima" name="edadmaxima"  onkeypress="return validanumeros(event)" >                                                                  
                                                                
                            </div>

                           <div class="form-group col-sm-4">
                                <input type="radio" name="radio" id="peso" value="2" onclick="activar2()">
                                <label for="peso">Peso (Kg)</label>
                                <input type="text" class="form-control" placeholder="Peso Minimo" disabled="disabled" name="pesominimo" id="pesominimo" pattern="[0-9]{2}.[0-9]{2}" onkeypress="return validanumeros(event)">
                                 <br>
                                <input type="text" class="form-control" placeholder="Peso Maximo" disabled="disabled" name="pesomaximo" id="pesomaximo" pattern="[0-9]{2}.[0-9]{2}" onkeypress="return validanumeros(event)">
                                 
                           </div>



                          <div class="form-group col-sm-4">
                              <input type="radio" name="radio" id="altura" value="3" onclick="activar3()">
                              <label for="altura">Altura</label>
                              <input type="text" class="form-control" placeholder="Altura Minima" name="alturaminima" disabled="disabled" id="alturaminima" onkeypress="return validanumeros(event)">
                              <br>
                              <input type="text" class="form-control" placeholder="Altura Maxima" name="alturamaxima" disabled="disabled" id="alturamaxima" onkeypress="return validanumeros(event)">

                          </div>

            
              <div class="form-group col-sm-10"> 
                   <label  class="control-label" for="descripcion">Descripcion</label> 
                   <input value="<?php echo $row['OBS']; ?>" id="Descripcion" name="Descripcion" rows="10" cols="65" onpaste="return false" class="form-control" >
              </div>
              <center>
                    <input type="submit" value="Guardar" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" name="Guardar" id="Guardar" class="btn btn-success">
                    <a href="plantilla.php" class="btn btn-danger" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;">Cancelar</a>     
               </center> 
        </div>
</form>                                   
</body>
<script>
//VALIDACIÓN DE FORMULARIOS
$.validator.setDefaults({
    submitHandler: function () {
        form.submit();
    }
});
// VALIDACIONES DEL FORMULARIO CREAR CATEGORIAS
$(document).ready(function () {
  $("#formactsubcategorias").validate({
    rules: {
      Nombre_categoria: { 
          min:1
        },
      nombresubcategoria: "required",
      
      Descripcion: {
        required: true,
        rangelength: [0, 1000]
      },
    },
    messages: {
      Nombre_categoria:"Seleccione una Categoria",
      nombresubcategoria: "Por favor, ingrese el nombre de la subcategoría.",
       
      Descripcion: {
        maxlength:"Por favor, no escriba menos de 5 dígitos"
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

<script type="text/javascript">
function activar1(){

var primero=document.getElementById("edadminima").disabled= false;
var segundo=document.getElementById("edadmaxima").disabled= false;
var tercero=document.getElementById("pesominimo").disabled= true;
var cuarto=document.getElementById("pesomaximo").disabled= true;
var quinto=document.getElementById("alturaminima").disabled= true;
var sexto=document.getElementById("alturamaxima").disabled= true;


}
function activar2(){
var primero=document.getElementById("edadminima").disabled= true;
var segundo=document.getElementById("edadmaxima").disabled= true;
var tercero=document.getElementById("pesominimo").disabled= false;
var cuarto=document.getElementById("pesomaximo").disabled= false;
var quinto=document.getElementById("alturaminima").disabled= true;
var sexto=document.getElementById("alturamaxima").disabled= true;

}
function activar3(){
var primero=document.getElementById("edadminima").disabled= true;
var segundo=document.getElementById("edadmaxima").disabled= true;
var tercero=document.getElementById("pesominimo").disabled= true;
var cuarto=document.getElementById("pesomaximo").disabled= true;
var quinto=document.getElementById("alturaminima").disabled= false;
var sexto=document.getElementById("alturamaxima").disabled= false;

}
</script>

</html>