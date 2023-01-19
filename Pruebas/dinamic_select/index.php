<?php
	require ('conexion.php');
	
	$query = "SELECT cod_departamento, departamento FROM meta_departamento ORDER BY departamento";
	$resultado=$mysqli->query($query);
?>

<html>
	<head>
		<title>ComboBox Ajax, PHP y MySQL</title>
		
		<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
		
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_departamento").change(function () {

					
					
					$("#cbx_departamento option:selected").each(function () {
						cod_departamento = $(this).val();
						$.post("include/getMunicipio.php", { cod_departamento: cod_departamento }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});
		</script>
		
	</head>
	
	<body>
		<form id="combo" name="combo" action="guarda.php" method="POST">
			<div>Selecciona departamento : <select name="cbx_departamento" id="cbx_departamento">
				<option value="0">Seleccionar departamento</option>
				<?php while($row = $resultado->fetch_assoc()) { ?>
					<option value="<?php echo $row['cod_departamento']; ?>"><?php echo $row['departamento']; ?></option>
				<?php } ?>
			</select></div>
			
			<br />
			
			<div>Selecciona Municipio : <select name="cbx_municipio" id="cbx_municipio"></select></div>
			
			
			<br />
			<input type="submit" id="enviar" name="enviar" value="Guardar" />
		</form>
	</body>
</html>