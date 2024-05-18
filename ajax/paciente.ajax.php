<?php 

require_once "../controladores/paciente.controlador.php"; 
require_once "../modelos/paciente.modelo.php";


class AjaxPaciente{

    /*=============================================
    Editar persona
    =============================================*/  

    public $editarPac;

    public function ajaxMostrarPaciente(){

        $item = "pac_codigo";

        $valor = $this->editarPac;

        $respuesta = ControladorPaciente::ctrMostrarPaciente($item, $valor);

        echo json_encode($respuesta);

    }  



     /*=============================================
    Eliminar Paciente
    =============================================*/ 

    public $codigo;

    public function ajaxEliminarPaciente(){

        $respuesta = ControladorPaciente::ctrEliminarPaciente($this->codigo);

        echo $respuesta;

    }


} 

/*=============================================
Editar Docente
=============================================*/

if(isset($_POST["editarPac"])){

    $editar = new AjaxPaciente();
    $editar -> editarPac= $_POST["editarPac"];
    $editar -> ajaxMostrarPaciente();

} 

/*=============================================
Eliminar persona
=============================================*/

if(isset($_POST["codigo"])){

    $eliminar = new AjaxPaciente();
    $eliminar -> codigo= $_POST["codigo"];
    $eliminar -> ajaxEliminarPaciente();

}