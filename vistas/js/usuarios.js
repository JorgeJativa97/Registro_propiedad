$(".tablaUsuario").DataTable({ 

	"ajax":"ajax/tablaUsuario.ajax.php",
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
Editar  persona/Docente
=============================================*/ 

$(document).on("click", ".editarpersona", function(){ 
	
    var editarid = $(this).attr("editarid"); 

	// console.log("editarid", editarid);
	var datos = new FormData();
	// console.log("datos", datos);
	datos.append("editarid", editarid); 
	$.ajax({
		url:"ajax/usuario.ajax.php",
		method: "POST",
		data: datos,
  		cache: false,
		contentType: false,
    	processData: false,
    	dataType: "json",
    	success:function(respuesta){  

		// console.log("respuesta", respuesta);

        $('input[name="editarid"]').val(respuesta["cedula"]);  
        $('input[name="editarcedula"]').val(respuesta["cedula"]);     
        $('input[name="editarnombre"]').val(respuesta["nombre_apellido"]);    
    	$('input[name="editarcorreo"]').val(respuesta["usuario"]); 	
        $('input[name="passwordActual"]').val(respuesta["password"]);
        $('.editarPerfilOption').val(respuesta["rol"]);
    	$('.editarPerfilOption').html(respuesta["rol"]); 
    	}

    	})
}) 

/* eliminar persona */
$(document).on("click", ".eliminarpersona", function(){

    var cedula =$(this).attr("cedula");
    // console.log("cedula", cedula);
    
        if(cedula ==1){
            swal({
                title: 'Error',
                text: "El Administrador Principal no puede ser Borrado",
                type: 'error',
                confirmButtonText: 'Cerrar!'
            });
            return;
        }
        swal({
            title: '¿Está seguro de eliminar este usuario?',
            text: "¡Si no lo está puede cancelar la acción!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar Usuario!'
        }).then(function(result){
    
            if(result.value){
                var datos = new FormData();
                   datos.append("cedula", cedula);
                   
    
                   $.ajax({
    
                    url:"ajax/usuario.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(respuesta){
                        if(respuesta == "ok"){
    
                            swal({
                            type: "success",
                            title: "¡CORRECTO!",
                            text: "El usuario ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                           }).then(function(result){
      
                              if(result.value){
      
                                window.location = "usuarios";
      
                              }
                          
                          })
    
                        }
    
                    }
      
                  })  
                }
            })
            
    })
