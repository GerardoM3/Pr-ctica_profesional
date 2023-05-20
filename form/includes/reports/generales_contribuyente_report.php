<?php
ob_start();
//importar recursos de FPDF
require('includes/FPDF/fpdf.php');

class PDF extends FPDF
{
function Header()
{
    // Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,mb_convert_encoding('Alcaldía Municipal San Rafael Obrajuelo', 'ISO-8859-1', 'UTF-8'),0,1,'C');
    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}
//Crear un documento
$cabecera_informacion = "Alcaldía Municipal San Rafael Obrajuelo.\n";
$cuerpo_informacion = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae similique quibusdam in odit incidunt nam vitae temporibus aliquam quisquam recusandae ex beatae provident adipisci modi, cum tempora sit, ipsam alias. ";
$cuerpo_informacion .= "Lorem ipsum dolor sit amet,\n consectetur adipisicing elit. Quae similique quibusdam in odit incidunt nam vitae temporibus aliquam quisquam recusandae ex beatae provident adipisci modi, cum tempora sit, ipsam alias.";
$pdf = new PDF();
$pdf->AddPage();
$title = $contri->nombre_contribuyente . " " . $contri->apellido_contribuyente;//Título del documento
$pdf->SetCreator('CATASTRO', true);
$pdf->SetAuthor("ALCALDÍA MUNICIPAL SAN RAFAEL OBRAJUELO", true);
$pdf->SetSubject("Reporte general del contribuyente " . $contri->nombre_contribuyente . " " . $contri->apellido_contribuyente, true);

//TÍTULO DEL DOCUMENTO
$pdf->SetTitle($title);

$pdf->SetFont('Times', 'B', 12);
//SECCIÓN DE INFORMACIÓN
$pdf->MultiCell(0, 5, mb_convert_encoding($cabecera_informacion, 'ISO-8859-1', 'UTF-8'), 0, "C");
$pdf->Image("assets/img/escudo_alcaldia_san_rafael_obrajuelo.jpeg", null, 25, 30, 0, "JPEG");
$pdf->Ln(8);
$pdf->SetX(44);
$pdf->MultiCell(0, 5, mb_convert_encoding($cuerpo_informacion, 'ISO-8859-1', 'UTF-8'), 0, "L");
//SECCIÓN DE LOS DATOS DEL CONTRIBUYENTE
$pdf->Cell(0, 10, $contri->id_contribuyente . "-" . $contri->correlativo, 0, 1, "R");
$pdf->Ln(0);
$pdf->Cell(0, 10, 'Nombre del contribuyente: '. $contri->nombre_contribuyente . " " . $contri->apellido_contribuyente, 1, 1, "L");
$pdf->Cell(53, 10, "Direccion del contribuyente: ", "LBR", 0, "L");
$pdf->MultiCell(0, 10, $contri->direccion_contribuyente, 1, "L");
$pdf->Ln(0);
$pdf->Cell(53, 10, "DUI: " . $contri->dui_contribuyente, 1, 0, "L");
$pdf->Cell(0, 10, mb_convert_encoding("Teléfono de contacto: ".$contri->telefono_contribuyente, 'ISO-8859-1', 'UTF-8'), 1, 1, "L");

//SECCIÓN DE LOS DATOS DEL INMUEBLE
$pdf->Ln(12);

$pdf->Cell(0, 10, "ID inmueble: " . $inmueble->id_inmueble, 0, 1, "R");
$pdf->Ln(0);
$pdf->Cell(53, 10, mb_convert_encoding('Dirección del inmueble: ', "ISO-8859-1", "UTF-8"), 1, 0, "L");
$pdf->MultiCell(0, 10, mb_convert_encoding($inmueble->direccion_inmueble, "ISO-8859-1", "UTF-8"), 1, "L");
$pdf->Ln(0);
$pdf->Cell(90, 10, mb_convert_encoding( "Zona: ". $inmueble->zona_inmueble, "ISO-8859-1", "UTF-8"), "LBR", 0, "L");
$pdf->Cell(0, 10, mb_convert_encoding( "Característica: ".$inmueble->sector_estado, "ISO-8859-1", "UTF-8"), 1, 1, "L");
$pdf->Cell(0, 10, "Dimensiones:", 1, 1, "L");
$pdf->Cell(46, 10, mb_convert_encoding("Norte: ".$inmueble->norte_longitud . "m", 'ISO-8859-1', 'UTF-8'), 1, 0, "L");
$pdf->Cell(46, 10, mb_convert_encoding("Este: ".$inmueble->este_longitud . "m", 'ISO-8859-1', 'UTF-8'), 1, 0, "L");
$pdf->Cell(46, 10, mb_convert_encoding("Oeste: ".$inmueble->oeste_longitud . "m", 'ISO-8859-1', 'UTF-8'), 1, 0, "L");
$pdf->Cell(0, 10, mb_convert_encoding("Sur: ".$inmueble->sur_longitud . "m", 'ISO-8859-1', 'UTF-8'), 1, 1, "L");

//SECCIÓN DE LOS SERVICIOS APLICADOS AL INMUEBLE
$pdf->Ln(15);

$pdf->SetX(15);
$pdf->Cell(100, 10, "Servicios", 1, 0, "L");
$pdf->Cell(30, 10, "Tarifa", 1, 0,  "L");
$pdf->Cell(30, 10, "Total a pagar", 1, 0, "L");
$pdf->Ln();
foreach ($this->modelServicioContri->obtenerServicioContribuyente($inmueble->id_inmueble) as $rSC) {
    $pdf->SetX(15);
    $pdf->Cell(100, 20, $rSC->descripcion_servicio, 1, 0, "L");
    $pdf->Cell(30, 20, $rSC->tarifa_actual, 1, 0,  "C");
    $pdf->Cell(30, 20, $rSC->total_pago_servicio, 1, 0, "C");
    $pdf->Ln();
}

$pdf->Ln(20);
$pdf->Cell(15, 10, "Sello: ", 0, 0, "L");
$pdf->Cell(50, 9, "", "B", 0);
$pdf->SetX(115);
$pdf->Cell(15, 10, "Firma: ", 0, 0, "L");
$pdf->Cell(50, 9, "", "B", 0);


$pdf->Output('I', 'generales_contribuyente_report.pdf', true);

ob_end_flush();
?>