<?php 

require_once "../controladores/plantillaExamen.controlador.php"; 
require_once "../modelos/plantillaExamen.modelo.php"; 

class tablaPlantillaExamen{
   
    public function mostrarTabla(){

        $respuesta= ControladorPlantillaExamen::ctrMostrarPlantillaExamen(null,null);

        if(count($respuesta)==0){

            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        }
        $datosJson = '{
            "data":[';
    
            foreach ($respuesta as $key => $value) { 
            
                $acciones ="<div class='btn-group'><button class='btn btn-warning btn-sm editarPlantillaExamen' data-toggle='modal' data-target='#editarPlantillaExamen' editarPlaExa='".$value["tec_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarPlantillaExamen'pexamen='".$value["tec_codigo"]."'><i class='fas fa-trash-alt'></i></button></div>";
                
                $formato ="<div class='btn-group'><button class='btn btn-warning btn-sm formatover' data-toggle='modal' data-target='#formatover' editarPlaExa='".$value["tec_codigo"]."'><i class='fas fa-solid fa-eye'></i></button></div>";
         
        $datosJson .='[

                "'.$value["nom_texa"].'", 
                "'.$value["tec_titulo"].'",  
                "'.$formato.'",         
                "'.$acciones.'" 
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablaPlantillaExamen = new tablaPlantillaExamen();
$tablaPlantillaExamen -> mostrarTabla();