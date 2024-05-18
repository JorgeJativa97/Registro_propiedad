<?php

require_once "MyCustomPDFWithWatermark2.php";
 
require_once "../../../controladores/anteproyecto.controlador.php"; 
require_once "../../../modelos/anteproyecto.modelo.php"; 

require_once "../../../controladores/aprobacion.controlador.php"; 
require_once "../../../modelos/aprobacion.modelo.php"; 

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
class imprimirAprobacion{
 
public $cedula;  
public function traerImpresionAprobacion(){
//TRAEMOS LA INFORMACIÓN DEL MODALIDAD
//$item = "cedula";
$item = "cedula";
$valor = $this->cedula;


$respuesta = ControladorAnteproyecto::ctrmostrardatosAprobacion($item, $valor);        
//echo '<pre>'; print_r($respuesta); echo '</pre>'; 
//TRAEMOS LA FECHA DE APROBACION 
setlocale(LC_TIME, "spanish");
$date = new Datetime($respuesta[("fecha_aprobacion")]);
$fecha = strftime("%d de %B de %Y", $date->getTimestamp());

//TRAEMOS DE LA APROBACION DE LA TESIS
$respuesta2 = ControladorAnteproyecto::ctrmostrardatosAprobacion2($item, $valor); 

//TRAEMOS DEL TUTOR
$valor1=$respuesta2["id_anteproyecto"];    
$respuesta3 = ControladorAnteproyecto::ctrmostrardatosAprobacion3($item, $valor,$valor1); 
//echo '<pre>'; print_r($respuesta3); echo '</pre>'; 
//TRAEMOS DEL COTUTOR
$valor2=$respuesta2["id_anteproyecto"];    
$respuesta4 = ControladorAnteproyecto::ctrmostrardatosAprobacion4($item, $valor,$valor2); 
//echo '<pre>'; print_r($respuesta4); echo '</pre>'; 
 

if($respuesta4["nombreCotutor"]!=Null){ 
$Cotutor ="y Cotutor ".$respuesta4["nombreCotutor"]." ";
}else{
$Cotutor =" ";
 }
//TRAEMOS EL COORDINADOR
$valor3=$respuesta["id_programa"];
$respuesta5 = ControladorAnteproyecto::ctrmostrardatosAprobacion5($item, $valor,$valor3); 
//echo '<pre>'; print_r($respuesta5); echo '</pre>';
$pdf = new MyCustomPDFWithWatermark(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// ---------------------------------------------------------


// Crea un nuevo PDF pero usando nuestra propia clase que extiende TCPDF
$pdf = new MyCustomPDFWithWatermark(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetAuthor('Our Code World');
 
// establecer fuente monoespaciada predeterminada
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// establecer datos de encabezado predeterminados
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
// establecer márgenes
$pdf->SetMargins('30', '35', '25');
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetFont('aealarabiya', '', 14);

// Agregar una página
$pdf->AddPage();
// ---------------------------------------------------------
// Crea contenido HTML
$bloque1 = <<<EOF
<style>
    h1 {
        font-family: pdfatimes;
        text-align:center; 
        color: #02410a; 
        font-size:11.5px; 
        font-weight: 900;
        line-height : 15px;        
    }


    p {
        text-align: justify;        
        font-family: pdfatimes;
        font-size: 12.5pt;
        line-height : 17px;
    }
    p.first span {
        color: #006600;
        font-style: italic;
    }
    p#second {
        color: rgb(00,63,127);
        font-family: times;
        font-size: 12pt;
        text-align: justify;
    }
    p#second > span {
        background-color: #FFFFAA;
    }
    table.first {
        color: #003300;
        font-family: helvetica;
        font-size: 8pt;
        border-left: 3px solid red;
        border-right: 3px solid #FF00FF;
        border-top: 3px solid green;
        border-bottom: 3px solid blue;
        background-color: #ccffcc;
    }
    td {
        border: 2px solid blue;
        background-color: #ffffee;
    }
    td.second {
        border: 2px dashed green;
    }
    div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: helvetica;
        font-size: 10pt;
        border-style: solid solid solid solid;
        border-width: 2px 2px 2px 2px;
        border-color: green #FF00FF blue red;
        text-align: center;
    }
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }
    .capitalize {
        text-transform: capitalize;
    }
</style>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">


<p align="right">
Oficio Nº0499T-IP-UTM <br>
Portoviejo,$fecha <br>
</p>





<p align="justify">
<br>Estudiante  <br>
$respuesta[nombres] $respuesta[apellido_paterno] $respuesta[apellido_materno] <br>
<b>$respuesta[programa]<br>
Ciudad.-</b>
<br>
<br>
</p>

<p align="justify">
<br>
De mi consideración:  <br> <br>

En referencia a su solicitud de fecha 03 de agosto de 2021, se autoriza el cambio tutor de su trabajo de titulación: <b>“$respuesta[nombre_anteproyecto]”</b>, bajo la Proyecto de Investigación designando como tutor(a) $respuesta3[nombreTutor] $Cotutor
 <br>

<br>Con sentimientos de distinguida consideración y estima.<br><br><br>
<br>Atentamente,<br>
PATRIA, TÉCNICA Y CULTURA 
<br>
<br>
<br>
<br>

<br>
</p>

<p>
<br>Ing. Santiago Quiroz Fernández, PhD<br>
<b>Director – Presidente Consejo Académico <br>
Instituto de Posgrado <br>
Universidad Técnica de Manabí<br>
</b>

<br>
</p>
<p>
<br>c.c $respuesta3[nombreTutor]   –Tutor(a)<br>

c.c $respuesta5[coordinadorP]  - Coordinador de la Maestría
</p>
<h7></h7>
EOF;
// output the HTML content
$pdf->writeHTML($bloque1, true, false, true, false, '');



// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('aprobacion.pdf', 'I');

}

}

$aprobacion = new imprimirAprobacion();
$aprobacion-> cedula = $_GET["cedula"];
$aprobacion -> traerImpresionAprobacion();


//============================================================+
// END OF FILE
//============================================================+
  ?>