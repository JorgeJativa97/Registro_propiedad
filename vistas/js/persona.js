$(".tablapersona").DataTable({ 

	"ajax":"ajax/tablapersona.ajax.php",
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
ACTIVAR DESACTIVAR USUARIO
=============================================*/


$(".tablapersona tbody").on("click", ".btnActivar", function(){

	var idpersona = $(this).attr("idpersona");
	var id_estado = $(this).attr("id_estado");

	var datos = new FormData();

 	datos.append("idpersona", idpersona);
  	datos.append("id_estado", id_estado);

  	$.ajax({
 
  		 url:"ajax/persona.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	} 	 
  	});
  	if(id_estado == 0){
  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-warning');
  		$(this).html('Desactivado');
  		$(this).attr('id_estado',1);
  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-warning');
  		$(this).html('Activado');
  		$(this).attr('id_estado',0);

  	}

})


/*=============================================
VALIDAR SI YA EXITE LA CEDULA
=============================================*/

$("#regcedula").change(function(){ 

	$(".alert").remove();

 	var identificacion = $(this).val();

 	var datos= new FormData();

 	datos.append("ValidarPersona",identificacion);

 	$.ajax({
		url:"ajax/persona.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			
			if(respuesta){

				$("#regcedula").parent().after('<div class="alert alert-danger">Este usuario ya existe en la base de datos</div>');

				$("#regcedula").val("");

			}

		}

	})

})


/*=============================================
REVISAR CORREO SI EXITE
=============================================*/  
$("#regcorreo").change(function(){ 

	$(".alert").remove();

 	var usuario = $(this).val();

 	var datos= new FormData();

 	datos.append("ValidarCorreo",usuario);

 	$.ajax({
		url:"ajax/persona.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			
			if(respuesta){

				$("#regcorreo").parent().after('<div class="alert alert-danger">Este correo ya existe en la base de datos</div>');

				$("#regcorreo").val("");

			}

		} 

	})

})
/*=============================================
SELECT DINAMICO ROL DE USUARIOS
=============================================*/  
$(document).ready(function(){
$(".seleccionarRol").select2({
        placeholder: 'Seleccione el Rol',
		allowClear: true});  
$(".editarRolid").select2({
        placeholder: 'Seleccione el Rol',
		allowClear: true});      
}	
);

/*=============================================
TRAER DATOS PARA EDITAR
=============================================*/  

$(document).on("click",".editarpersona", function(){

var editarid = $(this).attr("editarid"); 


//console.log("editarid", editarid);

var datos =new FormData();

datos.append("editarid",editarid);

 $.ajax({
		url:"ajax/persona.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){ 


		// console.log("respuesta", respuesta);
			
			$('input[name="editarcedula"]').val(respuesta["identificacion"]);
			$('input[name="editarnombre"]').val(respuesta["nombres"]);
			$('input[name="editarapellidos"]').val(respuesta["apellidos"]);
			$('input[name="editartelefono"]').val(respuesta["telefono"]);
			$('input[name="editarcorreo"]').val(respuesta["email_user"]);
			//$('input[name="editarRolid"]').val(respuesta["rolid"]);


			$('#editarRolid').val(respuesta["rolid"]); 
			$('#editarRolid').trigger('change'); 

			
			
		}

 	})

})


/*=============================================
Eliminar  persona
=============================================*/  

$(document).on("click", ".eliminarPersonaRol", function(){

	var identificacion = $(this).attr("identificacion"); 

//console.log("ciMaestros", ciMaestros);
	swal({
	    title: '¿Está seguro de eliminar este usuario?',
	    text: "¡Si no lo está puede cancelar la acción!",
	    type: 'warning',
	    showCancelButton: true,
	    confirmButtonColor: '#3085d6', 
	    cancelButtonColor: '#d33',
	    cancelButtonText: 'Cancelar',
	    confirmButtonText: 'Si, eliminar usuario!'
	  }).then(function(result){

	    if(result.value){

	    	var datos = new FormData();
       		datos.append("idEliminar", identificacion);

       		$.ajax({

	          url:"ajax/persona.ajax.php",
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

	                      window.location = "persona";

	                    }
	                
	                })

	          	}

	          }

	        })  

	    }

	})

})
