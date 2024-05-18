<?php 

require_once "../controladores/resultadoExamen.controlador.php"; 
require_once "../modelos/resultadoExamen.modelo.php"; 

class tablaResultadoExamen{
    public function mostrarTabla(){

        $respuesta= ControladorResultadoExamen::ctrMostrarResultadoExamen(null,null);

        if(count($respuesta)==0){

            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        }
        $datosJson = '{
            "data":[';
    
            foreach ($respuesta as $key => $value) { 
            
                $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarResultadoExamen' data-toggle='modal' data-target='#editarResultadoExamen' editarReExa='".$value["eco_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button> <button class='btn btn-danger btn-sm eliminarResuExamen'rexamen='".$value["eco_codigo"]."'><i class='fas fa-trash-alt'></i>";
                

         
        $datosJson .='[

                "'.$value["pac_identificacion"].'", 
                "'.$value["pac_nombres"].'",
                "'.$value["pac_apellidos"].'",
                "'.$value["tec_titulo"].'",  
                "'.$value["eco_fecha"].'",            
                "'.$acciones.'" 
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablaResultadoExamen = new tablaResultadoExamen();
$tablaResultadoExamen -> mostrarTabla();