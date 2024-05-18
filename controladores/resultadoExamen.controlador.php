<?php 

class ControladorResultadoExamen{


/*=============================================
MOSTRAR examen
=============================================*/   

	static function ctrMostrarResultadoExamen($item, $valor){

		$tabla = "paciente_ecografia"; 

		$respuesta = ModeloResultadoExamen::mdlMostrarResultadoExamen($tabla, $item, $valor);

		return $respuesta;

	} 

/*=============================================
=============================================*/   
	
	static function ctrMostrarEditarResultadoExamen($item,$valor){
	
			$tabla = "paciente_ecografia"; 
	
			$respuesta = ModeloResultadoExamen::mdlMostrarEditarResultadoexamen($tabla,$valor);
	
			return $respuesta;
	
	}
	

// /* REGistro usuario */
static public function ctrCrearResultadoExamen(){
    if(isset($_POST["codPaciente"])){
        if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["codExamen"]) 
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["tituloExamen"])){
           
                       
        $respuesta = ModeloResultadoExamen::mldIngresarResultadoExamen();


        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "El examen ha sido guardada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "resultadoExamen";
                            }
                    })
            </script>';
        }

        } else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡El examen no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "resultadoExamen";
                
            });
            </script>';
           
        }

    }
}    

// // /* REGistro usuario */
// static public function ctrEditarExamen(){
//     if(isset($_POST["editarExa"])){
//         if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["nombrePersonaledit"]) 
//         && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editaegexamen"])){
           
                       
//         $respuesta = ModeloExamen::mldEditarExamen();

//         if($respuesta == "ok"){

//             echo'<script>
//             swal({
//                   type: "success",
//                   title: "El examen se edito correctamente",
//                   showConfirmButton: true,
//                   confirmButtonText: "Cerrar"
//                   }).then(function(result){
//                             if (result.value) {
//                             window.location = "examen";
//                             }
//                     })
//             </script>';
//         }

//         } else {
//             echo ' <script>
//             swal(
//                 {type: "error",
//                     title: "¡El examen no puede ir vacío o llevar caracteres especiales!",
//                     showConfirmButton: true,
//                     confirmButtonText: "Cerrar"
//                     }).then(function(result){
//                       if (result.value) {
//                       window.location = "examen";
                
//             });
//             </script>';
           
//         }

//     }
// }     


//      /*=============================================
//      Eliminar persona
//      =============================================*/

    static public function ctrEliminarREsultadoExamen($rexamen){

        $tabla = "paciente_ecografia";

        $respuesta = ModeloResultadoExamen::mldResultadoExamnen($tabla, $rexamen);

        return $respuesta; 

    } 

} 
