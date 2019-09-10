

function fn_actualizar_atleta(id,PNom_atleta,SNom_atleta,PApellido_atleta,SApellido_atleta,Depto_atleta,Ciudad_atleta,Genero_atleta,Ecivil_atleta,correo_atleta,Identidad_atleta,fecha_atleta,peso,altura,Estado,tel_atleta,tel_em,respon_atleta,Gimnasio_atleta,categoria,subcategoria,subcategoria2,direc_atleta){
   var parametros = {
           hacer:'actualizar_atleta',
          id:id,
          PNom_atleta:PNom_atleta,
          SNom_atleta:SNom_atleta,
          PApellido_atleta:PApellido_atleta,
          SApellido_atleta:SApellido_atleta,
          Depto_atleta:"1",
          Ciudad_atleta:Ciudad_atleta,
          Genero_atleta:Genero_atleta, //genero =0,
          Ecivil_atleta:Ecivil_atleta,
          correo_atleta:correo_atleta,
          Identidad_atleta:Identidad_atleta,
          fecha_atleta:fecha_atleta,
          peso:peso,
          altura:altura,
          Estado:Estado,
          tel_atleta:tel_atleta,
          tel_em:tel_em,
          respon_atleta:respon_atleta,
          Gimnasio_atleta:Gimnasio_atleta,
          categoria:"1",
          subcategoria:"1",
          subcategoria2:"1",
          direc_atleta:direc_atleta
   };

 //*Probando
  //  alert(id);
   //alert(PNom_atleta);
   //alert(SNom_atleta);
   //alert(PApellido_atleta);
   //alert(SApellido_atleta);
   //alert(Depto_atleta);
   //alert(Ciudad_atleta);
   //alert(Genero_atleta);
   //alert(Ecivil_atleta);
   //alert(correo_atleta);
   //alert(Identidad_atleta);
   //alert(fecha_atleta);
   //alert(peso);
   //alert(altura);
   //alert(Estado);
   //alert(tel_atleta);
   //alert(tel_em);
   //alert(respon_atleta);
   //alert(Gimnasio_atleta);
   //alert(categoria);
   //alert(subcategoria);
  // alert(subcategoria2);
//alert(direc_atleta);

   if (id==="" || PNom_atleta==="" || SNom_atleta==="" || PApellido_atleta==="" || SApellido_atleta==="" || parametros.Depto_atleta==="0" || Ecivil_atleta==="0" ||  correo_atleta==="" || Identidad_atleta==="" || fecha_atleta==="" || peso==="" || altura==="" || Estado==="0" || tel_atleta==="" || tel_em==="" || respon_atleta==="" || Gimnasio_atleta==="" || parametros.categoria==="0" || parametros.subcategoria==="0" || parametros.subcategoria2==="0" || direc_atleta===""  ) {
           $('#resultado').html('<br><center><div class="alert alert-block alert-danger fade in">Complete todos los campos.</div></center>');
           setTimeout(function() {
             $('#resultado').html('');

            },2000);

           //SUB1 DISTINTO A SUB 2

  if (subcategoria===subcategoria2){
$('#resultado').html('<br><center><div class="alert alert-block alert-danger fade in">Seleccione una categoría distinta a su primer categpria.</div></center>');
           setTimeout(function() {
             $('#resultado').html('');

            },2000);
  }


    

         }else {
     //     alert(234567);
           $.ajax({
               data:  parametros,
               url:   'atleta/p_atleta.php',
               type:  'post',
               success:  function (response) {
                  alert('despierta msg');
                       if (response.ingreso==="si") {
                  alert('despierta msg');

                         $("#resultado").html('<center><div class="alert '+response.color_alerta+' fade in">'+response.msg+'</div></center>');

                         setTimeout(function() {
                            $("#contenedor_principal").load('atleta/p_atleta.php');
                          },2000);
                        }else if (response.ingreso==="no"){
                       alert('despierta msg 1');
                 
                          $("#resultado").html('<br><center><div class="alert alert-danger">Los datos ya existen.</div></center>');
                          setTimeout(function() {
                              $("#resultado").html('');
                          },2000);

                       }

               }
           });
         }

}
