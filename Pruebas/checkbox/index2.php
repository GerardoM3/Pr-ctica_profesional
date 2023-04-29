		<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--<meta http-equiv="refresh" content="5; url=http://localhost/Práctica_profesional/Pruebas/checkbox/index2.php">-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>pruebas con checkbox 2</title>
	<style type="text/css">

		table{
			border-collapse: collapse;
		}

		table>thead>tr>th{
			margin: 0;
			padding: 2px;
			border: 2px solid black;
		}
		table>tbody>tr>td{

			margin: 0;
			padding: 1em;
			border: 2px solid black;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>
					checkbox
				</th>
				<th>
					Nombre del servicio
				</th>
				<th>
					Valor
				</th>
				<th>
					Aplicar a...
				</th>
				<th>
					Total
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td rowspan="4">
					<input type="checkbox" name="chk">
				</td>
				<td rowspan="4">
					ALUMBRADO PÚBLICO
				</td>
				<td rowspan="4" name="tarifa_actual">
					0.17
				</td>
				<td>
					<label for="rg_norte" id="rgl_norte1" name="rgl_norte"></label><input id="rg_norte" type="range" name="rg_norte" min="1" max="5" value="1">
					<input type="checkbox" name="chk_norte" id="norte1"> <label for="norte1">NORTE</label>
				</td>
				<td rowspan="4" name="total_celda">
					
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_este" id="rgl_este1" name="rgl_este"></label><input id="rg_este" type="range" name="rg_este" min="1" max="4" value="1">
					<input type="checkbox" name="chk_este" id="este1"> <label for="este1">ESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_oeste" id="rgl_oeste1" name="rgl_oeste"></label><input id="rg_oeste" type="range" name="rg_oeste" min="1" max="6" value="1">
					<input type="checkbox" name="chk_oeste" id="oeste1"> <label for="oeste1">OESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_sur" id="rgl_sur1" name="rgl_sur"></label><input id="rg_sur" type="range" name="rg_sur" min="1" max="5" value="1">
					<input type="checkbox" name="chk_sur" id="sur1"> <label for="sur1">SUR</label>
				</td>
			</tr>
			<!---->
			<!---->
			<!---->
			<tr>
				<td rowspan="4">
					<input type="checkbox" name="chk">
				</td>
				<td rowspan="4">
					ALUMBRADO PÚBLICO-RURAL
				</td>
				<td rowspan="4" name="tarifa_actual">
					1.50
				</td>
				<td>
					<label for="rg_norte" id="rgl_norte2" name="rgl_norte"></label><input id="rg_norte" type="range" name="rg_norte" min="1" max="5" value="1">
					<input type="checkbox" name="chk_norte" id="norte2"> <label for="norte2">NORTE</label>
				</td>
				<td rowspan="4" name="total_celda">
					
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_este" id="rgl_este2" name="rgl_este"></label><input id="rg_este" type="range" name="rg_este" min="1" max="4" value="1">
					<input type="checkbox" name="chk_este" id="este2"> <label for="este2">ESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_oeste" id="rgl_oeste2" name="rgl_oeste"></label><input id="rg_oeste" type="range" name="rg_oeste" min="1" max="6" value="1">
					<input type="checkbox" name="chk_oeste" id="oeste2"> <label for="oeste2">OESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_sur" id="rgl_sur2" name="rgl_sur"></label><input id="rg_sur" type="range" name="rg_sur" min="1" max="5" value="1">
					<input type="checkbox" name="chk_sur" id="sur2"> <label for="sur2">SUR</label>
				</td>
			</tr>
			<!---->
			<!---->
			<!---->
			<tr>
				<td rowspan="4">
					<input type="checkbox" name="chk">
				</td>
				<td rowspan="4">
					ENERGÍA DEL MERCADO MUNICIPAL
				</td>
				<td rowspan="4" name="tarifa_actual">
					19.50
				</td>
				<td>
					<label for="rg_norte" id="rgl_norte3" name="rgl_norte"></label><input id="rg_norte" type="range" name="rg_norte" min="1" max="5" value="1">
					<input type="checkbox" name="chk_norte" id="norte3"> <label for="norte3">NORTE</label>
				</td>
				<td rowspan="4" name="total_celda">
					
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_este" id="rgl_este3" name="rgl_este"></label><input id="rg_este" type="range" name="rg_este" min="1" max="4" value="1">
					<input type="checkbox" name="chk_este" id="este3"> <label for="este3">ESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_oeste" id="rgl_oeste3" name="rgl_oeste"></label><input id="rg_oeste" type="range" name="rg_oeste" min="1" max="6" value="1">
					<input type="checkbox" name="chk_oeste" id="oeste3"> <label for="oeste3">OESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_sur" id="rgl_sur3" name="rgl_sur"></label><input id="rg_sur" type="range" name="rg_sur" min="1" max="5" value="1">
					<input type="checkbox" name="chk_sur" id="sur3"> <label for="sur3">SUR</label>
				</td>
			</tr>
		</tbody>
	</table>
	<script type="text/javascript">
		window.addEventListener('load', function(){
			var chk = document.getElementsByName('chk');

			var chk_norte = document.getElementsByName('chk_norte');
			var chk_este = document.getElementsByName('chk_este');
			var chk_oeste = document.getElementsByName('chk_oeste');
			var chk_sur = document.getElementsByName('chk_sur');

			var rg_norte = document.getElementsByName('rg_norte');
			var rg_este = document.getElementsByName('rg_este');
			var rg_oeste = document.getElementsByName('rg_oeste');
			var rg_sur = document.getElementsByName('rg_sur');

			var rgl_norte = document.getElementsByName('rgl_norte');
			var rgl_este = document.getElementsByName('rgl_este');
			var rgl_oeste = document.getElementsByName('rgl_oeste');
			var rgl_sur = document.getElementsByName('rgl_sur');

			var tarifa_actual = document.getElementsByName('tarifa_actual');
			var total_celda = document.getElementsByName('total_celda');

			var base = [];
			var suma_celda = 0;

			

			function chequeo(){

				/*var checkboxes_principal = chk.keys();
				for( const key of checkboxes_principal){
					console.log(key);
				}*/
				for (var i = 0; i < chk.length; i++) {
					chk_norte[i].disabled = true;
					chk_este[i].disabled = true;
					chk_oeste[i].disabled = true;
					chk_sur[i].disabled = true;

					rg_norte[i].disabled = true;
					rg_este[i].disabled = true;
					rg_oeste[i].disabled = true;
					rg_sur[i].disabled = true;
					if(chk[i].checked){

						//total_celda[i].textContent = tarifa_actual[i].textContent;
						total_celda[i].textContent = 0;
						suma_celda = total_celda[i].textContent;
						base[i] = tarifa_actual[i].textContent;

						chk_norte[i].disabled = false;
						chk_este[i].disabled = false;
						chk_oeste[i].disabled = false;
						chk_sur[i].disabled = false;

						rg_norte[i].disabled = false;
						rg_este[i].disabled = false;
						rg_oeste[i].disabled = false;
						rg_sur[i].disabled = false;

						rg_norte[i].value = rg_norte[i].max;
						rg_este[i].value = rg_este[i].max;
						rg_oeste[i].value = rg_oeste[i].max;
						rg_sur[i].value = rg_sur[i].max;

						rgl_norte[i].textContent = rg_norte[i].value + ' m';
						rgl_este[i].textContent = rg_este[i].value + ' m';
						rgl_oeste[i].textContent = rg_oeste[i].value + ' m';
						rgl_sur[i].textContent = rg_sur[i].value + ' m';

						function cambio_rg_norte(){
							for (var i = 0; i < chk.length; i++) {
								if(chk[i].checked){
									rgl_norte[i].textContent = rg_norte[i].value + ' m';
									
								}
							}
						}
						function cambio_rg_este(){
							for (var i = 0; i < chk.length; i++) {
								if(chk[i].checked){
									rgl_este[i].textContent = rg_este[i].value + ' m';
								}
							}
						}
						function cambio_rg_oeste(){
							for (var i = 0; i < chk.length; i++) {
								if(chk[i].checked){
									rgl_oeste[i].textContent = rg_oeste[i].value + ' m';
								}
							}
						}
						function cambio_rg_sur(){
							for (var i = 0; i < chk.length; i++) {
								if(chk[i].checked){
									rgl_sur[i].textContent = rg_sur[i].value + ' m';
								}
							}
						}

						rg_norte[i].addEventListener('change', cambio_rg_norte);
						rg_este[i].addEventListener('change', cambio_rg_este);
						rg_oeste[i].addEventListener('change', cambio_rg_oeste);
						rg_sur[i].addEventListener('change', cambio_rg_sur);

						/*
						
						PROBABLEMENTE DEBA UTILIZAR VARIABLES ARRAY PARA SACAR EL RESULTADO DE CADA CELDA.
						https://www.freecodecamp.org/espanol/news/el-manual-de-arreglos-en-javascript/
						*/
						/*
						Debería de tener la sumatoria de la celda para cada perímetro (norte, este, oeste, sur).
						Y antes de hacer la sumatoria, comprobar que el índice de la sumatoria y de la base sea exactamente igual al índice del supercheckbox
						*/

						function chequeo_norte(){
							for (let n = 0; n < chk.length; n++) {
								if(chk[n].checked && (chk_norte[n].checked || !chk_norte[n].checked)){
									if(chk_norte[n].checked){
										total_celda[n].textContent = (parseFloat(total_celda[n].textContent) + ( parseFloat(base[n]) * parseFloat(rg_norte[n].value))).toFixed(2);
										console.log(`==================================================================`);
										console.log(`Número de checkbox_norte: ${parseFloat(chk_norte.length)}`);
										console.log(`Contador: ${n}`);
										console.log(`Posición: ${n + 1}`);
										console.log(`Valor base: ${parseFloat(base[n])}`);
										console.log(`Valor actual del rago: ${parseFloat(rg_norte[n].value)}`);
										console.log(`Valor actual del total: ${parseFloat(total_celda[n].textContent).toFixed(2)}`);
										console.log(`==================================================================`);

									}else if(!chk_norte[n].checked){
										total_celda[n].textContent = (parseFloat(total_celda[n].textContent) - (parseFloat(base[n]) * parseFloat(rg_norte[n].value)).toFixed(2));

										console.log(`==================================================================`);
										console.log(`Número de checkbox_norte: ${parseFloat(chk_norte.length)}`);
										console.log(`Contador: ${n}`);
										console.log(`Posición: ${n + 1}`);
										console.log(`Valor base: ${parseFloat(base[n])}`);
										console.log(`Valor actual del rago: ${parseFloat(rg_norte[n].value)}`);
										console.log(`Valor actual del total: ${parseFloat(total_celda[n].textContent).toFixed(2)}`);
										console.log(`==================================================================`);
									}
								}
							}
						}

						chk_norte[i].addEventListener('change', chequeo_norte);
						
						
						/*chk_norte[i].addEventListener('change', (e)=>{
							
							var suma_norte_celda = [];
							for (let i = 0; i < chk.length; i++) {*/
								/*suma_celda = tarifa_actual[i].textContent;
								suma_norte_celda[i] = parseFloat(total_celda[i].textContent);*/
								/*if (chk[i].checked) {
									
									if (e.target.checked) {
										
										total_celda[i].textContent = (parseFloat(total_celda[i].textContent) + ( parseFloat(base[i]) * parseFloat(rg_norte[i].value))).toFixed(2);
										//console.log(base[i]);
										//total_celda[i].textContent = suma_celda;
									}else{
										total_celda[i].textContent = (parseFloat(total_celda[i].textContent) - (parseFloat(base[i]) * parseFloat(rg_norte[i].value)).toFixed(2));
										//console.log(base[i]);
										//total_celda[i].textContent = suma_celda;
									}
									console.log(`==================================================================`);
									console.log(`Contador: ${i}`);
									console.log(`Posición: ${i + 1}`);
									console.log(`Valor base: ${parseFloat(base[i])}`);
									console.log(`Valor actual del rago: ${parseFloat(rg_norte[i].value)}`);
									console.log(`Valor actual del total: ${parseFloat(total_celda[i].textContent).toFixed(2)}`);
									console.log(`==================================================================`);
								}
							}
						});*/
						chk_este[i].addEventListener('change', (e)=>{
							var suma_este_celda = [];//No está en uso
							for (let i = 0; i < chk.length; i++) {
								if (chk[i].checked) {
									if (e.target.checked) {
										total_celda[i].textContent = (parseFloat(total_celda[i].textContent) + (parseFloat(base[i]) * parseFloat(rg_este[i].value))).toFixed(2);
										//suma_celda = parseFloat(suma_celda) * parseFloat(rg_este[i].value);
									}else{
										total_celda[i].textContent = (parseFloat(total_celda[i].textContent) - (parseFloat(base[i]) * parseFloat(rg_este[i].value))).toFixed(2);
										//suma_celda = parseFloat(suma_celda) / parseFloat(rg_este[i].value);
									}
									console.log(`==================================================================`);
									console.log(`Contador: ${i}`);
									console.log(`Posición: ${i + 1}`);
									console.log(`Valor base: ${parseFloat(base[i])}`);
									console.log(`Valor actual del rago: ${parseFloat(rg_este[i].value)}`);
									console.log(`Valor actual del total: ${parseFloat(total_celda[i].textContent).toFixed(2)}`);
									console.log(`==================================================================`);
									//total_celda[i].textContent = suma_celda;
								}
								//console.log(suma_celda);
							}
						});
						chk_oeste[i].addEventListener('change', (e)=>{
							var suma_oeste_celda = []; //No está en uso
							for (let i = 0; i < chk.length; i++) {
								if (chk[i].checked) {
									if (e.target.checked) {
										total_celda[i].textContent = (parseFloat(total_celda[i].textContent) + (parseFloat(base[i]) * parseFloat(rg_oeste[i].value))).toFixed(2);
										//suma_celda = parseFloat(suma_celda) * parseFloat(rg_oeste[i].value);
									}else{
										total_celda[i].textContent = (parseFloat(total_celda[i].textContent) - (parseFloat(base[i]) * parseFloat(rg_oeste[i].value))).toFixed(2);
										//suma_celda = parseFloat(suma_celda) / parseFloat(rg_oeste[i].value);
									}
									console.log(`==================================================================`);
									console.log(`Contador: ${i}`);
									console.log(`Posición: ${i + 1}`);
									console.log(`Valor base: ${parseFloat(base[i])}`);
									console.log(`Valor actual del rago: ${parseFloat(rg_oeste[i].value)}`);
									console.log(`Valor actual del total: ${parseFloat(total_celda[i].textContent).toFixed(2)}`);
									console.log(`==================================================================`);
									//total_celda[i].textContent = suma_celda;
								}
								//console.log(suma_celda);
							}
						});
						chk_sur[i].addEventListener('change', (e)=>{
							var suma_sur_celda = []; //No está en uso
							for (let i = 0; i < chk.length; i++) {
								if (chk[i].checked) {
									if (e.target.checked) {
										total_celda[i].textContent = (parseFloat(total_celda[i].textContent) + (parseFloat(base[i]) * parseFloat(rg_sur[i].value))).toFixed(2);
										//suma_celda = parseFloat(suma_celda) * parseFloat(rg_sur[i].value);
									}else{
										total_celda[i].textContent = (parseFloat(total_celda[i].textContent) - (parseFloat(base[i]) * parseFloat(rg_sur[i].value))).toFixed(2);
										//suma_celda = parseFloat(suma_celda) / parseFloat(rg_sur[i].value);
									}
									console.log(`==================================================================`);
									console.log(`Contador: ${i}`);
									console.log(`Posición: ${i + 1}`);
									console.log(`Valor base: ${parseFloat(base[i])}`);
									console.log(`Valor actual del rago: ${parseFloat(rg_sur[i].value)}`);
									console.log(`Valor actual del total: ${parseFloat(total_celda[i].textContent).toFixed(2)}`);
									console.log(`==================================================================`);
									//total_celda[i].textContent = suma_celda;
								}
								//console.log(suma_celda);
							}
						});
						
						

					}else{
						rgl_norte[i].textContent = '';
						rgl_este[i].textContent = '';
						rgl_oeste[i].textContent = '';
						rgl_sur[i].textContent = '';

						rg_norte[i].value = rg_norte[i].min;
						rg_este[i].value = rg_este[i].min;
						rg_oeste[i].value = rg_oeste[i].min;
						rg_sur[i].value = rg_sur[i].min;

						total_celda[i].textContent = '';
					}
				}
			}

			for (var i = 0; i < chk.length; i++) {
				chk_norte[i].disabled = true;
				chk_este[i].disabled = true;
				chk_oeste[i].disabled = true;
				chk_sur[i].disabled = true;

				rg_norte[i].disabled = true;
				rg_este[i].disabled = true;
				rg_oeste[i].disabled = true;
				rg_sur[i].disabled = true;



				chk[i].addEventListener('change', chequeo);
			}
		});
		

	</script>
</body>
</html>