<?php 
require_once('tcpdf_include.php');
class MyCustomPDFWithWatermark extends TCPDF {
    public function Header() {
        // Obtener el margen de salto de página actual
        $bMargin = $this->getBreakMargin();

        // Obtener el modo actual de salto de página automático
        $auto_page_break = $this->AutoPageBreak;

        // Deshabilitar el salto de página automático
        $this->SetAutoPageBreak(false, 0);

        // Defina la ruta a la imagen que desea usar como marca de agua.
        $img_file = 'images/LogoRocafuerte.png';

        // Renderizar la imagen
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);

        // Restaurar el estado de salto de página automático
        $this->SetAutoPageBreak($auto_page_break, $bMargin);

        // Establecer el punto de partida para el contenido de la página
        $this->setPageMark();
    }
}