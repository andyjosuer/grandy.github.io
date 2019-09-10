/********************************Combo depto *****************************************/
$(document).ready(function(){
	$("#Depto_atleta").change(function () {
 
		$('#Ciudad_atleta').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
			$("#Depto_atleta option:selected").each(function () {
				id_depto = $(this).val();
				$.post("atleta/cargar_ciudad.php", { id_depto: id_depto }, function(data){
				$("#Ciudad_atleta").html(data);
			});            
		});
	})
});

/*********************************** Combo genero ****************************************/
$(document).ready(function(){
	$("#Genero_atleta").change(function () {

		$('#subcategoria2').find('option').remove().end().append('<option value="whatever">Seleccione una opcion</option>').val('whatever');
		$('#subcategoria').find('option').remove().end().append('<option value="whatever">Seleccione una opcion</option>').val('whatever');
		$('#categoria').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
			$("#Genero_atleta option:selected").each(function () {
				id_gen = $(this).val();
				$.post("atleta/cargar_categoria.php", { id_gen: id_gen }, function(data){
				$("#categoria").html(data);
			});            
		});
	})
});

/*---------------------------------- combo subcategoria --------------------------------------------*/
$(document).ready(function(){
	$("#categoria").change(function () {
 
		$('#subcategoria').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
			$("#categoria option:selected").each(function () {
				id_cat = $(this).val();
				$.post("atleta/cargar_subcategoria.php", { id_cat: id_cat }, function(data){
				$("#subcategoria").html(data);
			});            
		});
	})
});

$(document).ready(function(){
  $("#categoria").change(function () {
 
    $('#subcategoria2').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
          
      $("#categoria option:selected").each(function () {
        id_cat = $(this).val();
        $.post("atleta/cargar_subcategoria.php", { id_cat: id_cat }, function(data){
        $("#subcategoria2").html(data);
      });            
    });
  })
});
