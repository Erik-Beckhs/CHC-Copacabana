<?php
require './vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

ob_start();
require_once 'prueba.php';
$contenido = ob_get_clean();

$html2pdf= new Html2Pdf('P', 'A4', 'es', 'TRUE', 'utf-8');
$html2pdf->writeHTML($contenido);
$html2pdf->output();



?>
