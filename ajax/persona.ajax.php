<?php 

require_once "../controladores/persona.controlador.php"; 
require_once "../modelos/person.modelo.php"; 

class AjaxPersona{  

	/*=============================================
    ACTIVAR PERIODO
    =============================================*/  

    public $idpersona;
    public $id_estado;


    public function ajaxActivarUsuario(){
        $tabla = "persona";
        $item1 = "idpersona"; 
        $valor1 = $this->idpersona;
        $item2 = "status"; 
        $valor2 = $this->id_estado; 
        $respuesta = ModeloPersona:: mdlActualizarEstadoUsuario($tabla,$item1, $valor1,$item2, $valor2);
        
        echo json_encode($respuesta);

    } 
   /*=============================================
    VALIDAR NO REPETIR USUARIO
    =============================================*/ 

        public $ValidarPersona;

        public function ajaxValidarPersona(){

            $item = "identificacion";
            $valor = $this->ValidarPersona;

            $respuesta = ControladorPersona::ctrMostrarPersonaValidar($item, $valor);

            echo json_encode($respuesta);

        }
   /*=============================================
    VALIDAR NO REPETIR CORREO
    =============================================*/ 

        public $ValidarCorreo;

        public function ajaxValidarCorreo(){

            $item = "email_user";
            $valor = $this->ValidarCorreo;

            $respuesta = ControladorPersona::ctrMostrarCorreo($item, $valor);

            echo json_encode($respuesta);

        }

    /*=============================================
    MOSTRAR PARA EDITAR PERSONA
    =============================================*/ 
 
    public $editarid; 

    public function ajaxMostrarPersonaRol(){

        $item = "identificacion";
        $valor = $this->editarid;
        $respuesta = ControladorPersona::ctrMostrarPersonaRolE($item, $valor);
        echo json_encode($respuesta);

    } 

    /*=============================================
    ELIMINAR PERSONA
    =============================================*/ 

    public $idEliminar;

    public function ajaxEliminarPersona(){

        $respuesta = ControladorPersona::ctrEliminarPersonaRol($this->idEliminar);

        echo $respuesta;

    }


} 


/*=============================================
ACTIVAR USUARIO
=============================================*/

if(isset($_POST["id_estado"])){

    $ActivarUsuario = new AjaxPersona();
    $ActivarUsuario -> id_estado= $_POST["id_estado"];
    $ActivarUsuario -> idpersona= $_POST["idpersona"];
    $ActivarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR USUARIO
=============================================*/  

if(isset( $_POST["ValidarPersona"])){

    $valUsuario = new AjaxPersona();
    $valUsuario -> ValidarPersona = $_POST["ValidarPersona"];
    $valUsuario -> ajaxValidarPersona();

}
/*=============================================
VALIDAR CORREO
=============================================*/  

if(isset( $_POST["ValidarCorreo"])){

    $valUsuario = new AjaxPersona();
    $valUsuario -> ValidarCorreo = $_POST["ValidarCorreo"];
    $valUsuario -> ajaxValidarCorreo();

}

/*=============================================
    MOSTRAR PARA EDITAR PERSONA
=============================================*/

if(isset($_POST["editarid"])){

    $editar = new AjaxPersona();
    $editar -> editarid= $_POST["editarid"];
    $editar -> ajaxMostrarPersonaRol();

} 

/*=============================================
ELIMINAR PERSONA
=============================================*/

if(isset($_POST["idEliminar"])){

    $eliminar = new AjaxPersona();
    $eliminar -> idEliminar= $_POST["idEliminar"];
    $eliminar -> ajaxEliminarPersona(); 

}