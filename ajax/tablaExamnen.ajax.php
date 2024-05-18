<?php 

require_once "../controladores/examen.controlador.php"; 
require_once "../modelos/examen.modelo.php"; 

class tablaExamen{
    public function mostrarTabla(){

        $respuesta= ControladorExamen::ctrMostrarExamen(null,null);

        if(count($respuesta)==0){

            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        }
        $datosJson = '{
            "data":[';
    
            foreach ($respuesta as $key => $value) { 
            
                $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarExamen' data-toggle='modal' data-target='#editarExamen' editarExa='".$value["texa_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button> <button class='btn btn-danger btn-sm eliminarExamen'examen='".$value["texa_codigo"]."'><i class='fas fa-trash-alt'></i>";
                

         
        $datosJson .='[

                "'.$value["nom_texa"].'", 
                "'.$value["per_nombres"].'",              
                "'.$acciones.'" 
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablaExamen = new tablaExamen();
$tablaExamen -> mostrarTabla();