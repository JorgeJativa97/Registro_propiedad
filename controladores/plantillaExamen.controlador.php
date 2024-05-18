<?php 

class ControladorPlantillaExamen{


/*=============================================
MOSTRAR examen
=============================================*/  

	static function ctrMostrarPlantillaExamen($item, $valor){

		$tabla = " tipo_ecografia"; 

		$respuesta = ModeloPlantillaExamen::mdlMostrarPlantillaExamen($tabla, $item, $valor);

		return $respuesta;

	}


// /*=============================================
// MOSTRAR personal
// =============================================*/  

// static function ctrMostrarPersonal($item, $valor){ 

//     $tabla = "personal"; 

//     $respuesta = ModeloExamen::mdlMostrarPersonal($tabla, $item, $valor);

//     return $respuesta;

// }

// /* REGistro usuario */
static public function ctrCrearPalntillaExamen(){
    if(isset($_POST["nombreExamen"])){
        if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["titulo"]) 
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["descripcionPlan"])){
           
                       
        $respuesta = ModeloPlantillaExamen::mldIngresarExamen();


        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "La plantilla ha sido guardada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "plantillaExamen";
                            }
                    })
            </script>';
        }

        } else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡La plantilla no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "plantillaExamen";
                
            });
            </script>';
           
        }

    }
}    

// // /* REGistro usuario */
static public function ctrEditarPlantillaExamen(){
    if(isset($_POST["editarPlantiExa"])){
        if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editartitulo"]) 
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editardescripcionPlan"])){
           
                       
        $respuesta = ModeloPlantillaExamen::mldEditarExamen();

        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "La plantilla ha sido guardada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "plantillaExamen";
                            }
                    })
            </script>';
        }

        } else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡La plantilla no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "plantillaExamen";
                
            });
            </script>';
           
        }

    }
}     


// //     /*=============================================
// //     Eliminar persona
// //     =============================================*/

    static public function ctrEliminarPlantillaExamen($pexamen){

        $tabla = "tipo_ecografia";

        $respuesta = ModeloPlantillaExamen::mldPlantillaExamnen($tabla, $pexamen);

        return $respuesta; 

    } 

} 
