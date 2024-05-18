$(".tablaExamen").DataTable({ 

    "ajax":"ajax/tablaExamnen.ajax.php",
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
$(document).ready(function(){
    $("#nombrePersonal").select2();
    $("#nombrePersonal").select2({
            placeholder: 'SELECCIONE EL PERSONAL',
            allowClear: true
        });    
    });
    
    /*=============================================
    Editar  paciente
    =============================================*/ 
    
    $(document).on("click", ".editarExamen", function(){ 
        
        var editarExa = $(this).attr("editarExa"); 
    
        //  console.log("editarExa", editarExa);
        var datos = new FormData();
        // // console.log("datos", datos);
        datos.append("editarExa", editarExa); 
        $.ajax({
            url:"ajax/examen.ajax.php",
            method: "POST",
            data: datos,
              cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){  
    
            //   console.log("respuesta", respuesta);
    
            $('input[name="editarExa"]').val(respuesta["texa_codigo"]); 
            $('input[id="editaegexamen"]').val(respuesta["nom_texa"]);  
            $('#nombrePersonaledit').val(respuesta["per_codigo"]); 
			$('#nombrePersonaledit').trigger('change');     
        
            }
    
        })
    })  
    
    /*=============================================
    Eliminar  PROGRAMA
    =============================================*/  
    
    $(document).on("click", ".eliminarExamen", function(){
    
        var examen = $(this).attr("examen");
    
    //  console.log("codigo", codigo);
        swal({
            title: '¿Está seguro de eliminar este examen?',
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
                   datos.append("examen", examen);
    
                   $.ajax({
    
                  url:"ajax/examen.ajax.php",
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
                          text: "El examen ha sido borrado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                         }).then(function(result){
    
                            if(result.value){
    
                              window.location = "examen";
    
                            }
                        
                        })
    
                      }
    
                  }
    
                })  
    
            }
    
        })
    
    })
    