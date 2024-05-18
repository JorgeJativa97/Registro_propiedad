<?php 

require_once "../controladores/examen.controlador.php"; 
require_once "../modelos/examen.modelo.php";


class AjaxExamen{

    /*============================================= 
    Editar persona
    =============================================*/  

    public $editarExa;

    public function ajaxMostrarExamen(){

        $item = "texa_codigo";

        $valor = $this->editarExa;

        $respuesta = ControladorExamen::ctrMostrarExamen($item, $valor);

        echo json_encode($respuesta);

    }  



     /*=============================================
    Eliminar Paciente
    =============================================*/ 

    public $examen;

    public function ajaxEliminarExamen(){

        $respuesta = ControladorExamen::ctrEliminarExamen($this->examen);

        echo $respuesta;

    }


} 

/*=============================================
Editar Docente
=============================================*/

if(isset($_POST["editarExa"])){

    $editar = new AjaxExamen();
    $editar -> editarExa= $_POST["editarExa"];
    $editar -> ajaxMostrarExamen();

} 

// /*=============================================
// Eliminar persona
// =============================================*/

if(isset($_POST["examen"])){

    $eliminar = new AjaxExamen();
    $eliminar -> examen= $_POST["examen"];
    $eliminar -> ajaxEliminarExamen();

}