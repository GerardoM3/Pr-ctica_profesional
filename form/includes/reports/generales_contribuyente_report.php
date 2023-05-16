<?php
ob_start();
//importar recursos de FPDF
require('includes/FPDF/fpdf.php');

//Crear un documento
$pdf = new FPDF();
$pdf->AddPage();

$title = "Datos de " . $contri->nombre_contribuyente;

//Agregar texto
$pdf->SetTitle($title);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 10, 'Esto es un archivo PDF con PHP', 'B', 1);
$pdf->Cell(0, 10, '- Nombre completo del contribuyente: ' . $contri->nombre_contribuyente . ' ' . $contri->apellido_contribuyente, '', 1);

$pdf->Output('I', 'generales_contribuyente_report.pdf', true);

ob_end_flush();
?>