<?php 

class ControladorUsuarios{

    
	/*=============================================
	INGRESO ADMINISTRADORES
	=============================================*/ 

    public function ctrIngresoAdministradores(){

        if(isset($_POST["ingresoUsuario"])){

			if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/',$_POST["ingresoUsuario"])
             && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/',$_POST["ingresoPassword"])){ 

				$encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "persona";
				$item = "email_user";
				$valor = $_POST["ingresoUsuario"];

				$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

				//echo '<pre>'; print_r($respuesta); echo '</pre>';

			
				if($respuesta["email_user"] == $_POST["ingresoUsuario"] && $respuesta["password"] == $encriptarPassword){
 
					$_SESSION["validarSesion"] = "ok";
					$_SESSION["idSesion"] = $respuesta["identificacion"]; 

					echo '<script>

						window.location = "inicio";

					</script>';
				}else{

					echo "<div class='alert alert-danger mt-3 small'>Usuario y/o contraseña inocorrectos</div>";
				}

			}else{

				echo "<div class='alert alert-danger mt-3 small'>No se permiten caracteres especiales</div>";
			}

		}


    } 

/*=============================================
MOSTRAR USUARIO
=============================================*/  

	static function ctrMostrarUsuario($item, $valor){

		$tabla = "persona"; 

		$respuesta = ModeloUsuarios::mdlMostrarUser($tabla, $item, $valor);

		return $respuesta;

	}


/*=============================================
MOSTRAR USUARIO
=============================================*/  

static function ctrMostrarUsuarioEdit($item, $valor){

    $tabla = "usuario"; 

    $respuesta = ModeloUsuarios::mdlMostrarUserEditar($tabla, $item, $valor);

    return $respuesta;

}

/* REGistro usuario */
static public function ctrCrearUser(){
    if(isset($_POST["regcedula"])){
        if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regnombre"]) 
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regcorreo"])
        && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["regpassword"])){
           
       

        $tabla ="usuario"; 
        $encriptar = crypt($_POST["regpassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $datos = array("nombre_apellido" => $_POST["regnombre"], 
                       "usuario" => $_POST["regcorreo"],
                       "password" => $encriptar,  
                       "estado" => 1,   
                       "cedula" => $_POST["regcedula"]);
                       
        $respuesta = ModeloUsuarios::mldIngresarPersona($tabla,$datos);

        $tabla2 = "user";

        $datos2 = array("rol" => $_POST["nuevoPerfil"],  
                       "cedula" => $_POST["regcedula"]);

        $respuesta2 = ModeloUsuarios::mldIngresarUser($tabla2,$datos2);

        if($respuesta == "ok"){

            echo'<script>
            swal({
                  type: "success",
                  title: "La persona ha sido guardada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {
                            window.location = "usuarios";
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
                      window.location = "usuarios";
                
            });
            </script>';
           
        }

    }
}     

    /* editar persona Tabla*/

    public function ctreditarPersona(){
       
        if(isset($_POST["editarid"])){
            
            if(preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarnombre"]) 
            && preg_match('/^[0-9-a-zA-ZáéíóúÁÉÍÓÚñÑ \\/\\-\\_ \!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/', $_POST["editarcorreo"])){
                
                if($_POST["pass"] != ""){

                    if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["pass"])){

                        $encriptar = crypt($_POST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                    }else{

                        echo'<script>

                                swal({
                                      type: "error",
                                      title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                                      showConfirmButton: true,
                                      confirmButtonText: "Cerrar"
                                      }).then(function(result){
                                        if (result.value) {

                                        window.location = "usuario";

                                        }
                                    })

                            </script>';

                    }

                }else{

                    $encriptar = $_POST["passwordActual"];

                }
                
                $tabla ="usuario"; 
               
                $datos = array("cedula" => $_POST["editarid"], 
                                "nombre_apellido" => $_POST["editarnombre"], 
                               "usuario" => $_POST["editarcorreo"],  
                               "password" => $encriptar,
                               );

                $respuesta = ModeloUsuarios::mldEditarUsuario($tabla,$datos); 
                
                $tabla2 ="user"; 
               
                $datos2 = array("cedula" => $_POST["editarid"], 
                                "rol" => $_POST["editarPerfil"]
                               );

                $respuesta2 = ModeloUsuarios::mldEditarUsuarioRol($tabla2,$datos2);


                if($respuesta == "ok"){

                    echo'<script>
                    swal({
                          type: "success",
                          title: "La persona ha sido guardada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {
                                    window.location = "usuarios";
                                    }
                            })
                    </script>';
                }
    
                } else {
                    echo ' <script>
                    swal(
                        {type: "error",
                            title: "¡La persona no puede ir vacío o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                              if (result.value) {
                              window.location = "usuarios";
                        
                    });
                    </script>';
                   
                }
    
            }
        
    
        } 

    /*=============================================
    Eliminar persona
    =============================================*/

    static public function ctrEliminarPersona($cedula){

        $tabla = "usuario";

        $respuesta = ModeloUsuarios::mldEliminarPersona($tabla, $cedula);

        return $respuesta; 

    } 

   /*=============================================
MOSTRAR USUARIO
=============================================*/  

	static function ctrMostrar($item, $valor){

		$tabla = "usuario"; 

		$respuesta = ModeloUsuarios::mdlMostrar($tabla, $item, $valor);

		return $respuesta;

	}

} 
