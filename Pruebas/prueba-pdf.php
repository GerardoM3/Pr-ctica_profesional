
<?php 

$var = $_REQUEST['var1'];
$variable = 2;

$parrafo = utf8_decode('Esta es una línea nueva de texto');
$parrafo2 = utf8_decode(
	'Gerardo Misael Monroy Moza: Este es un párrafo de prueba para este documento PDF. Santiago Nonualco.
	Este es el valor de una variable: '.$variable
);

ob_start();
//importar recursos de FPDF
require('fpdf185/fpdf.php');

//Crear un documento
$pdf = new FPDF();
$pdf->AddPage();

//Agregar texto
$pdf->SetTitle('Generar PDF title');
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 10, 'Esto es un archivo PDF con PHP', 'B', 1);
$pdf->Cell(0, 10, $parrafo, 0, 1, 'C');
$pdf->MultiCell(0, 10, $parrafo2, 0, 1);
$pdf->MultiCell(0, 10, $var, 0, 1);

$pdf->Output('I', 'basic.pdf', true);

ob_end_flush();
 ?>