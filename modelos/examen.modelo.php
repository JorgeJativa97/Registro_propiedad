<?php

require_once "conexion.php"; 

class ModeloExamen{

    /*============================================= 
	Mostrar Usuarios
	=============================================*/
	static public function mdlMostrarExamen($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * from tipo_examen INNER JOIN personal on tipo_examen.per_codigo = personal.per_codigo WHERE tipo_examen.texa_codigo=$valor");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * from tipo_examen INNER JOIN personal on tipo_examen.per_codigo = personal.per_codigo");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}  

    /*=============================================
	Mostrar Usuarios
	=============================================*/
	static public function mdlMostrarPersonal($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}  
 
 
    static public function mldIngresarExamen(){

          $nom_texa = $_POST["regexamen"];
          $per_codigo = $_POST["nombrePersonal"];
    

        $stmt = Conexion::conectar()->prepare("CALL agg_tipo_exa ('$per_codigo','$nom_texa')");
        
        $stmt -> bindParam(":nom_texa",$datos["nom_texa"], PDO::PARAM_STR);
        $stmt -> bindParam(":per_codigo",$datos["per_codigo"], PDO::PARAM_STR);
        if($stmt -> execute() ){
            return "ok";
        } else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;

    }  

//      /*=============================================
//     Editar Persona perfil
//     =============================================*/ 

static public function mldEditarExamen(){ 

    $nom_texa = $_POST["editaegexamen"];
    $per_codigo = $_POST["nombrePersonaledit"];
    $texa_codigo = $_POST["editarExa"];

    $stmt = Conexion::conectar()->prepare("CALL actualiza_tipoexa('$nom_texa','$per_codigo','$texa_codigo')");

    $stmt -> bindParam(":nom_texa",$datos["editaegexamen"], PDO::PARAM_STR);
    $stmt -> bindParam(":per_codigo",$datos["nombrePersonaledit"], PDO::PARAM_INT);
    $stmt -> bindParam(":texa_codigo",$datos["editarExa"], PDO::PARAM_INT);
     

     if($stmt -> execute()){

         return "ok";
     
     }else{

         return "error"; 

     }

     $stmt -> close();

     $stmt = null;

 }  


//   /*=============================================
//     Eliminar persona
//     =============================================*/ 

    static public function mldExamnen(){ 
 
        $examen = $_POST["examen"];

        $stmt = Conexion::conectar()->prepare("CALL eliminar_tipoexa('$examen')"); 

        $stmt -> bindParam(":texa_codigo", $examen, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";
        
        }else{

            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt -> close();

        $stmt = null;

    } 

}