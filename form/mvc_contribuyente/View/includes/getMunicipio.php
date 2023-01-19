<?php 
require ('../conexion.php');

$cod_departamento = $_POST['cod_departamento'];

$queryMunicipio = "SELECT cod_municipio, municipio FROM meta_municipio WHERE cod_departamento = '$cod_departamento';";

$resultadoMunicipio = $mysqli->query($queryMunicipio);


$html = "<option value='0'>Seleccione un municipio</option>";

while ($rowM = $resultadoMunicipio->fetch_assoc()) {
	$html.= "<option value='".$rowM['cod_municipio']."'>".$rowM['municipio']."</option>";
}

echo $html;
?>