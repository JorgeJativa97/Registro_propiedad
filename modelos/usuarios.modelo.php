<?php

require_once "conexion.php"; 

class ModeloUsuarios{

    /*=============================================
	Mostrar Usuarios
	=============================================*/
	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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

    /*=============================================
	Mostrar Usuarios
	=============================================*/

	static public function mdlMostrarUser($tabla, $item, $valor){


            $sql = "SELECT * FROM persona";    
    
            $stmt = Conexion::conectar()->prepare($sql);
    
            $stmt -> execute();
    
            return $stmt -> fetchAll();
    
            $stmt = null;
    
        

    } 

     /*=============================================
	Mostrar Usuarios
	=============================================*/

	static public function mdlMostrarUserEditar($tabla, $item, $valor){


        $sql = "SELECT * FROM usuario INNER JOIN user ON usuario.cedula = user.cedula where usuario.$item = $valor";    

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt = null;

    

} 


    /* registro */
    static public function mldIngresarPersona($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_apellido,usuario,password,cedula,estado) values(:nombre_apellido,:usuario,:password,:cedula,:estado)");
        $stmt -> bindParam(":nombre_apellido",$datos["nombre_apellido"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario",$datos["usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":password",$datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":cedula",$datos["cedula"], PDO::PARAM_STR);
        $stmt -> bindParam(":estado",$datos["estado"], PDO::PARAM_STR);
        if($stmt -> execute() ){
            return "ok";
        } else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;

    } 


    /* registro */
    static public function mldIngresarUser($tabla2, $datos2){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2(cedula,rol) values(:cedula,:rol)");
        $stmt -> bindParam(":cedula",$datos2["cedula"], PDO::PARAM_STR);
        $stmt -> bindParam(":rol",$datos2["rol"], PDO::PARAM_STR);
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

static public function mldEditarUsuario($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_apellido = :nombre_apellido, usuario = :usuario, password = :password WHERE cedula = :cedula");

     $stmt -> bindParam(":nombre_apellido", $datos["nombre_apellido"], PDO::PARAM_STR);
     $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
     $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
     $stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR); 

     

     if($stmt -> execute()){

         return "ok";
     
     }else{

         return "error"; 

     }

     $stmt -> close();

     $stmt = null;

 } 

 /*=============================================
    Editar Persona perfil rol
    =============================================*/ 

static public function mldEditarUsuarioRol($tabla2, $datos2){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla2 SET rol = :rol WHERE cedula = :cedula");

     $stmt -> bindParam(":rol", $datos2["rol"], PDO::PARAM_STR);
     $stmt->bindParam(":cedula", $datos2["cedula"], PDO::PARAM_STR); 

     

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

    static public function mldEliminarPersona($tabla, $cedula){

        $stmt = Conexion::conectar()->prepare("DELETE a1, a2 FROM usuario AS a1 INNER JOIN user as a2 WHERE a1.cedula = a2.cedula AND a1.cedula = :cedula");

        $stmt -> bindParam(":cedula", $cedula, PDO::PARAM_INT);

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
	Mostrar Usuarios
	=============================================*/

	static public function mdlMostrar($tabla, $item, $valor){


        $sql = "SELECT * FROM usuario INNER JOIN user ON usuario.cedula=user.cedula WHERE usuario.$item = $valor";    

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt = null;

    }

}