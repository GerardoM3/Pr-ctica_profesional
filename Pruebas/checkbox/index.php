<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>pruebas con checkbox</title>
	
</head>
<body>
	<div class="valor-base">
		<p id="valor-base">100</p>
	</div>
	<div class="opciones">
		<div class="fields-group">
			<input type="number" name="numero" id="norte">
		<input type="number" name="numero" id="este">
		<input type="number" name="numero" id="oeste">
		<input type="number" name="numero" id="sur">
		</div>
		
		<br>
		<br>
		<input type="checkbox" value="35" name="chk" id="option1"> <label for="option1">35</label><br>
		<input type="checkbox" value="35" name="chk" id="option2"> <label for="option2">35</label><br>
		<input type="checkbox" value="30" name="chk" id="option3"> <label for="option3">30</label>
	</div>
	<div class="seccion-resultado">
		<p id="resultado"></p>
	</div>
	<script type="text/javascript">
		const resu = document.getElementById('resultado');
		var var_base = document.getElementById('valor-base');
		var checkboxes = document.getElementsByName('chk');
		var campo = document.getElementById('numero');

		resu.textContent = parseInt(var_base.textContent);

		/*campo.addEventListener('change', (e)=>{
			if(e.target.value == null){
				resu.textContent = 0;
			}
			resu.textContent = parseInt(resu.textContent) + parseInt(e.target.value);
		});*/

		

		for(var i = 0; i < checkboxes.length; i++){
			checkboxes[i].addEventListener('change', (e)=>{
				if(e.target.checked){
					resu.textContent = parseInt(resu.textContent) + parseInt(e.target.value);
				}else{
					resu.textContent = parseInt(resu.textContent) - parseInt(e.target.value);
				}
			});
		}

	</script>

</body>
</html>