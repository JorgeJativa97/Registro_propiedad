<?php 

require_once "../controladores/usuarios.controlador.php"; 
require_once "../modelos/usuarios.modelo.php";


class AjaxUsuario{

    /*=============================================
    Editar persona
    =============================================*/  

    public $editarid;

    public function ajaxMostrarPersona(){

        $item = "cedula";

        $valor = $this->editarid;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarioEdit($item, $valor);

        echo json_encode($respuesta);

    }  



     /*=============================================
    Eliminar Persona
    =============================================*/ 

    public $cedula;

    public function ajaxEliminarPersona(){

        $respuesta = ControladorUsuarios::ctrEliminarPersona($this->cedula);

        echo $respuesta;

    }


} 

/*=============================================
Editar Docente
=============================================*/

if(isset($_POST["editarid"])){

    $editar = new AjaxUsuario();
    $editar -> editarid= $_POST["editarid"];
    $editar -> ajaxMostrarPersona();

} 

/*=============================================
Eliminar persona
=============================================*/

if(isset($_POST["cedula"])){

    $eliminar = new AjaxUsuario();
    $eliminar -> cedula= $_POST["cedula"];
    $eliminar -> ajaxEliminarPersona();

}