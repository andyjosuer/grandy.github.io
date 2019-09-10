<?php
session_start();
?>

<html>
<head>
<script type="text/javascript" src="evento/validacionevento.js"></script>
<script type="text/javascript" src="evento/validacion_datosiguales.js"></script>
</head>
<body>


    <form  id="formnuevoevento" action="evento/insertar_evento.php"  method="POST" name="formnuevoevento" autocomplete="off" onpaste="return false" oncopy="return false" >

        <CENTER>
            <h2 class="white-text"> REGISTRAR EVENTO</h2>
        </CENTER>

      <div class="container">
             <div class="form-group col-sm-6">
             <label label class="control-label"  for="nombreevento">NOMBRE DEL EVENTO</label> 
             <input  onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" placeholder="Nombre del Evento" name="nombre" id="nombre" required  maxlength="50">
             </div>
                       
             <div class="form-group col-sm-6">
             <label label class="control-label" for="fechainicial">FECHA INICIAL DEL EVENTO</label>
             <input  type="date" class="form-control"  name="inicial"  id="inicial" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>  />
             </div> 

             <div class="form-group col-sm-6">                  
             <label label class="control-label" for="fechafinal">FECHA FINAL DEL EVENTO</label>
             <input type="date" class="form-control" name="finall" id="finall" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?> /> 
             <span class="validacion "> </span>
             </div>

             <div class="form-group col-sm-6">  
             <label label class="control-label" for="lugarevento">LUGAR DEL EVENTO</label>
             <input  maxlength="100" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"  placeholder="Lugar del Evento" name="lugar" id="lugar" required  maxlength="100" >
             </div>
            
             <div class="form-group col-sm-12"> 
             <label  label class="control-label" for="descripcion">DESCRIPCIÓN</label>
             <textarea class="form-control" name="descrip" id="descrip"  rows="4"  maxlength="200" onkeyup="javascript:this.value=this.value.toUpperCase();" ></textarea>
             </div>

             <div class="form-group col-sm-6" id="divRadios">
                   <label label class="control-label"  for="estado">CATEGORÍA PERMITIDA:</label>
                   &nbsp&nbsp&nbsp&nbsp
                    <input type="radio" name="categoria" id="categoria" value="1" onclick="activar1()">UNA CATEGORÍA 
                    &nbsp&nbsp&nbsp&nbsp
                    <input type="radio" name="categoria" id="categoria" value="2" onclick="activar2()">DOS CATEGORÍAS
             </div> 
             <div class="form-group col-sm-12">
             <center>
             <input type="submit" value="GUARDAR" id="GUARDAR" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;" class="btn btn-success"  >
           <a href="plantilla.php" class="btn btn-danger" style="font-size: 20px; margin: 40px; width: 163px; height: 50px;">CANCELAR</a>
             </center>
             </div>
            
            <!-- <div class="form-group col-sm-6">           
               <tr> 
             <td><a href="#">Anterior</a></td> 
             <td><a href="javascript:void(0)" class="a_menu" id="crea_evento" onclick="get_html(this,'evento/categorias_eventos.php','Ver evento con Categoria');">Siguiente</a></td>  
             </tr> 
             </div>-->
            </div>
            </div>
         </form>

        
<script type="text/javascript">
//VALIDAR RADIOS
$("#GUARDAR").click(function(event) {
  if(!$("#divRadios input[name='categoria']").is(':checked')){
    alert('Favor de seleccionar una opción');
  }
});

</script>


        
     </body>
</html>







  










