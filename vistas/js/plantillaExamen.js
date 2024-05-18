$(".tablaPlantillaExamen").DataTable({ 

    "ajax":"ajax/tablaPlantillaexamen.ajax.php",
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
Plugin ckEditor
=============================================*/

ClassicEditor.create(document.querySelector('#descripcionPlan'), {

    toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
 
 }).then(function (editor) {
   
     $(".ck-content").css({"height":"200px"})
 
 }).catch(function (error) {
 
     // console.log("error", error);
 
 }) 

     /*=============================================
    Editar  paciente
    =============================================*/ 
     
    $(document).on("click", ".editarPlantillaExamen", function(){ 
        
        var editarPlaExa = $(this).attr("editarPlaExa"); 
    
        //  console.log("editarPlaExa", editarPlaExa);
        var datos = new FormData();
        // // // console.log("datos", datos);
        datos.append("editarPlaExa", editarPlaExa); 
        $.ajax({
            url:"ajax/plantillaExamen.ajax.php",
            method: "POST",
            data: datos,
              cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){  
    
            //   console.log("respuesta", respuesta);

            $('input[name="editarPlantiExa"]').val(respuesta["tec_codigo"]);     
            $('input[name="editartitulo"]').val(respuesta["tec_titulo"]); 
            $('#editardescripcionPlan').val(respuesta["tec_formato"]);  
            $('#nombreExamenedit').val(respuesta["texa_codigo"]); 
		      	$('#nombreExamenedit').trigger('change');  
            
            ClassicEditor.create(document.querySelector('#editardescripcionPlan'), {

                toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
      
              }).then(function (editor) {
                
                $(".ck-content").css({"height":"200px"})
      
              }).catch(function (error) {
      
                 // console.log("error", error);
              
              })
        
            }
    
        })
    })  

/***************************************************************************************/
      
    $(document).on("click", ".formatover", function(){ 
 
      $("#agregarEditor").html(`
      
      <textarea id="verdescripcionPlan" name="editardescripcionPlan" value="" style="width: 100%"></textarea>
      
      `)
        
        var editarPlaExa = $(this).attr("editarPlaExa"); 
    
        //  console.log("editarPlaExa", editarPlaExa);
        var datos = new FormData();
        // // // console.log("datos", datos);
        datos.append("editarPlaExa", editarPlaExa); 
        $.ajax({
            url:"ajax/plantillaExamen.ajax.php",
            method: "POST",
            data: datos,
              cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){  
    
             console.log("respuesta", respuesta);

            $('input[name="editarPlantiExa"]').val(respuesta["tec_codigo"]);  
            $('#verdescripcionPlan').val(respuesta["tec_formato"]);   
            
            ClassicEditor.create(document.querySelector('#verdescripcionPlan'), {

                toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
      
              }).then(function (editor) {
                
                $(".ck-content").css({"height":"200px"})
      
              }).catch(function (error) {
      
                 // console.log("error", error);
              
              })
        
            }
    
        })
    })   
 /*=============================================
    Eliminar  PROGRAMA
    =============================================*/  
    
    $(document).on("click", ".eliminarPlantillaExamen", function(){
    
      var pexamen = $(this).attr("pexamen");
  
  //  console.log("pexamen", pexamen);
      swal({
          title: '¿Está seguro de eliminar la plantilla del examen?',
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
              datos.append("pexamen", pexamen);
  
                 $.ajax({
  
                url:"ajax/plantillaExamen.ajax.php",
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
                        text: "La plantilla examen ha sido borrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                       }).then(function(result){
  
                          if(result.value){
  
                            window.location = "plantillaExamen";
  
                          }
                      
                      })
  
                    }
  
                }
  
              })  
  
          }
  
      })
  
  })