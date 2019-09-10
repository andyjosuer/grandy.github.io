<html>

<head>
<script type="text/javascript" src="subcategoria/validacion_datosiguales.js"></script>
</head>

<body>
 <?php include('../conexion/connect_db.php');?>
       <form id="formregsubcategorias"  action="subcategoria/insertar_subcategoria.php" method= "POST" autocomplete="off" onpaste="return false" oncopy="return false">
          <CENTER>
          <h3 class="white-text"> AGREGAR SUB-CATEGORIA</h3>
          </CENTER> 
          <br><br>   
                     <div class="container ">
                          <div class= "form-group col-sm-5">
                              <label   for="nombresubcate"> Nombre de Categoria</label>
                              <select  class="form-control" name="Nombre_categoria" id="Nombre_categoria" required>
                                      <option value="0"> Seleccione una opcion:</option>
                                      <?php        
                                      $query = "SELECT * FROM tbl_categorias";
                                      $result = mysqli_query($mysqli, $query) or die("Ocurrio un error en la consulta SQL");
                                      while (($fila = mysqli_fetch_array($result)) != NULL) {
                                      echo '<option value="'.$fila["ID_CATEGORIA"].'">'.$fila["NOM_CATEGORIA"].'</option>';
                                      }
                                     ?>
                               </select>
                           </div>

                           <div class="form-group col-sm-5">
                                       <label class="control-label"  for="nombrecate">Nombre de Sub-Categoria</label>
                                       <input  class="form-control" placeholder="Nombre de subcategoría" onkeyup="javascript:this.value=this.value.toUpperCase();"  placeholder="Nombre de SubCategoria" id="nombresubcategoria" name="nombresubcategoria" required="">
                                     
                           </div>
                           <br><br><br> <br>
                           <div class="form-group col-sm-3">
                               <input type="radio" name="radio" id="edad" value="1" onclick="activar1()">
                               <label for="edadminima">Edad</label>
                              <input type="text" class="form-control" disabled="disabled"  onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Edad Minima" id="edadminima" name="edadminima"  onkeypress="return validanumeros(event)" >                                                                  
                                <br>
                               <input type="text" class="form-control" disabled="disabled"  onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="input-block-level" placeholder="Edad Maxima" id="edadmaxima" name="edadmaxima"  onkeypress="return validanumeros(event)" ></input>                                                                  
                               <span class="validacion "> </span>                             
                            </div>

                           <div class="form-group col-sm-3">
                                <input type="radio" name="radio" id="peso" value="2" onclick="activar2()">
                                <label for="peso">Peso (Kg)</label>
                                <input type="text" class="form-control" placeholder="Peso Minimo" disabled="disabled" name="pesominimo" id="pesominimo" pattern="[0-9]{2}.[0-9]{2}" onkeypress="return validanumeros(event)">
                                 <br>
                                <input type="text" class="form-control" placeholder="Peso Maximo" disabled="disabled" name="pesomaximo" id="pesomaximo" pattern="[0-9]{2}.[0-9]{2}" onkeypress="return validanumeros(event)">
                                 
                           </div>



                          <div class="form-group col-sm-3">
                              <input type="radio" name="radio" id="altura" value="3" onclick="activar3()">
                              <label for="altura">Altura</label>
                              <input type="text" class="form-control" placeholder="Altura Minima" name="alturaminima" disabled="disabled" id="alturaminima" onkeypress="return validanumeros(event)">
                              <br>
                              <input type="text" class="form-control" placeholder="Altura Maxima" name="alturamaxima" disabled="disabled" id="alturamaxima" onkeypress="return validanumeros(event)">

                          </div>


                          <div class="form-group col-sm-11">
                                 <label for="Descrip">Descripcion</label>
                                 <textarea class="form-control" id="Descrip" name="Descrip" rows="4"  required></textarea>
                          </div>

                           <br><br><br><br><br><br><br><br><br><br><br><br><br>
                           <center>
                                         
                                  <input type="submit" value="Guardar" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" name="Guardar" id="Guardar" class="btn btn-success">
                                  <button style="font-size: 20px;  width: 163px;height: 50px;" type="button" href="plantilla.php" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                           </center>        
              </div>              
        </form>
</body>

<!--funciona para bloquear cajas de texto en el form-->

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


<script>
//VALIDACIÓN DE FORMULARIOS
$.validator.setDefaults({
    submitHandler: function () {
        form.submit();
    }
});
// VALIDACIONES DEL FORMULARIO CREAR CATEGORIAS
$(document).ready(function () {
  $("#formregsubcategorias").validate({
    rules: {
      Nombre_categoria: { 
          min:1
        },
      nombresubcategoria: "required",
      
      Descrip: {
        required: true,
        rangelength: [5, 30]
      },

     // edadmaxima: {
     //   min: "#edadminima"
     // },

     // edadminima:{
       // max: "#edadmaxima"
      //},

    },
    messages: {
      Nombre_categoria:"Seleccione una Categoria",
      nombresubcategoria: "Por favor, ingrese el nombre de la subcategoría.",
      // edadmaxima: "tiene que ser mayor que la edad minima",
      // edadminima:"tiene que ser menor que la edad maxima",
      Descrip: {
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
</html>
