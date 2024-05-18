<?php 

require_once "../controladores/examenElastografia.controlador.php"; 
require_once "../modelos/examenElastografia.modelo.php"; 

class tablaExamenElastografia{
    public function mostrarTabla(){

        $respuesta= ControladorExamenElastografia::ctrMostrarExamenElastografia(null,null);

        if(count($respuesta)==0){

            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        }
        $datosJson = '{
            "data":[';
    
            foreach ($respuesta as $key => $value) { 
            
                $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarExamenElastro' data-toggle='modal' data-target='#editarElasto' editarElasto='".$value["ela_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button> <button class='btn btn-danger btn-sm eliminarElastografia'elastografia='".$value["ela_codigo"]."'><i class='fas fa-trash-alt'></i>";
                

         
        $datosJson .='[
                "'.$value["pac_nombres"].'",
                "'.$value["pac_apellidos"].'", 
                "'.$value["pac_identificacion"].'", 
                "'.$value["pac_fechanac"].'",                
                "'.$acciones.'" 
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablaPaciente = new tablaExamenElastografia();
$tablaPaciente -> mostrarTabla();