<?php

require_once "MyCustomPDFWithWatermark2.php";
require_once "../../../controladores/persona.controlador.php";
require_once "../../../modelos/persona.modelo.php";


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
class imprimirDocumento{
 
public $cedula; 
public function traerImpresionDocumento(){
//TRAEMOS LA INFORMACIÓN DEL MODALIDAD
//$item = "cedula";
$item = "cedula";
$valor = $this->cedula;

$respuesta = ControladorPersona::ctrMostrarEstudiante($item, $valor);
        
        

$pdf = new MyCustomPDFWithWatermark(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// ---------------------------------------------------------


// Crea un nuevo PDF pero usando nuestra propia clase que extiende TCPDF
$pdf = new MyCustomPDFWithWatermark(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// configurar la información del documento
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


<h1> <b>
CERTIFICACIÓN DEL TUTOR <br>
$valor
MODALIDAD ARTÍCULO DE ALTO NIVEL PROFESIONAL
<br>
</b>
</h1>

<p>
<br>
Yo, Ing. <b>$respuesta[nombres] $respuesta[apellido_paterno] $respuesta[apellido_materno] PhD,</b> designado como tutor por el Honorable Consejo Académico del Instituto de Posgrado, tengo a bien <b>CERTIFICAR:</b> que el articulo profesional de alto nivel, ha sido elaborado por la estudiante, bajo mi dirección y asesoramiento, en donde se han tomado en cuenta todos los señalamientos y observaciones realizados por parte de la revista, mismos que han permitido cumplir con lo establecido en el Instructivo para los trabajos de titulación de cuarto nivel del Instituto de Posgrado de la Universidad Técnica de Manabí, tal como se detalla a continuación:
<br>
<br>
</p>
EOF;
// output the HTML content
$pdf->writeHTML($bloque1, true, false, true, false, '');

$bloque3 = <<<EOF

    <table style="font-size:10px; padding:5px 10px;font-family: pdfatimes;">

        <tr>        
        <td style=" border: 0.5px solid #ccc; border-bottom-color: 5px #EEEEEE;background-color:white; width:120px;text-align:left">Programa</td>
        <td style="border: 0.5px solid  #ccc; border-bottom-color: 5px  #EEEEEE; background-color:white; width:310px; text-align:left">Maestría en Pedagogía de la Cultura Física</td>
       
        </tr>
        <tr>        
        <td style="border: 0.5px solid  #ccc; background-color:white; width:120px; text-align:left">Apellidos nombres del
Estudiante</td>
        <td style="border: 0.5px solid  #ccc; background-color:white; width:310px; text-align:left">Douglas Macias</td>
       
        </tr>
        <tr>        
        <td style="border: 0.5px solid  #ccc; background-color:white; width:120px; text-align:left">Tema</td>
        <td style="border: 0.5px solid  #ccc; background-color:white; width:310px; text-align:left">EL DESARROLLO DE LA CREATIVIDAD PROFESIONAL EN LA FORMACIÓN
PEDAGÓGICA DE LA CULTURA FÍSICA,</td>
       
        </tr>
        <tr>        
                <td style="border: 0.5px solid  #ccc; background-color:white; width:120px; text-align:left">Modalidad</td>
                <td style="border: 0.5px solid  #ccc; background-color:white; width:310px; text-align:left">Articulo profesional de alto nivel
                </td>
       
        </tr>

        <tr>        
                <td style="border: 0.5px solid  #ccc; background-color:white; width:120px; text-align:left">Nombre de la Revista </td>
                <td style="border: 0.5px solid  #ccc; background-color:white; width:310px; text-align:left">revista Cognosis </td>
       
        </tr>

        <tr >        
                    <td style="border: 0.5px solid  #ccc; background-color:white; width:120px; height:2px; text-align:left">Estado en que se          encuentra el artículo </td>
                    <td style="border: 0.5px solid  #ccc; background-color:white; width:141px; text-align:left">Aceptado para publicación</td>
                    
                    <td style="border: 0.5px solid  #ccc; background-color:white; width:26px; text-align:left"> </td>

                    <td style="border: 0.5px solid  #ccc; background-color:white; width:113px; text-align:left">Articulo ya publicado </td>
                    <td style="border: 0.5px solid  #ccc; background-color:white; width:30px; font-weight:bold; text-align:center">X</td>   
                    <br>
                    <br>   
        </tr>

    </table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');
$bloque4 = <<<EOF
<style>
p {
        text-align: justify;        
        font-family: pdfatimes;
        font-size: 12.5pt;
        line-height : 17px;
    }
</style>
<p>
<br>
Es oportuno expresar lo satisfactorio que ha sido trabajar con el estudiante, para lograr esta producción científica, que contribuye a visibilizar la socialización de los resultados logrados en el presente trabajo de titulación previo al acto de defensa pública. 
</p>

<p style="line-height:5px">
Particular que me permito certificar, para los trámites pertinentes.
<br>
</p>

<p style="text-align:right">
Portoviejo, <b>4</b> de <b>septiembre</b> de 2020
</p>

<table style=" font-family: pdfatimes; font-size:12px; padding:5px 10px; line-height:5px;">

        <tr>        
         <td style="border: hidden; background-color:white; width:80px; height:2px; text-align:left"> </td>
        <td style="border: hidden; background-color:white; width:310px; text-align:center">Atentamente,</td>
       
        </tr>
                <tr>        
         <td style="border: hidden; background-color:white; width:80px; height:2px; text-align:left"> </td>
        <td style="border: hidden; background-color:white; width:310px; text-align:center"> </td>
       
        </tr>
        <tr>        
         <td style="border: hidden; background-color:white; width:80px; height:2px; text-align:left"> </td>
        <td style="border: hidden; background-color:white; width:310px; text-align:center"> </td>
       
        </tr>

        <tr>        
         <td style="border: hidden; background-color:white; width:80px; height:2px; text-align:left"> </td>
        <td style="border: hidden; background-color:white; width:310px; text-align:center">_________________________________</td>
       
        </tr>

        <tr>        
         <td style="border: hidden; background-color:white; width:80px; height:2px; text-align:left"> </td>
        <td style="border: hidden; background-color:white; width:310px; text-align:center; font-weight:bold">Ing. Jimmy Manuel Zambrano Acosta PhD </td>
       
        </tr>
                <tr>        
         <td style="border: hidden; background-color:white; width:80px; height:2px; text-align:left"> </td>
        <td style="border: hidden; background-color:white; width:310px; text-align:center; font-weight:bold">TUTOR DEL TRABAJO DE TITULACIÓN</td>
       
        </tr>


</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('documento.pdf', 'I');

}

}

$documento = new imprimirDocumento();
$documento -> cedula = $_GET["cedula"];
$documento -> traerImpresionDocumento();


//============================================================+
// END OF FILE
//============================================================+
  ?>
 