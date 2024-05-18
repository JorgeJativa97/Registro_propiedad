<?php
require_once "MyCustomPDFWithWatermark2.php";
 
require_once "../../../controladores/pagos.controlador.php"; 
require_once "../../../modelos/pagos.modelo.php"; 
 
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document 
class imprimirActividad{
 
 
public $idactividad; 
public function traerImpresionActividad(){

$item = "id_actividad";
$valor = $this->idactividad;


$respuesta = Controladorpagos::ctrMostrarpagosPDF($item, $valor);        
//$adjunto = json_decode($respuesta[0]["archivos_adj"], true); 
// echo '<pre>'; print_r($respuesta); echo '</pre>';

setlocale(LC_TIME, "spanish");
            $date = new Datetime($respuesta["fecha"]);
            $var1 = strftime("%d %B de %Y", $date->getTimestamp()); 



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
// Image example with resizing

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
Rocafuerte, $var1  <br>
</p>

<h1> 

</h1>
<p align="right">
<h1> 
</h1>
</p>


EOF;


// output the HTML content
$pdf->writeHTML($bloque1, true, false, true, false, '');

$bloque3 = <<<EOF

    <table style="font-size:10px; padding:5px 10px;font-family: pdfatimes;">

        <tr>        
        <td style=" border: 0.5px solid #ccc; border-bottom-color: 5px #EEEEEE;background-color:white; width:120px;text-align:left">Dueño</td>
        <td style="border: 0.5px solid  #ccc; border-bottom-color: 5px  #EEEEEE; background-color:white; width:310px; text-align:left">$respuesta[nombre_apellido]</td>
       
        </tr>
 
    </table>

EOF;
 
$pdf->writeHTML($bloque3, false, false, false, false, '');

//foreach ($respuesta2 as $key => $value) {
//$Porcentaje = $value[porcentaje];

$bloque4 = <<<EOF

    <table style="font-size:10px; padding:5px 10px;font-family: pdfatimes;">

        <tr>        
                <td style="border: 0.5px solid  #ccc; background-color:white; width:120px; text-align:left">Descripcion de Pago</td>
                <td style="border: 0.5px solid  #ccc; background-color:white; width:310px; text-align:left">$respuesta[descripcion]
                </td>
       
        </tr>


 
    </table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');


$bloque5 = <<<EOF

    <table style="font-size:10px; padding:5px 10px;font-family: pdfatimes;">



        <tr>        
                <td style="border: 0.5px solid  #ccc; background-color:white; width:120px; text-align:left">Comprobante de Pago</td>
                <td style="border: 0.5px solid  #ccc; background-color:white; width:310px; text-align:left">$respuesta[comprobante]
                </td>
       
        </tr>
        <tr>        
                <td style="border: 0.5px solid  #ccc; background-color:white; width:120px; text-align:left">Fecha de Pago</td>
                <td style="border: 0.5px solid  #ccc; background-color:white; width:310px; text-align:left">$respuesta[fecha_pago]
                </td> 

                
       
        </tr>
        
        <tr>        
        <td style="border: 0.5px solid  #ccc; background-color:white; width:120px; text-align:left">Fecha de Proximo Pago</td>
        <td style="border: 0.5px solid  #ccc; background-color:white; width:310px; text-align:left">$respuesta[fecha_proximo_pago]
        </td> 

        

        </tr>

        
  
    </table>
<br>
<h1 style="font-family: pdfatimes;text-align:center;color: #02410a;font-size:11.5px;font-weight: 900;line-height:15px;"> 

</h1>
<br>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');
//$ruta="../\../\../vistas\/img\/avances\/8\/169.jpg";
//$respuesta["archivos_adj"]
//$imgdata = base64_decode($respuesta["archivos_adj"]);
//$pdf->Image($adjunto,  50, 140, 75, 75, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);
// Close and output PDF document
// This method has several options, check the source code documentation for more information.



$pdf->Output('actividad.pdf', 'I');
error_reporting(0);
}

}

$actividad = new imprimirActividad();
$actividad-> idactividad = $_GET["idactividad"];
$actividad -> traerImpresionActividad();


//============================================================+
// END OF FILE
//============================================================+
  ?>
 