$(".tablaElastografia").DataTable({ 

    "ajax":"ajax/tablaElastografia.ajax.php",
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "language": {
    
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });   

/*=============================================
=============================================*/  
$("#crearElastografia").on("change","#codPaciente",function(){
	var pac_codigo=$(this).val();
    // console.log(pac_codigo);
	if(pac_codigo!=""){
		// Petición AJAX
		var datos = new FormData();
		datos.append("pac_codigo", pac_codigo); 
		$.ajax({
			url:"ajax/resultadoExamen.ajax.php",
			method: "POST",
			data: datos,
	  		cache: false,
			contentType: false,
	    	processData: false,
	    	dataType: "json",
	    	success:function(respuesta){

			// console.log("respuesta", respuesta);
	    		$("#crearElastografia .nombre").val(respuesta["pac_nombres"]);
	    		$("#crearElastografia .apellidos").val(respuesta["pac_apellidos"]);
	    	}
	    });
	}
	$("#crearElastografia").val("");
}); 

/*=============================================
TRAER DATOS PARA EDITAR
=============================================*/  

$(document).on("click",".editarExamenElastro", function(){

    var editarElasto = $(this).attr("editarElasto"); 
    
    
    console.log("editarElasto", editarElasto);
    
    var datos =new FormData();
    
    datos.append("editarElasto",editarElasto);
    
     $.ajax({
            url:"ajax/examenElastografia.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(respuesta){ 
    
    
            // console.log("respuesta", respuesta);
                
                $('input[name="ela"]').val(respuesta["ela_codigo"]);
                $('input[name="enmuestra"]').val(respuesta["ela_numero_muestra"]);
                $('input[name="edpiel"]').val(respuesta["ela_distancia_piel"]);
                $('input[name="emuestra1"]').val(respuesta["ela_muestra_1"]);
                $('input[name="emuestra2"]').val(respuesta["ela_muestra_2"]);
                $('input[name="emuestra3"]').val(respuesta["ela_muestra_3"]);
                $('input[name="emuestra4"]').val(respuesta["ela_muestra_4"]);
                $('input[name="emuestra5"]').val(respuesta["ela_muestra_5"]);
                $('input[name="emuestra6"]').val(respuesta["ela_muestra_6"]);
                $('input[name="emuestra7"]').val(respuesta["ela_muestra_7"]);
                $('input[name="emuestra8"]').val(respuesta["ela_muestra_8"]);
                $('input[name="emuestra9"]').val(respuesta["ela_muestra_9"]);
                $('input[name="emuestra10"]').val(respuesta["ela_muestra_10"]);
                $('input[name="emuestra11"]').val(respuesta["ela_muestra_11"]);
                $('input[name="emuestra12"]').val(respuesta["ela_muestra_12"]);
                $('input[name="emuestra13"]').val(respuesta["ela_muestra_13"]);
                $('input[name="emuestra14"]').val(respuesta["ela_muestra_14"]);
                $('input[name="emuestra15"]').val(respuesta["ela_muestra_15"]);
                $('input[name="emuestra16"]').val(respuesta["ela_muestra_16"]);
                $('input[name="erigidezS"]').val(respuesta["ela_rigidez_est"]);
                $('input[name="erigidezM"]').val(respuesta["ela_rigidez_media"]);
                $('input[name="erigidezP"]').val(respuesta["ela_rigidez_promedio"]);
                $('textarea[name="ediagnostico"]').val(respuesta["ela_diagnostico"]);
                $('input[name="efecha"]').val(respuesta["ela_fecha"]);
                $('#ecodPaciente').val(respuesta["pac_codigo"]); 
                $('#editarRolid').trigger('change'); 
    
                
                
            }
    
         })
    
    }) 

/*=============================================
    Eliminar  PROGRAMA
    =============================================*/  
    
    $(document).on("click", ".eliminarElastografia", function(){
    
        var elastografia = $(this).attr("elastografia");
    
        // console.log("elastografia", elastografia);
        swal({
            title: '¿Está seguro de eliminar el resultado del examen?',
            text: "¡Si no lo está puede cancelar la acción!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar!'
          }).then(function(result){
    
            if(result.value){
    
                var datos = new FormData();
                datos.append("elastografia", elastografia);
    
                   $.ajax({
    
                  url:"ajax/examenElastografia.ajax.php",
                  method: "POST",
                  data: datos,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success:function(respuesta){
    
    
            //	console.log("respuesta", respuesta);
    
                      if(respuesta == "ok"){
    
                          swal({
                          type: "success",
                          title: "¡CORRECTO!",
                          text: "El resultado del examen ha sido borrado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                         }).then(function(result){
    
                            if(result.value){
    
                              window.location = "examenElastografia";
    
                            }
                        
                        })
    
                      }
    
                  }
    
                })  
    
            }
    
        })
    
    })