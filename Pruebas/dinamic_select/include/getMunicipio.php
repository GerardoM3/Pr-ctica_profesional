<?php
	require ('../conexion.php');
	
	$cod_departamento = $_POST['cod_departamento'];
	
	$queryM = "SELECT cod_municipio, municipio FROM meta_municipio WHERE cod_departamento = '$cod_departamento' ORDER BY municipio";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['cod_municipio']."'>".$rowM['municipio']."</option>";
	}
	
	echo $html;
?>