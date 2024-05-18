<?php

require_once "conexion.php";

class ModeloPersona{

	/*============================================= 
	Mostrar personas con roles
	=============================================*/
	static public function mdlMostrarPersona($tabla, $item, $valor){

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
	MOSTRAR DATOS DE LAS PERSONAS CON SU ROL
	=============================================*/ 
    static public function mdlMostrarPersonaRol($tabla,$item, $valor){
        if($item !=null && $valor !=null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM persona
                                                    INNER JOIN rol on rol.idrol=persona.rolid where $item =:$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * , persona.status as id_estado FROM persona
                                                    INNER JOIN rol on rol.idrol=persona.rolid" );
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }
        $stmt -> close();
        $stmt = null; 

    }
	/*=============================================
	MOSTRAR DATOS DE LAS PERSONAS CON LA VARIABLE SESSION
	=============================================*/ 
        static public function mdlMostrarPersona0($tabla,$tabla4, $item, $valor){
        

        $sql = "SELECT * FROM persona WHERE $tabla.$item = $valor";  

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt = null;

    }

    /*=============================================
    Actualizar usuario para ESTADO USUARIO
    =============================================*/
     

    static public function  mdlActualizarEstadoUsuario($tabla,$item1, $valor1, $item2, $valor2){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item1 = :$item1");

        $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_INT);
        $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";
        
        }else{

            return "error"; 

        }

        $stmt -> close();
        $stmt = null;

    }


    /*=============================================
    INGRESAR USUARIO
    =============================================*/
    static public function mldIngresarPersona3($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombres,apellidos,email_user,password,telefono,identificacion,rolid, status) values(:nombres,:apellidos,:email_user,:password,:telefono,:identificacion,:rolid,:status)");
        $stmt -> bindParam(":nombres",$datos["nombres"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellidos",$datos["apellidos"], PDO::PARAM_STR);
        $stmt -> bindParam(":email_user",$datos["email_user"], PDO::PARAM_STR);
        $stmt -> bindParam(":password",$datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":telefono",$datos["telefono"], PDO::PARAM_STR);
        $stmt -> bindParam(":identificacion",$datos["identificacion"], PDO::PARAM_STR);
        $stmt -> bindParam(":rolid",$datos["rolid"], PDO::PARAM_STR);
        $stmt -> bindParam(":status",$datos["status"], PDO::PARAM_STR);
        if($stmt -> execute() ){
            return "ok";
        } else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;

    } 
    /*=============================================
    MOSTRAR DATOS DE LAS PERSONAS PARA VALIDAR CEDULA
    =============================================*/ 
    static public function mdlMostrarPersonaValidar($tabla,$item, $valor){
        if($item !=null && $valor !=null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM persona where $item =:$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT *  FROM persona" );
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }
        $stmt -> close();
        $stmt = null; 

    }
    /*=============================================
    MOSTRAR DATOS DE LAS PERSONAS PARA VALIDAR CORREO
    =============================================*/ 
    static public function mdlMostrarCorreo($tabla, $item, $valor){
        if($item !=null && $valor !=null){
            $stmt = Conexion::conectar()->prepare("SELECT * From $tabla where $item =:$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }
        $stmt -> close();
        $stmt = null;

    }


    /*=============================================
    MOSTRAR TODOS LOS ROLESPARA INGRESAR EL USUARIO
    =============================================*/  
static public function mdlMostrarRol($tabla, $item, $valor){

        if($item != null && $valor != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE $item = :$item");

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
    MOSTRAR PARA EDITAR PERSONA
    =============================================*/  

    static public function mdlMostrarPersonaRolE($tabla, $item, $valor){
        if($item !=null && $valor !=null){
            $stmt = Conexion::conectar()->prepare("SELECT * From $tabla where $item =:$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }
        $stmt -> close();
        $stmt = null;

    }

    /*=============================================
    Editar Persona perfil
=============================================*/ 

     static public function mldEditarPersona($tabla, $datos){

       $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres = :nombres, apellidos = :apellidos, telefono = :telefono, email_user = :email_user, rolid = :rolid WHERE identificacion = :identificacion");

        $stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":email_user", $datos["email_user"], PDO::PARAM_STR);
        $stmt -> bindParam(":rolid", $datos["rolid"], PDO::PARAM_STR);
        $stmt->bindParam(":identificacion", $datos["identificacion"], PDO::PARAM_STR); 

        

        if($stmt -> execute()){

            return "ok";
        
        }else{

            return "error"; 

        }

        $stmt -> close();

        $stmt = null;

    } 

    /*=============================================
    ELIMINAR PERSONA
    =============================================*/ 

    static public function mldEliminarPersonaRol($tabla, $identificacion){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE identificacion = :identificacion");

        $stmt -> bindParam(":identificacion", $identificacion, PDO::PARAM_INT);

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
    Actualizar usuario para OLVIDO DE CONTRASEÑA
    =============================================*/

    static public function mdlActualizarUsuario1($tabla, $id, $item, $valor){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE identificacion= :identificacion");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":identificacion", $id, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";

        }else{

            return print_r(Conexion::conectar()->errorInfo());

        }

        $stmt-> close();

        $stmt = null;
        
    }


/*=============================================
    Editar Persona perfil
=============================================*/ 

     static public function mldEditarPersonaPerfil($tabla, $datos){

       $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres = :nombres, apellidos = :apellidos, telefono = :telefono, email_user = :email_user WHERE identificacion = :identificacion");

        $stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":email_user", $datos["email_user"], PDO::PARAM_STR);        
        $stmt->bindParam(":identificacion", $datos["identificacion"], PDO::PARAM_STR); 

        

        if($stmt -> execute()){

            return "ok";
        
        }else{

            return "error"; 

        }

        $stmt -> close();

        $stmt = null;

    } 

}