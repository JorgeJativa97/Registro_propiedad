
<?php 
require_once "MyCustomPDFWithWatermark.php";

require_once "../../../controladores/correcion.controlador.php";
require_once "../../../modelos/correcion.modelo.php";

require_once "../../../controladores/administracion.controlador.php";
require_once "../../../modelos/administracion.modelo.php";

class imprimirCorrecion{

public $cedula; 
public function traerImpresionCorrecion(){
//TRAEMOS LA INFORMACIÓN DEL MODALIDAD
$item = "cedula";
$valor = $this->cedula;
$respuesta= ControladorAdministracion::ctrMostrarAdministracion2($item, $valor);


$respuesta2= ControladorCorrecion::ctrMostrarCorrecion2("persona.cedula", $valor);

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
$pdf->AddPage("L", "LETTER" );
 
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
FORMULARIO DE RESULTADOS DE EVALUACION DE ANTEPROYECTOS DE TITULACIÓN

 <br>
(REVISIONES)
<br>
</b>
</h1>
 

EOF;
// output the HTML content
$pdf->writeHTML($bloque1, true, false, true, false, '');

setlocale(LC_TIME, "spanish");
$date = new Datetime($respuesta[(fecha_registroc)]);
$var1 = strftime("%d %B de %Y", $date->getTimestamp());

$bloque2 = <<<EOF

    <table style="font-size:10px; padding:5px 10px;font-family: pdfatimes;">

        <tr>        
        <td style=" border: 0.5px solid #FFFFFF; background-color:white; width:60px;text-align:left"><b>Fecha</b></td>
        <td style="border: 0.5px solid #FFFFFF;  background-color:white; width:570px; text-align:left">: $var1</td>
       
        </tr>
        <tr>        
        <td style="border: 0.5px solid  #FFFFFF; background-color:white; width:60px; text-align:left"><b>Tema</b></td>
        <td style="border: 0.5px solid  #FFFFFF; background-color:white; width:570px; text-align:left">: $respuesta[nombre_anteproyecto]</td>
       
        </tr>
        <tr>        
                <td style="border: 0.5px solid  #FFFFFF; background-color:white; width:60px; text-align:left"><b>Autor(a)</b></td>
                <td style="border: 0.5px solid  #FFFFFF; background-color:white; width:570px; text-align:left">: $respuesta[nombres] $respuesta[apellido_paterno] $respuesta[apellido_materno]
                </td>
       
        </tr>

        

    </table>
 <div>
 </div>
EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

$bloque3 = <<<EOF


    <table style="font-size:10px; padding:5px 10px;font-family: pdfatimes;">

        <tr>        
        <td style=" border: 0.5px solid #ccc; background-color:white; width:50px;text-align:left"><b>Pág</b></td>
        
     
        <td style="border: 0.5px solid  #ccc; background-color:white; width:193px; text-align:left"><b>Problema evidenciado</b></td>      
      
        <td style="border: 0.5px solid  #ccc; background-color:white; width:193px; text-align:left"><b>Solución requerida</b></td>
        <td style="border: 0.5px solid  #ccc; background-color:white; width:193px; text-align:left"><b>Sugerencias del revisor</b></td>
       
        </tr>

        

    </table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


    if(count($respuesta2)==0){  
    $bloque5 = <<<EOF

    <table style="font-size:10px; padding:5px 10px;">

        <tr>
            
            <td style="border: 1px solid #ccc; color:#333; background-color:white; width:630px; text-align:center">
                No contiene correcciones
            </td>
        </tr>

    </table>
EOF;
$pdf->writeHTML($bloque5, false, false, false, false, '');
} else {


foreach ($respuesta2 as $key => $value) {
$Sugerencia = $value[sugerencia];
$bloque4 = <<<EOF

    <table style="font-size:10px; padding:5px 10px;">

        <tr>
            
            <td style="border: 1px solid #ccc; color:#333; background-color:white; width:50px; text-align:center">
                $value[pagina]
            </td>
            <td style="border: 1px solid #ccc; color:#333; background-color:white; width:193px; text-align:center">
                $value[problema]
            </td>
            <td style="border: 1px solid #ccc; color:#333; background-color:white; width:193px; text-align:center">
                $value[solucion]
            </td>
            <td style="border: 1px solid #ccc; color:#333; background-color:white; width:193px; text-align:center">
            $Sugerencia
            </td>

        </tr>

    </table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');


}
 }


// Cerrar y generar un documento PDF
ob_end_clean();
$pdf->Output('correcion.pdf', 'I');

}

}

$correcion = new imprimirCorrecion();
$correcion -> cedula = $_GET["cedula"];
$correcion -> traerImpresionCorrecion();

?>
