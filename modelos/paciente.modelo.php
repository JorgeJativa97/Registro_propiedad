<?php

require_once "conexion.php"; 

class ModeloPaciente{

    /*=============================================
	Mostrar Usuarios
	=============================================*/
	static public function mdlMostrarPaciente($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$valor");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}  

    /* registro   '$regnombre','$regapellidos','$fechanacimiento','$edad','$direccion','$telefono','$regcedula'*/
 

    static public function mldIngresarPaciente(){

          $regnombre = $_POST["regnombre"];
          $regapellidos = $_POST["regapellidos"];
          $fechanacimiento = $_POST["fechanacimiento"];
          $edad =  $_POST["edad"];
          $direccion =  $_POST["direccion"];
          $telefono = $_POST["telefono"];
          $regcedula = $_POST["regcedula"];
         

        $stmt = Conexion::conectar()->prepare("CALL Agregar_paciente ('$regnombre','$regapellidos','$fechanacimiento','$edad','$direccion','$telefono','$regcedula')");
        $stmt -> bindParam(":pac_nombres",$datos["pac_nombres"], PDO::PARAM_STR);
        $stmt -> bindParam(":pac_apellidos",$datos["pac_apellidos"], PDO::PARAM_STR);
        $stmt -> bindParam(":pac_fechanac",$datos["pac_fechanac"], PDO::PARAM_STR);
        $stmt -> bindParam(":pac_identificacion",$datos["pac_identificacion"], PDO::PARAM_STR);
        $stmt -> bindParam(":pac_edad",$datos["pac_edad"], PDO::PARAM_STR);
        $stmt -> bindParam(":pac_direccion",$datos["pac_direccion"], PDO::PARAM_STR);
        $stmt -> bindParam(":pac_telefono",$datos["pac_telefono"], PDO::PARAM_STR);
        if($stmt -> execute() ){
            return "ok";
        } else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;

    }  

     /*=============================================
    Editar Persona perfil
    =============================================*/ 

static public function mldEditarPaciente(){ 

    $regnombre = $_POST["editarnombre"];
    $regapellidos = $_POST["editarapellidos"];
    $fechanacimiento = $_POST["editarfechanacimiento"];
    $edad =$_POST["editaredad"];
    $direccion =  $_POST["editardireccion"];
    $telefono = $_POST["editartelefono"];
    $regcedula = $_POST["editarcedula"];
    $codigo = $_POST["editarPac"]; 

    $stmt = Conexion::conectar()->prepare("CALL actualizar_paciente('$regnombre','$regapellidos','$regcedula','$fechanacimiento','$direccion','$edad','$telefono','$codigo')");

    $stmt -> bindParam(":pac_nombres",$datos["pac_nombres"], PDO::PARAM_STR);
    $stmt -> bindParam(":pac_apellidos",$datos["pac_apellidos"], PDO::PARAM_STR);
    $stmt -> bindParam(":pac_fechanac",$datos["pac_fechanac"], PDO::PARAM_STR);
    $stmt -> bindParam(":pac_identificacion",$datos["pac_identificacion"], PDO::PARAM_STR);
    $stmt -> bindParam(":pac_edad",$datos["pac_edad"], PDO::PARAM_STR);
    $stmt -> bindParam(":pac_direccion",$datos["pac_direccion"], PDO::PARAM_STR);
    $stmt -> bindParam(":pac_telefono",$datos["pac_telefono"], PDO::PARAM_STR); 

     

     if($stmt -> execute()){

         return "ok";
     
     }else{

         return "error"; 

     }

     $stmt -> close();

     $stmt = null;

 }  


  /*=============================================
    Eliminar persona
    =============================================*/ 

    static public function mldPaciente(){ 

        $codigo = $_POST["codigo"];

        $stmt = Conexion::conectar()->prepare("CALL eliminar_paciente('$codigo')");

        $stmt -> bindParam(":pac_codigo", $codigo, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";
        
        }else{

            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt -> close();

        $stmt = null;

    } 

    /*=============================================
	=============================================*/
	static public function mdlMostrarPacientecod($valor){

		$sql="SELECT * from paciente WHERE pac_codigo=$valor";

		$stmt = Conexion::conectar()->prepare($sql);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt = null;
	} 
}