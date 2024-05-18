<?php 

require_once "../modelos/paciente.modelo.php"; 
require_once "../controladores/resultadoExamen.controlador.php";
require_once "../modelos/resultadoExamen.modelo.php"; 
require_once "../modelos/plantillaExamen.modelo.php";
 
class AjaxResusltadoExamen{
   
 	// /*=============================================
	// Editar Cronograma
	// =============================================*/	
	public $editarReExa;

	public function ajaxMostrarResultadoExamen(){

		$valor = $this->editarReExa;

		$respuesta = ControladorResultadoExamen::ctrMostrarEditarResultadoExamen($valor);

		echo json_encode($respuesta);

	} 

	// /*=============================================
	// Eliminar Cronograma
	// =============================================*/
	public $rexamen;

	public function ajaxEliminarResultadoExamen(){

		$respuesta = ControladorResultadoExamen::ctrEliminarREsultadoExamen($this->rexamen);

		echo $respuesta;

	}

	/*=============================================O
	=============================================*/
	public $pac_codigo;

	public function ajaxMostrarPaciente(){

		$respuesta=ModeloPaciente::mdlMostrarPacientecod($this->pac_codigo);
		
		echo json_encode($respuesta);
	}

    /*=============================================O
	=============================================*/
	public $tec_codigo;

	public function ajaxMostrarPlantillaexa(){

		$respuesta=ModeloPlantillaExamen::mdlMostrarPlantillaexamenn($this->tec_codigo);
		
		echo json_encode($respuesta);
	}
} 
// /*=============================================
// Editar Cronograma
// =============================================*/
if(isset($_POST["editarReExa"])){ 

	$editar = new AjaxResusltadoExamen();
	$editar -> editarReExa= $_POST["editarReExa"];
	$editar -> ajaxMostrarResultadoExamen();

} 

// /*=============================================
// Eliminar Cronograma
// =============================================*/
if(isset($_POST["rexamen"])){

	$eliminar = new AjaxResusltadoExamen();
	$eliminar -> rexamen= $_POST["rexamen"];
	$eliminar -> ajaxEliminarResultadoExamen();

} 
/*=============================================
INNER JOIN
=============================================*/
if(isset($_POST["pac_codigo"])){ 
	$mostrar= new AjaxResusltadoExamen();
	$mostrar-> pac_codigo= $_POST["pac_codigo"];
	$mostrar-> ajaxMostrarPaciente();
}  

/*=============================================
INNER JOIN
=============================================*/
if(isset($_POST["tec_codigo"])){ 
	$mostrar= new AjaxResusltadoExamen();
	$mostrar-> tec_codigo= $_POST["tec_codigo"];
	$mostrar-> ajaxMostrarPlantillaexa();
} 