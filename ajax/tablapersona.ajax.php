<?php 

require_once "../controladores/persona.controlador.php"; 
require_once "../modelos/person.modelo.php"; 

class tablapersona{
    public function mostrarTabla(){
        $respuesta= ControladorPersona::ctrMostrarPersona(null,null);
        if(count($respuesta)==0){
            $datosJson='{ "data":[] }';
            echo $datosJson;
            return;
        } 
        $datosJson = '{
            "data":[';
    
            foreach ($respuesta as $key => $value) {

             

        $acciones =" <div class='btn-group'><button class='btn btn-warning btn-sm editarpersona' data-toggle='modal' data-target='#editarpersona' editarid='".$value["identificacion"]."'><i class='fas fa-pencil-alt text-white'></i></button> <button class='btn btn-danger btn-sm eliminarPersonaRol'identificacion='".$value["identificacion"]."'><i class='fas fa-trash-alt'></i>";

        $persona= "<h6> ".$value["nombres"]." ".$value["apellidos"]."</h6>";



         if($value["id_estado"] == 1 ){

                $estado ="<button class='btn btn-success btn-sm btnActivar' idpersona=".$value["idpersona"]." id_estado=".$value["id_estado"].">Activado</button>";
                
            }else if($value["id_estado"] == 0){

                $estado ="<button class='btn btn-warning btn-sm btnActivar'  idpersona=".$value["idpersona"]." id_estado=".$value["id_estado"].">Desactivado</button>";
            }

         
        $datosJson .='[
                "'.$value["idpersona"].'",       
                "'.$estado.'",                
                "'.$value["identificacion"].'",
                "'.$persona.'",
                "'.$value["email_user"].'",
                "'.$value["nombrerol"].'",
                "'.$value["telefono"].'",          
                           
                "'.$acciones.'" ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}
$tablapersona = new tablapersona();
$tablapersona -> mostrarTabla();
