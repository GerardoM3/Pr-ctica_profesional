<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--<meta http-equiv="refresh" content="5; url=http://localhost/Práctica_profesional/Pruebas/checkbox/index2.php">-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>pruebas con checkbox 3</title>
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
					<input type="checkbox" name="chk" id="chk_1">
				</td>
				<td rowspan="4">
					ALUMBRADO PÚBLICO
				</td>
				<td rowspan="4" name="tarifa_actual_1">
					2
				</td>
				<td>
					<label for="rg_norte1" id="rgl_norte1" name="rgl_norte"></label><input id="rg_norte1" type="range" name="rg_norte" min="1" max="5" value="1">
					<input type="checkbox" name="chk_norte" id="norte1"> <label for="norte1">NORTE</label>
				</td>
				<td rowspan="4" name="total_celda_1">
					
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_este1" id="rgl_este1" name="rgl_este"></label><input id="rg_este1" type="range" name="rg_este" min="1" max="4" value="1">
					<input type="checkbox" name="chk_este" id="este1"> <label for="este1">ESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_oeste1" id="rgl_oeste1" name="rgl_oeste"></label><input id="rg_oeste1" type="range" name="rg_oeste" min="1" max="6" value="1">
					<input type="checkbox" name="chk_oeste" id="oeste1"> <label for="oeste1">OESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_sur1" id="rgl_sur1" name="rgl_sur"></label><input id="rg_sur1" type="range" name="rg_sur" min="1" max="5" value="1">
					<input type="checkbox" name="chk_sur" id="sur1"> <label for="sur1">SUR</label>
				</td>
			</tr>
			<!---->
			<!---->
			<!---->
			<tr>
				<td rowspan="4">
					<input type="checkbox" name="chk" id="chk_2">
				</td>
				<td rowspan="4">
					ALUMBRADO PÚBLICO-RURAL
				</td>
				<td rowspan="4" name="tarifa_actual_2">
					3.75
				</td>
				<td>
					<label for="rg_norte2" id="rgl_norte2" name="rgl_norte"></label><input id="rg_norte2" type="range" name="rg_norte" min="1" max="5" value="1">
					<input type="checkbox" name="chk_norte" id="norte2"> <label for="norte2">NORTE</label>
				</td>
				<td rowspan="4" name="total_celda_2">
					
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_este2" id="rgl_este2" name="rgl_este"></label><input id="rg_este2" type="range" name="rg_este" min="1" max="4" value="1">
					<input type="checkbox" name="chk_este" id="este2"> <label for="este2">ESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_oeste2" id="rgl_oeste2" name="rgl_oeste"></label><input id="rg_oeste2" type="range" name="rg_oeste" min="1" max="6" value="1">
					<input type="checkbox" name="chk_oeste" id="oeste2"> <label for="oeste2">OESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_sur2" id="rgl_sur2" name="rgl_sur"></label><input id="rg_sur2" type="range" name="rg_sur" min="1" max="5" value="1">
					<input type="checkbox" name="chk_sur" id="sur2"> <label for="sur2">SUR</label>
				</td>
			</tr>
			<!---->
			<!---->
			<!---->
			<tr>
				<td rowspan="4">
					<input type="checkbox" name="chk" id="chk_3">
				</td>
				<td rowspan="4">
					ENERGÍA DEL MERCADO MUNICIPAL
				</td>
				<td rowspan="4" name="tarifa_actual_3">
					2.60
				</td>
				<td>
					<label for="rg_norte3" id="rgl_norte3" name="rgl_norte"></label><input id="rg_norte3" type="range" name="rg_norte" min="1" max="5" value="1">
					<input type="checkbox" name="chk_norte" id="norte3"> <label for="norte3">NORTE</label>
				</td>
				<td rowspan="4" name="total_celda_3">
					
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_este3" id="rgl_este3" name="rgl_este"></label><input id="rg_este3" type="range" name="rg_este" min="1" max="4" value="1">
					<input type="checkbox" name="chk_este" id="este3"> <label for="este3">ESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_oeste3" id="rgl_oeste3" name="rgl_oeste"></label><input id="rg_oeste3" type="range" name="rg_oeste" min="1" max="6" value="1">
					<input type="checkbox" name="chk_oeste" id="oeste3"> <label for="oeste3">OESTE</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="rg_sur3" id="rgl_sur3" name="rgl_sur"></label><input id="rg_sur3" type="range" name="rg_sur" min="1" max="5" value="1">
					<input type="checkbox" name="chk_sur" id="sur3"> <label for="sur3">SUR</label>
				</td>
			</tr>
		</tbody>
	</table>

    <script>
        
        //ESTA SECCIÓN FUE UTILIZADO PARA HACER PRUEBAS CON RESPECTO A LAS VARIABLLES GLOBALES

       /*
        var i = 0;
        for (i; i < 3; i++) {
            console.log('Este es el primer for: ' + i);
        }

        for (i=0; i < 6; i++) {
            console.log('Este es el segundo for: ' + i);
        }
        */

        var chk_elements = document.getElementsByName('chk');
        
        for (var i = 0; i < chk_elements.length; i++) {

            var chk = document.getElementById('chk_' + (i + 1));
            var chk_norte = document.getElementById('norte' + (i + 1));

            chk.addEventListener('change', (chk)=>{
                if(chk.target.checked){
                    console.log(chk.target.id + ' activado');
					for (let j = 0; j < chk_elements.length; j++) {
						console.log(i);
						console.log(j);
									
					}
					//console.log(i);
                }else{
                    console.log(chk.target.id + ' desactivado');
                }

				

				chk_norte.addEventListener('change', (chk_norte)=>{
					if(chk_norte.target.checked){
						console.log('activao');
					}else{
						console.log('desactivao');
					}
					
					/*if(chk.target.checked){
						if(chk_norte.target.checked){
							console.log(chk_norte.target.id + ' activado');
							
						}else{
							console.log(chk_norte.target.id + ' desactivado');
						}
					}else if(!chk.target.checked){
						if(chk_norte.target.checked){
							console.log(chk.target.id + ' no está habilitado');
							
						}
					}*/
				});
            });

            

            
            
        }
    </script>
</body>
</html>