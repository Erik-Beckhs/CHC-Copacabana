<?php
require './vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

ob_start();
//session_start();
$tipor=$_GET['r'];
    if(isset($_GET['ru'])){
        $f=$_GET['ru'];
    }
    if(isset($_GET['fecha'])){
        $fecha=$_GET['fecha'];
    }
switch($tipor){
    case 1: 
        require_once 'pdfusuario.php';
        break;
    case 2: 
        require_once 'pdfatractivo.php';
        break;
    case 3: 
        require_once 'pdfpaquete.php';
        break;
    case 4: 
        require_once 'pdfhotel.php';
        break;
    case 5: 
        require_once 'pdfhistorial.php';
        break;
    case 6: 
        require_once 'pdfhistorialFecha.php';
        break;
    case 7: 
        require_once 'pdfpaquete2.php';
        break;
    case 8: 
        //require_once 'pdfusuario.php';
        require_once 'pdfreserva.php';
        break;    
}
    //$html2pdf= new Html2Pdf('L', 'A4', 'es', 'TRUE', 'utf-8');
$contenido = ob_get_clean();
$html2pdf= new Html2Pdf($tipor==4?'L':'4', 'A4', 'es', 'TRUE', 'utf-8');
$html2pdf->writeHTML($contenido);
$html2pdf->output();

?>
