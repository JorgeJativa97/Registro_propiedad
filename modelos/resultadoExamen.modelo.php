<?php

require_once "conexion.php"; 

class ModeloResultadoExamen{

    /*============================================= 
	Mostrar Usuarios
	=============================================*/
	static public function mdlMostrarResultadoExamen($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * from paciente_ecografia INNER JOIN paciente ON paciente_ecografia.pac_codigo = paciente.pac_codigo INNER JOIN tipo_ecografia ON tipo_ecografia.tec_codigo = paciente_ecografia.tec_codigo WHERE paciente_ecografia.eco_codigo=$valor");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * from paciente_ecografia INNER JOIN paciente ON paciente_ecografia.pac_codigo = paciente.pac_codigo INNER JOIN tipo_ecografia ON tipo_ecografia.tec_codigo = paciente_ecografia.tec_codigo");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}  
 
 
    static public function mldIngresarResultadoExamen(){

          $paciente = $_POST["codPaciente"];
          $codtitulo = $_POST["codExamen"];
		  $titu = $_POST["tituloExamen"];

        $stmt = Conexion::conectar()->prepare("CALL agg_pac_eco ('$paciente','$codtitulo','$titu')");
        
        // $stmt -> bindParam(":pac_codigo",$datos["pac_codigo"], PDO::PARAM_STR);
        // $stmt -> bindParam(":tec_codigo",$datos["tec_codigo"], PDO::PARAM_STR);
		// $stmt -> bindParam(":tituloExamen",$datos["tituloExamen"], PDO::PARAM_STR);
        if($stmt -> execute() ){
            return "ok";
        } else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;

    }  

// //      /*=============================================
// //     Editar Persona perfil
// //     =============================================*/ 

// static public function mldEditarExamen(){ 

//     $nom_texa = $_POST["editaegexamen"];
//     $per_codigo = $_POST["nombrePersonaledit"];
//     $texa_codigo = $_POST["editarExa"];

//     $stmt = Conexion::conectar()->prepare("CALL actualiza_tipoexa('$nom_texa','$per_codigo','$texa_codigo')");

//     $stmt -> bindParam(":nom_texa",$datos["editaegexamen"], PDO::PARAM_STR);
//     $stmt -> bindParam(":per_codigo",$datos["nombrePersonaledit"], PDO::PARAM_INT);
//     $stmt -> bindParam(":texa_codigo",$datos["editarExa"], PDO::PARAM_INT);
     

//      if($stmt -> execute()){

//          return "ok";
     
//      }else{

//          return "error"; 

//      }

//      $stmt -> close();

//      $stmt = null;

//  }  


// //   /*=============================================
// //     Eliminar persona
// //     =============================================*/ 

    static public function mldResultadoExamnen(){ 

        $rexamen = $_POST["rexamen"];

        $stmt = Conexion::conectar()->prepare("CALL eliminar_paciente_ecografia('$rexamen')"); 

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
	static public function mdlMostrarEditarResultadoexamen($tabla,$item,$valor){

		$sql="SELECT * from paciente_ecografia INNER JOIN paciente ON paciente_ecografia.pac_codigo = paciente.pac_codigo INNER JOIN tipo_ecografia ON tipo_ecografia.tec_codigo = paciente_ecografia.tec_codigo WHERE paciente_ecografia.eco_codigo=$valor";

		$stmt = Conexion::conectar()->prepare($sql);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt = null;
	} 

}