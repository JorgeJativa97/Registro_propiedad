<?php 

class ControladorPaciente{


/*=============================================
MOSTRAR Paciente
=============================================*/  

	static function ctrMostrarPaciente($item, $valor){

		$tabla = "paciente"; 

		$respuesta = ModeloPaciente::mdlMostrarPaciente($tabla, $item, $valor);

		return $respuesta;

	}

/* REGistro usuario */
static public function ctrCrearPaciente(){
    if(isset($_POST["regcedula"])){
        if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regnombre"]) 
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regcedula"])
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regapellidos"])){
           
                       
        $respuesta = ModeloPaciente::mldIngresarPaciente();


        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "La persona ha sido guardada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "paciente";
                            }
                    })
            </script>';
        }

        } else {
            echo ' <script>
            swal(
                {type: "error",
                    title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                      if (result.value) {
                      window.location = "paciente";
                
            });
            </script>';
           
        }

    }
}    

/* REGistro usuario */
static public function ctrEditarPaciente(){
    if(isset($_POST["editarPac"])){
        if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarnombre"]) 
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarcedula"])
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarapellidos"])){
           
                       
        $respuesta = ModeloPaciente::mldEditarPaciente();

        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "El paciente se edito correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "paciente";
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
                      window.location = "paciente";
                
            });
            </script>';
           
        }

    }
}     


    /*=============================================
    Eliminar persona
    =============================================*/

    static public function ctrEliminarPaciente($codigo){

        $tabla = "paciente";

        $respuesta = ModeloPaciente::mldPaciente($tabla, $codigo);

        return $respuesta; 

    } 

} 
