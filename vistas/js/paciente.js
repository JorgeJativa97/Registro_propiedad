$(".tablaPaciente").DataTable({ 

"ajax":"ajax/tablaPaciente.ajax.php",
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
Editar  paciente
=============================================*/ 

$(document).on("click", ".editarPaciente", function(){ 
	
    var editarPac = $(this).attr("editarPac"); 

	//  console.log("editarPac", editarPac);
	var datos = new FormData();
	// console.log("datos", datos);
	datos.append("editarPac", editarPac); 
	$.ajax({
		url:"ajax/paciente.ajax.php",
		method: "POST",
		data: datos,
  		cache: false,
		contentType: false,
    	processData: false,
    	dataType: "json",
    	success:function(respuesta){  

		//   console.log("respuesta", respuesta);

        $('input[id="editarcedula"]').val(respuesta["pac_identificacion"]);  
        $('input[id="editarnombre"]').val(respuesta["pac_nombres"]);     
        $('input[id="editarapellidos"]').val(respuesta["pac_apellidos"]);    
    	$('input[id="editarfechanacimiento"]').val(respuesta["pac_fechanac"]); 	
        $('input[id="editardireccion"]').val(respuesta["pac_direccion"]);
		$('input[id="editaredad"]').val(respuesta["pac_edad"]);
		$('input[id="editartelefono"]').val(respuesta["pac_telefono"]);
		$('input[name="editarPac"]').val(respuesta["pac_codigo"]);
    	}

    	})
})  

/*=============================================
Eliminar  PROGRAMA
=============================================*/  

$(document).on("click", ".eliminarpaciente", function(){

	var codigo = $(this).attr("codigo");

//  console.log("codigo", codigo);
	swal({
	    title: '¿Está seguro de eliminar esta asignatura?',
	    text: "¡Si no lo está puede cancelar la acción!",
	    type: 'warning',
	    showCancelButton: true,
	    confirmButtonColor: '#3085d6',
	    cancelButtonColor: '#d33',
	    cancelButtonText: 'Cancelar',
	    confirmButtonText: 'Si, eliminar asignatura!'
	  }).then(function(result){

	    if(result.value){

	    	var datos = new FormData();
       		datos.append("codigo", codigo);

       		$.ajax({

	          url:"ajax/paciente.ajax.php",
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
	                  text: "La asignatura ha sido borrado correctamente",
	                  showConfirmButton: true,
	                  confirmButtonText: "Cerrar",
	                  closeOnConfirm: false
	                 }).then(function(result){

	                    if(result.value){

	                      window.location = "paciente";

	                    }
	                
	                })

	          	}

	          }

	        })  

	    }

	})

})
