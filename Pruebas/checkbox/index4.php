<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--<meta http-equiv="refresh" content="5; url=http://localhost/Práctica_profesional/Pruebas/checkbox/index2.php">-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>pruebas con checkbox 4</title>
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
			<tr >
				<td rowspan="4" id="celda_1_chk_1">
					<center><input type="checkbox" name="chk" id="chk_1" style="transform: scale(3)"></center>
				</td>
				<td rowspan="4" id="active_chk_1">
					ALUMBRADO PÚBLICO
				</td>
				<td rowspan="4" id="tarifa_actual_1">
					2
				</td>
				<td>
					<label for="rg_norte1" id="rgl_norte1" name="rgl_norte"></label><input id="rg_norte1" type="range" name="rg_norte" min="1" max="5" value="1">
					<input type="checkbox" name="chk_norte" id="chk_norte1"> <label for="chk_norte1">NORTE</label>
				</td>
				<td rowspan="4" id="total_celda_1">
					
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_este1" id="rgl_este1" name="rgl_este"></label><input id="rg_este1" type="range" name="rg_este" min="1" max="4" value="1">
					<input type="checkbox" name="chk_este" id="chk_este1"> <label for="chk_este1">ESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_oeste1" id="rgl_oeste1" name="rgl_oeste"></label><input id="rg_oeste1" type="range" name="rg_oeste" min="1" max="6" value="1">
					<input type="checkbox" name="chk_oeste" id="chk_oeste1"> <label for="chk_oeste1">OESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_sur1" id="rgl_sur1" name="rgl_sur"></label><input id="rg_sur1" type="range" name="rg_sur" min="1" max="5" value="1">
					<input type="checkbox" name="chk_sur" id="chk_sur1"> <label for="chk_sur1">SUR</label>
				</td>
			</tr>
			<!---->
			<!---->
			<script>
				var active_chk_1 = document.getElementById('active_chk_1');
				var chk_1 = document.getElementById('chk_1');
				var tarifa_actual_1 = document.getElementById('tarifa_actual_1');
				var rgl_norte1 = document.getElementById('rgl_norte1');
				var rgl_este1 = document.getElementById('rgl_este1');
				var rgl_oeste1 = document.getElementById('rgl_oeste1');
				var rgl_sur1 = document.getElementById('rgl_sur1');
				var rg_norte1 = document.getElementById('rg_norte1');
				var rg_este1 = document.getElementById('rg_este1');
				var rg_oeste1 = document.getElementById('rg_oeste1');
				var rg_sur1 = document.getElementById('rg_sur1');
				var chk_norte1 = document.getElementById('chk_norte1');
				var chk_este1 = document.getElementById('chk_este1');
				var chk_oeste1 = document.getElementById('chk_oeste1');
				var chk_sur1 = document.getElementById('chk_sur1');
				var total_celda_1 = document.getElementById('total_celda_1');

				
				
				function habilitar(rango_norte, rango_este, rango_oeste, rango_sur, rango_label_norte, rango_label_este, rango_label_oeste, rango_label_sur, chequeo_norte, chequeo_este, chequeo_oeste, chequeo_sur, total_celda){
					rango_norte.disabled = false;
					rango_este.disabled = false;
					rango_oeste.disabled = false;
					rango_sur.disabled = false;

					chequeo_norte.disabled = false;
					chequeo_este.disabled = false;
					chequeo_oeste.disabled = false;
					chequeo_sur.disabled = false;

					rango_norte.value = rango_norte.max;
					rango_este.value = rango_este.max;
					rango_oeste.value = rango_oeste.max;
					rango_sur.value = rango_sur.max;

					rango_label_norte.textContent = rango_norte.max + ' m';
					rango_label_este.textContent = rango_este.max + ' m';
					rango_label_oeste.textContent = rango_oeste.max + ' m';
					rango_label_sur.textContent = rango_sur.max + ' m';
					total_celda.textContent = '0.00';
				}

				function deshabilitar(rango_norte, rango_este, rango_oeste, rango_sur, rango_label_norte, rango_label_este, rango_label_oeste, rango_label_sur, chequeo_norte, chequeo_este, chequeo_oeste, chequeo_sur, total_celda){
					rango_norte.disabled = true;
					rango_este.disabled = true;
					rango_oeste.disabled = true;
					rango_sur.disabled = true;

					chequeo_norte.disabled = true;
					chequeo_este.disabled = true;
					chequeo_oeste.disabled = true;
					chequeo_sur.disabled = true;

					rango_norte.value = rango_norte.min;
					rango_este.value = rango_este.min;
					rango_oeste.value = rango_oeste.min;
					rango_sur.value = rango_sur.min;

					rango_label_norte.textContent = '';
					rango_label_este.textContent = '';
					rango_label_oeste.textContent = '';
					rango_label_sur.textContent = '';
					total_celda.textContent = '0.00';
				}

				function rangos(rg_label, rango){
					return rg_label.textContent = rango.value + ' m';
				}

				function cajas_chequeo(chequeo, rango, total_celda, tarifa_actual){
					if (chequeo.checked) {
						total_celda.textContent = (parseFloat(total_celda.textContent) + (parseFloat(tarifa_actual.textContent) * parseFloat(rango.value))).toFixed(2);
					}else{
						total_celda.textContent = (parseFloat(total_celda.textContent) - (parseFloat(tarifa_actual.textContent) * parseFloat(rango.value))).toFixed(2);
					}
				}

				if (chk_1.checked) {
					total_celda_1.textContent = '0';
					habilitar(rg_norte1, rg_este1, rg_oeste1, rg_sur1, rgl_norte1, rgl_este1, rgl_oeste1, rgl_sur1,chk_norte1, chk_este1, chk_oeste1, chk_sur1, total_celda_1);
					
				}else{
					deshabilitar(rg_norte1, rg_este1, rg_oeste1, rg_sur1,rgl_norte1, rgl_este1, rgl_oeste1, rgl_sur1,chk_norte1, chk_este1, chk_oeste1, chk_sur1, total_celda_1);
				}
				rg_norte1.addEventListener('change',()=> rangos(rgl_norte1, rg_norte1));
				rg_este1.addEventListener('change',()=> rangos(rgl_este1, rg_este1));
				rg_oeste1.addEventListener('change',()=> rangos(rgl_oeste1, rg_oeste1));
				rg_sur1.addEventListener('change', ()=> rangos(rgl_sur1, rg_sur1));

				chk_norte1.addEventListener('change', ()=> cajas_chequeo(chk_norte1, rg_norte1, total_celda_1, tarifa_actual_1));
				chk_este1.addEventListener('change', ()=> cajas_chequeo(chk_este1, rg_este1, total_celda_1, tarifa_actual_1));
				chk_oeste1.addEventListener('change', ()=> cajas_chequeo(chk_oeste1, rg_oeste1, total_celda_1, tarifa_actual_1));
				chk_sur1.addEventListener('change', ()=> cajas_chequeo(chk_sur1, rg_sur1, total_celda_1, tarifa_actual_1));

				/*if (chk_1.click() == true) {
					
				}*/
				active_chk_1.addEventListener('click', ()=>{
					console.log(`celda_1 clickeado`);
					chk_1.checked = !chk_1.checked;
					if (chk_1.checked) {
						total_celda_1.textContent = '0';
						habilitar(rg_norte1, rg_este1, rg_oeste1, rg_sur1, rgl_norte1, rgl_este1, rgl_oeste1, rgl_sur1, chk_norte1, chk_este1, chk_oeste1, chk_sur1, total_celda_1);
					}else{
						deshabilitar(rg_norte1, rg_este1, rg_oeste1, rg_sur1, rgl_norte1, rgl_este1, rgl_oeste1, rgl_sur1, chk_norte1, chk_este1, chk_oeste1, chk_sur1, total_celda_1);
					}
				});
				chk_1.addEventListener('click', (chk_1)=>{
					console.log(`Checkbox de celda_1 clickeado`);
					if (chk_1.target.checked) {
						total_celda_1.textContent = '0';
						habilitar(rg_norte1, rg_este1, rg_oeste1, rg_sur1, rgl_norte1, rgl_este1, rgl_oeste1, rgl_sur1, chk_norte1, chk_este1, chk_oeste1, chk_sur1, total_celda_1);
					}else{
						deshabilitar(rg_norte1, rg_este1, rg_oeste1, rg_sur1, rgl_norte1, rgl_este1, rgl_oeste1, rgl_sur1, chk_norte1, chk_este1, chk_oeste1, chk_sur1, total_celda_1);
					}
				});
				
				
			</script>
			<!---->
			<!---->
			<tr>
				<td rowspan="4">
					<input type="checkbox" name="chk" id="chk_2">
				</td>
				<td rowspan="4">
					ALUMBRADO PÚBLICO-RURAL
				</td>
				<td rowspan="4" id="tarifa_actual_2">
					3.75
				</td>
				<td>
					<label for="rg_norte2" id="rgl_norte2" name="rgl_norte"></label><input id="rg_norte2" type="range" name="rg_norte" min="1" max="5" value="1">
					<input type="checkbox" name="chk_norte" id="chk_norte2"> <label for="chk_norte2">NORTE</label>
				</td>
				<td rowspan="4" id="total_celda_2">
					
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_este2" id="rgl_este2" name="rgl_este"></label><input id="rg_este2" type="range" name="rg_este" min="1" max="4" value="1">
					<input type="checkbox" name="chk_este" id="chk_este2"> <label for="chk_este2">ESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_oeste2" id="rgl_oeste2" name="rgl_oeste"></label><input id="rg_oeste2" type="range" name="rg_oeste" min="1" max="6" value="1">
					<input type="checkbox" name="chk_oeste" id="chk_oeste2"> <label for="chk_oeste2">OESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_sur2" id="rgl_sur2" name="rgl_sur"></label><input id="rg_sur2" type="range" name="rg_sur" min="1" max="5" value="1">
					<input type="checkbox" name="chk_sur" id="chk_sur2"> <label for="chk_sur2">SUR</label>
				</td>
			</tr>
			<!---->
			<!---->
			<script>
				var chk_2 = document.getElementById('chk_2');
				var tarifa_actual_2 = document.getElementById('tarifa_actual_2');

				var rgl_norte2 = document.getElementById('rgl_norte2');
				var rgl_este2 = document.getElementById('rgl_este2');
				var rgl_oeste2 = document.getElementById('rgl_oeste2');
				var rgl_sur2 = document.getElementById('rgl_sur2');


				var rg_norte2 = document.getElementById('rg_norte2');
				var rg_este2 = document.getElementById('rg_este2');
				var rg_oeste2 = document.getElementById('rg_oeste2');
				var rg_sur2 = document.getElementById('rg_sur2');

				var chk_norte2 = document.getElementById('chk_norte2');
				var chk_este2 = document.getElementById('chk_este2');
				var chk_oeste2 = document.getElementById('chk_oeste2');
				var chk_sur2 = document.getElementById('chk_sur2');

				var total_celda_2 = document.getElementById('total_celda_2');
				

				if (chk_2.checked) {
					rg_norte2.disabled = false;
					rg_este2.disabled = false;
					rg_oeste2.disabled = false;
					rg_sur2.disabled = false;

					chk_norte2.disabled = false;
					chk_este2.disabled = false;
					chk_oeste2.disabled = false;
					chk_sur2.disabled = false;

					rg_norte2.value = rg_norte2.max;
					rg_este2.value = rg_este2.max;
					rg_oeste2.value = rg_oeste2.max;
					rg_sur2.value = rg_sur2.max;

					rgl_norte2.textContent = rg_norte2.max + ' m';
					rgl_este2.textContent = rg_este2.max + ' m';
					rgl_oeste2.textContent = rg_oeste2.max + ' m';
					rgl_sur2.textContent = rg_sur2.max + ' m';
				}else{
					rg_norte2.disabled = true;
					rg_este2.disabled = true;
					rg_oeste2.disabled = true;
					rg_sur2.disabled = true;

					chk_norte2.disabled = true;
					chk_este2.disabled = true;
					chk_oeste2.disabled = true;
					chk_sur2.disabled = true;

					rg_norte2.value = rg_norte2.min;
					rg_este2.value = rg_este2.min;
					rg_oeste2.value = rg_oeste2.min;
					rg_sur2.value = rg_sur2.min;

					rgl_norte2.textContent = '';
					rgl_este2.textContent = '';
					rgl_oeste2.textContent = '';
					rgl_sur2.textContent = '';
				}

				chk_2.addEventListener('change', (chk_2)=>{
					if (chk_2.target.checked) {

						total_celda_2.textContent = 0;

						rg_norte2.disabled = false;
						rg_este2.disabled = false;
						rg_oeste2.disabled = false;
						rg_sur2.disabled = false;

						chk_norte2.disabled = false;
						chk_este2.disabled = false;
						chk_oeste2.disabled = false;
						chk_sur2.disabled = false;

						rg_norte2.value = rg_norte2.max;
						rg_este2.value = rg_este2.max;
						rg_oeste2.value = rg_oeste2.max;
						rg_sur2.value = rg_sur2.max;

						rgl_norte2.textContent = rg_norte2.max + ' m';
						rgl_este2.textContent = rg_este2.max + ' m';
						rgl_oeste2.textContent = rg_oeste2.max + ' m';
						rgl_sur2.textContent = rg_sur2.max + ' m';

						rg_norte2.addEventListener('change', (rg_norte2)=>{
							rgl_norte2.textContent = rg_norte2.target.value + ' m';
						});
						rg_este2.addEventListener('change', (rg_este2)=>{
							rgl_este2.textContent = rg_este2.target.value + ' m';
						});
						rg_oeste2.addEventListener('change', (rg_oeste2)=>{
							rgl_oeste2.textContent = rg_oeste2.target.value + ' m';
						});
						rg_sur2.addEventListener('change', (rg_sur2)=>{
							rgl_sur2.textContent = rg_sur2.target.value + ' m';
						});

						chk_norte2.addEventListener('change', (chk_norte2)=>{
							
							if (chk_norte2.target.checked) {
								total_celda_2.textContent = (parseFloat(total_celda_2.textContent) + (parseFloat(tarifa_actual_2.textContent) * parseFloat(rg_norte2.value))).toFixed(2);
							}else{
								total_celda_2.textContent = (parseFloat(total_celda_2.textContent) - (parseFloat(tarifa_actual_2.textContent) * parseFloat(rg_norte2.value))).toFixed(2);
							}
						});

						chk_este2.addEventListener('change', (chk_este2)=>{
							
							if (chk_este2.target.checked) {
								total_celda_2.textContent = (parseFloat(total_celda_2.textContent) + (parseFloat(tarifa_actual_2.textContent) * parseFloat(rg_este2.value))).toFixed(2);
							}else{
								total_celda_2.textContent = (parseFloat(total_celda_2.textContent) - (parseFloat(tarifa_actual_2.textContent) * parseFloat(rg_este2.value))).toFixed(2);
							}
						});

						chk_oeste2.addEventListener('change', (chk_oeste2)=>{
							
							if (chk_oeste2.target.checked) {
								total_celda_2.textContent = (parseFloat(total_celda_2.textContent) + (parseFloat(tarifa_actual_2.textContent) * parseFloat(rg_oeste2.value))).toFixed(2);
							}else{
								total_celda_2.textContent = (parseFloat(total_celda_2.textContent) - (parseFloat(tarifa_actual_2.textContent) * parseFloat(rg_oeste2.value))).toFixed(2);
							}
						});

						chk_sur2.addEventListener('change', (chk_sur2)=>{
							
							if (chk_sur2.target.checked) {
								total_celda_2.textContent = (parseFloat(total_celda_2.textContent) + (parseFloat(tarifa_actual_2.textContent) * parseFloat(rg_sur2.value))).toFixed(2);
							}else{
								total_celda_2.textContent = (parseFloat(total_celda_2.textContent) - (parseFloat(tarifa_actual_2.textContent) * parseFloat(rg_sur2.value))).toFixed(2);
							}
						});
					}else{
						rg_norte2.disabled = true;
						rg_este2.disabled = true;
						rg_oeste2.disabled = true;
						rg_sur2.disabled = true;

						chk_norte2.disabled = true;
						chk_este2.disabled = true;
						chk_oeste2.disabled = true;
						chk_sur2.disabled = true;

						rg_norte2.value = rg_norte2.min;
						rg_este2.value = rg_este2.min;
						rg_oeste2.value = rg_oeste2.min;
						rg_sur2.value = rg_sur2.min;

						rgl_norte2.textContent = '';
						rgl_este2.textContent = '';
						rgl_oeste2.textContent = '';
						rgl_sur2.textContent = '';
					}
				});
			</script>
			<!---->
			<!---->
			<tr>
				<td rowspan="4">
					<input type="checkbox" name="chk" id="chk_3">
				</td>
				<td rowspan="4">
					ENERGÍA DEL MERCADO MUNICIPAL
				</td>
				<td rowspan="4" id="tarifa_actual_3">
					2.60
				</td>
				<td>
					<label for="rg_norte3" id="rgl_norte3" name="rgl_norte"></label><input id="rg_norte3" type="range" name="rg_norte" min="1" max="5" value="1">
					<input type="checkbox" name="chk_norte" id="chk_norte3"> <label for="chk_norte3">NORTE</label>
				</td>
				<td rowspan="4" id="total_celda_3">
					
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_este3" id="rgl_este3" name="rgl_este"></label><input id="rg_este3" type="range" name="rg_este" min="1" max="4" value="1">
					<input type="checkbox" name="chk_este" id="chk_este3"> <label for="chk_este3">ESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_oeste3" id="rgl_oeste3" name="rgl_oeste"></label><input id="rg_oeste3" type="range" name="rg_oeste" min="1" max="6" value="1">
					<input type="checkbox" name="chk_oeste" id="chk_oeste3"> <label for="chk_oeste3">OESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_sur3" id="rgl_sur3" name="rgl_sur"></label><input id="rg_sur3" type="range" name="rg_sur" min="1" max="5" value="1">
					<input type="checkbox" name="chk_sur" id="chk_sur3"> <label for="chk_sur3">SUR</label>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>