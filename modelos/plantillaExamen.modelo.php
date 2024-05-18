<?php

require_once "conexion.php"; 

class ModeloPlantillaExamen{

    /*=============================================
	Mostrar Usuarios
	=============================================*/
	static public function mdlMostrarPlantillaExamen($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * from tipo_ecografia INNER JOIN tipo_examen ON tipo_ecografia.texa_codigo=tipo_examen.texa_codigo WHERE tipo_ecografia.tec_codigo=$valor");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * from tipo_ecografia INNER JOIN tipo_examen ON tipo_ecografia.texa_codigo=tipo_examen.texa_codigo");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}  

//     /*=============================================
// 	Mostrar Usuarios
// 	=============================================*/
// 	static public function mdlMostrarPersonal($tabla, $item, $valor){

// 		if($item != null && $valor != null){

// 			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

// 			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

// 			$stmt -> execute();

// 			return $stmt -> fetch();

// 		}else{

// 			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla");

// 			$stmt -> execute();

// 			return $stmt -> fetchAll();

// 		}

// 		$stmt-> close();

// 		$stmt = null;

// 	}  
 
 
    static public function mldIngresarExamen(){

          $texa_codigo = $_POST["nombreExamen"];
          $tec_formato = $_POST["descripcionPlan"];
          $tec_titulo = $_POST["titulo"];

        $stmt = Conexion::conectar()->prepare("CALL agregar_ecografias ('$texa_codigo','$tec_formato','$tec_titulo')");
        
        // $stmt -> bindParam(":nom_texa",$datos["nom_texa"], PDO::PARAM_STR);
        // $stmt -> bindParam(":per_codigo",$datos["per_codigo"], PDO::PARAM_STR);
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

static public function mldEditarExamen(){ 

    $tec_titulo = $_POST["editartitulo"];
    $tec_formato = $_POST["editardescripcionPlan"];
    $texa_codigo = $_POST["nombreExamenedit"];
    $tec_codigo = $_POST["editarPlantiExa"];

    $stmt = Conexion::conectar()->prepare("CALL actualizar_tipoeco('$texa_codigo','$tec_formato','$tec_titulo','$tec_codigo')");

    // $stmt -> bindParam(":nom_texa",$datos["editaegexamen"], PDO::PARAM_STR);
    // $stmt -> bindParam(":per_codigo",$datos["nombrePersonaledit"], PDO::PARAM_INT);
    // $stmt -> bindParam(":texa_codigo",$datos["editarExa"], PDO::PARAM_INT);
     

     if($stmt -> execute()){

         return "ok";
     
     }else{

         return "error"; 

     }

     $stmt -> close();

     $stmt = null;

 }  


// //   /*=============================================
// //     Eliminar persona
// //     =============================================*/ 

    static public function mldPlantillaExamnen(){ 

        $pexamen = $_POST["pexamen"];

        $stmt = Conexion::conectar()->prepare("CALL eliminar_tipoeco('$pexamen')");

        $stmt -> bindParam(":tec_codigo", $pexamen, PDO::PARAM_INT);

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
	static public function mdlMostrarPlantillaexamenn($valor){

		$sql="SELECT * from tipo_ecografia INNER JOIN tipo_examen ON tipo_ecografia.texa_codigo=tipo_examen.texa_codigo WHERE tipo_ecografia.tec_codigo=$valor";

		$stmt = Conexion::conectar()->prepare($sql);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt = null;
	} 

}