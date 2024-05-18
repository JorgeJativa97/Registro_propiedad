<?php 

require_once "../controladores/usuarios.controlador.php"; 
require_once "../modelos/usuarios.modelo.php"; 

class tablaUsuario{
    public function mostrarTabla(){

        $respuesta= ControladorUsuarios::ctrMostrarUsuario(null,null);

        if(count($respuesta)==0){

            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        }
        $datosJson = '{
            "data":[';
    
            foreach ($respuesta as $key => $value) { 
            
                $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarpersona' data-toggle='modal' data-target='#editarpersona' editarid='".$value["identificacion"]."'><i class='fas fa-pencil-alt text-white'></i></button> <button class='btn btn-danger btn-sm eliminarpersona'cedula='".$value["identificacion"]."'><i class='fas fa-trash-alt'></i>";
                

         
        $datosJson .='[
                "'.$value["nombres"].'",
                "'.$value["apellidos"].'", 
                "'.$value["identificacion"].'", 
                "'.$value["identificacion"].'",            
                "'.$acciones.'" ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablapersona = new tablaUsuario();
$tablapersona -> mostrarTabla();