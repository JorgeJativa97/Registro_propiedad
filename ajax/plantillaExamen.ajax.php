<?php 

require_once "../controladores/plantillaExamen.controlador.php"; 
require_once "../modelos/plantillaExamen.modelo.php";


class AjaxPlantillaExamen{

    /*=============================================
    Editar plantilla
    =============================================*/  

    public $editarPlaExa;

    public function ajaxMostrarPlantillaExamen(){
 
        $item = "tec_codigo";

        $valor = $this->editarPlaExa;

        $respuesta = ControladorPlantillaExamen::ctrMostrarPlantillaExamen($item, $valor);

        echo json_encode($respuesta);

    }  



    //  /*=============================================
    // Eliminar Paciente
    // =============================================*/ 

    public $pexamen;

    public function ajaxEliminarPlantilaExamen(){

        $respuesta = ControladorPlantillaExamen::ctrEliminarPlantillaExamen($this->pexamen);

        echo $respuesta;

    }


} 

/*=============================================
Editar Docente
=============================================*/

if(isset($_POST["editarPlaExa"])){

    $editar = new AjaxPlantillaExamen();
    $editar -> editarPlaExa= $_POST["editarPlaExa"];
    $editar -> ajaxMostrarPlantillaExamen();

} 

/*=============================================
Eliminar persona
=============================================*/

if(isset($_POST["codigo"])){

    $eliminar = new AjaxPlantillaExamen();
    $eliminar -> pexamen= $_POST["pexamen"];
    $eliminar -> ajaxEliminarPlantilaExamen();

}