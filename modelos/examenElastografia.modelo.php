<?php

require_once "conexion.php"; 

class ModeloExamenElastografia{

    /*=============================================
	Mostrar Usuarios
	=============================================*/
	static public function mdlMostrarExamenElastografia($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM elastografia_hepatica INNER JOIN paciente ON elastografia_hepatica.pac_codigo = paciente.pac_codigo WHERE elastografia_hepatica.$item = $valor");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM elastografia_hepatica INNER JOIN paciente ON elastografia_hepatica.pac_codigo = paciente.pac_codigo");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}  

    /* registro   '$regnombre','$regapellidos','$fechanacimiento','$edad','$direccion','$telefono','$regcedula'*/
 

    static public function mldIngresarExamenElastografia(){

        date_default_timezone_set('America/Bogota'); 
	      $fechaActual = date('Y-m-d'); 
          $paciente = $_POST["codPaciente"];
          $muestra = $_POST["nmuestra"];
          $piel = $_POST["dpiel"];
          $m1 =  $_POST["muestra1"];
          $m2 =  $_POST["muestra2"];
          $m3 =  $_POST["muestra3"];
          $m4 =  $_POST["muestra4"];
          $m5 =  $_POST["muestra5"];
          $m6 =  $_POST["muestra6"];
          $m7 =  $_POST["muestra7"];
          $m8 =  $_POST["muestra8"];
          $m9 =  $_POST["muestra9"];
          $m10 =  $_POST["muestra10"];
          $m11 =  $_POST["muestra11"];
          $m12 =  $_POST["muestra12"];
          $m13 =  $_POST["muestra13"];
          $m14 =  $_POST["muestra14"];
          $m15 =  $_POST["muestra15"];
          $m16 =  $_POST["muestra16"];
          $rigidezS =  $_POST["rigidezS"];
          $rigidezM = $_POST["rigidezM"];
          $rigidezP = $_POST["rigidezP"];
          $diagnostico = $_POST["diagnostico"];
         

        $stmt = Conexion::conectar()->prepare("CALL agg_pac_elastografia ('$paciente','$fechaActual','$muestra','$piel','$m1','$m2','$m3','$m4','$m5','$m6','$m7','$m8','$m9','$m10','$m11','$m12','$m13','$m14','$m15','$m15','$rigidezS','$rigidezM','$rigidezP','$diagnostico')");
        // $stmt -> bindParam(":pac_nombres",$datos["pac_nombres"], PDO::PARAM_STR);
        // $stmt -> bindParam(":pac_apellidos",$datos["pac_apellidos"], PDO::PARAM_STR);
        // $stmt -> bindParam(":pac_fechanac",$datos["pac_fechanac"], PDO::PARAM_STR);
        // $stmt -> bindParam(":pac_identificacion",$datos["pac_identificacion"], PDO::PARAM_STR);
        // $stmt -> bindParam(":pac_edad",$datos["pac_edad"], PDO::PARAM_STR);
        // $stmt -> bindParam(":pac_direccion",$datos["pac_direccion"], PDO::PARAM_STR);
        // $stmt -> bindParam(":pac_telefono",$datos["pac_telefono"], PDO::PARAM_STR);
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

static public function mldEditarExamenElastografia(){ 

    $codigo_elasto=$_POST["ela"];
    $fecha=$_POST["efecha"];
	$nmuestra=$_POST["enmuestra"];
	$dispiel= $_POST["edpiel"];
	$r1=$_POST['emuestra1'];
    $r2=$_POST['emuestra1'];
	$r3=$_POST['emuestra1'];
    $r4=$_POST['emuestra1'];
    $r5=$_POST['emuestra1'];
    $r6=$_POST['emuestra1'];
	$r7=$_POST['emuestra1'];
    $r8=$_POST['emuestra1'];
    $r9=$_POST['emuestra1'];
    $r10=$_POST['emuestra1'];
	$r11=$_POST['emuestra1'];
    $r12=$_POST['emuestra1'];
    $r13=$_POST['emuestra1'];
    $r14=$_POST['emuestra1'];
	$r15=$_POST['emuestra1'];
    $r16=$_POST['emuestra1'];
    $riestde=$_POST['erigidezS'];
    $rigidezmedia=$_POST['erigidezM'];
    $rpromedia=$_POST['erigidezP'];
    $diagnostic=$_POST['ediagnostico'];

    $stmt = Conexion::conectar()->prepare("CALL actualizar_paciente_elasto('$codigo_elasto','$fecha','$nmuestra','$dispiel',
    '$r1','$r2','$r3','$r4','$r5','$r6','$r7','$r8','$r9','$r10',
    '$r11','$r12','$r13','$r14','$r15','$r16','$rpromedia','$riestde','$rigidezmedia','$diagnostic')");     

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

    static public function mldExamenElastografia(){ 

        $elastografia = $_POST["elastografia"];

        $stmt = Conexion::conectar()->prepare("CALL eliminar_paciente_elastografia('$elastografia')");

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