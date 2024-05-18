<?php 

require_once "../controladores/examenElastografia.controlador.php"; 
require_once "../modelos/examenElastografia.modelo.php";


class AjaxExamenElastografia{

    /*=============================================
    =============================================*/  

    public $editarElasto;

    public function ajaxMostrarExamenElastografia(){

        $item = "ela_codigo";

        $valor = $this->editarElasto;

        $respuesta = ControladorExamenElastografia::ctrMostrarExamenElastografia($item, $valor);

        echo json_encode($respuesta);

    }  



    //  /*=============================================
    // Eliminar Paciente
    // =============================================*/ 

    public $elastografia;

    public function ajaxEliminarExamenElastografia(){

        $respuesta = ControladorExamenElastografia::ctrEliminarExamenElastografia($this->elastografia);

        echo $respuesta;

    }


} 

/*=============================================
Editar Docente
=============================================*/

if(isset($_POST["editarElasto"])){

    $editar = new AjaxExamenElastografia();
    $editar -> editarElasto= $_POST["editarElasto"];
    $editar -> ajaxMostrarExamenElastografia();

} 

// /*=============================================
// Eliminar persona
// =============================================*/

if(isset($_POST["elastografia"])){

    $eliminar = new AjaxExamenElastografia();
    $eliminar -> elastografia= $_POST["elastografia"];
    $eliminar -> ajaxEliminarExamenElastografia();

}