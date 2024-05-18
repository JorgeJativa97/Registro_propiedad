<?php 

class ControladorExamenElastografia{


/*=============================================
MOSTRAR Paciente
=============================================*/  

	static function ctrMostrarExamenElastografia($item, $valor){

		$tabla = "elastografia_hepatica"; 

		$respuesta = ModeloExamenElastografia::mdlMostrarExamenElastografia($tabla, $item, $valor);

		return $respuesta;

	}

// /* REGistro usuario */
static public function ctrCrearExamenElastografia(){
    if(isset($_POST["codPaciente"])){
        if(preg_match('/^[0-9]+$/', $_POST["nmuestra"]) 
        && preg_match('/^[0-9]+$/', $_POST["dpiel"])
        && preg_match('/^[0-9]+$/', $_POST["muestra1"])
        && preg_match('/^[0-9]+$/', $_POST["muestra2"])
        && preg_match('/^[0-9]+$/', $_POST["muestra3"])
        && preg_match('/^[0-9]+$/', $_POST["muestra4"])
        && preg_match('/^[0-9]+$/', $_POST["muestra5"])
        && preg_match('/^[0-9]+$/', $_POST["muestra6"])
        && preg_match('/^[0-9]+$/', $_POST["muestra7"])
        && preg_match('/^[0-9]+$/', $_POST["muestra8"])
        && preg_match('/^[0-9]+$/', $_POST["muestra9"])
        && preg_match('/^[0-9]+$/', $_POST["muestra10"])
        && preg_match('/^[0-9]+$/', $_POST["muestra11"])
        && preg_match('/^[0-9]+$/', $_POST["muestra12"])
        && preg_match('/^[0-9]+$/', $_POST["muestra13"])
        && preg_match('/^[0-9]+$/', $_POST["muestra14"])
        && preg_match('/^[0-9]+$/', $_POST["muestra15"])
        && preg_match('/^[0-9]+$/', $_POST["muestra16"])
        && preg_match('/^[0-9]+$/', $_POST["rigidezS"])
        && preg_match('/^[0-9]+$/', $_POST["rigidezM"])
        && preg_match('/^[0-9]+$/', $_POST["rigidezP"])
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["diagnostico"])){
           
                       
        $respuesta = ModeloExamenElastografia::mldIngresarExamenElastografia();


        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "Los datos han sido guardada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "examenElastografia";
                            }
                    })
            </script>';
        }

        } else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡Los datos están vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "examenElastografia";
                
            });
            </script>';
           
        }

    }
}    

// /* REGistro usuario */
static public function ctrEditarExamenElastografia(){
    if(isset($_POST["codPaciente"])){
        if(preg_match('/^[0-9]+$/', $_POST["enmuestra"]) 
        && preg_match('/^[0-9]+$/', $_POST["edpiel"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra1"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra2"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra3"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra4"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra5"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra6"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra7"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra8"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra9"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra10"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra11"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra12"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra13"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra14"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra15"])
        && preg_match('/^[0-9]+$/', $_POST["emuestra16"])
        && preg_match('/^[0-9]+$/', $_POST["erigidezS"])
        && preg_match('/^[0-9]+$/', $_POST["erigidezM"])
        && preg_match('/^[0-9]+$/', $_POST["erigidezP"])
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["ediagnostico"])){
           
                       
        $respuesta = ModeloExamenElastografia::mldEditarExamenElastografia();

        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "El paciente se edito correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "examenElastografia";
                            }
                    })
            </script>';
        }

        } else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡El paciente no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "examenElastografia";
                
            });
            </script>';
           
        }

    }
}     


//     /*=============================================
//     Eliminar persona
//     =============================================*/

    static public function ctrEliminarExamenElastografia($elastografia){

        $tabla = "elastografia_hepatica";

        $respuesta = ModeloExamenElastografia::mldExamenElastografia($tabla, $elastografia);

        return $respuesta; 

    } 

} 
