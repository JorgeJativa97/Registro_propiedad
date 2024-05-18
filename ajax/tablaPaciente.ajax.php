<?php 

require_once "../controladores/paciente.controlador.php"; 
require_once "../modelos/paciente.modelo.php"; 

class tablaPaciente{
    public function mostrarTabla(){

        $respuesta= ControladorPaciente::ctrMostrarPaciente(null,null);

        if(count($respuesta)==0){

            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        }
        $datosJson = '{
            "data":[';
    
            foreach ($respuesta as $key => $value) { 
            
                $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarPaciente' data-toggle='modal' data-target='#editarPaciente' editarPac='".$value["pac_codigo"]."'><i class='fas fa-pencil-alt text-white'></i></button> <button class='btn btn-danger btn-sm eliminarpaciente'codigo='".$value["pac_codigo"]."'><i class='fas fa-trash-alt'></i>";
                

         
        $datosJson .='[
                "'.$value["pac_nombres"].'",
                "'.$value["pac_apellidos"].'", 
                "'.$value["pac_identificacion"].'", 
                "'.$value["pac_fechanac"].'",
                "'.$value["pac_direccion"].'",    
                "'.$value["pac_edad"].'",    
                "'.$value["pac_telefono"].'",                
                "'.$acciones.'" ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablaPaciente = new tablaPaciente();
$tablaPaciente -> mostrarTabla();