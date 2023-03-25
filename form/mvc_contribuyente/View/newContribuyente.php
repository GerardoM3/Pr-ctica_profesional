<h1 class="page-header">
	Nuevo registro de contribuyente
</h1>

<form action="?c=Contribuyente&a=guardaRegistro" method="POST" enctype="multipart/form-data">
	<h2 class="page-header">
		Datos del contribuyente
	</h2>
	<div class="contribuyente-data" id="contribuyente-data">
		<!--			Nombres del contribuyente			-->
		<div class="form-group">
			<label>Nombres del contribuyente</label>
			<input type="text" name="nombre_contribuyente" placeholder="Ingrese los nombres del contribuyente" class="form-control" style="width: 40%;" />
		</div>

		<!--			Apellidos del contribuyente			-->
		<div class="form-group">
			<label>Apellidos del contribuyente</label>
			<input type="text" name="apellido_contribuyente" placeholder="Ingrese los apellidos del contribuyente" class="form-control" style="width: 40%;">
		</div>

		<!--				DUI del contribuyente			-->
		<div class="form-group">
			<label>DUI del contribuyente (CON GUIÓN)</label>
			<input type="text" name="dui_contribuyente" placeholder="Ingrese DUI del contribuyente" class="form-control" maxlength="10" style="width:20%;">
		</div>

		<!--	Dirección de residencia del contribuyente	-->
		<div class="form-group">
			<label>Dirección de residencia del contribuyente (según DUI)</label>
			<input type="text" name="direccion_contribuyente" placeholder="Ingrese la dirección de residencia del contribuyente según DUI" class="form-control" style="width:90% ;">
		</div>

		<!--	Teléfono de contacto del contribuyente		-->
		<div class="form-group">
			<label>Teléfono de contacto del contribuyente (con guión)</label>
			<input type="text" name="telefono_contribuyente" placeholder="Teléfono del contribuyente" class="form-control" maxlength="9" style="width:18%;">
		</div>
	</div>
	<h2 class="page-header">
		Datos del inmueble
	</h2>
	<div class="inmueble-data" id="inmueble-data">
		<!--	Dirección del inmueble	-->
		<div class="form-group">
			<label>Dirección del inmueble</label>
			<input type="text" name="direccion_inmueble" placeholder="Ingrese la dirección del inmueble" class="form-control" style="width:90%;">
		</div>

		<!--	Zona del inmueble	-->
		<div class="form-group" style="width:49.5%; margin: 0; display: inline-block;">
			<label>Zona</label>
			<select name="cod_zona" id="selectZona" style="display:block; appearance: auto;">
                
                <option value="0" selected>Seleccione una zona</option>
                <?php foreach($this->model->listarZona() as $rZona): ?>
                    <option value="<?php echo $rZona->cod_zona;?>"><?php echo $rZona->zona_inmueble;?></option>
                <?php endforeach; ?>
            </select>
		</div>

		<!--	Característica del inmueble	-->
		<div class="form-group" style="width:49.5%; margin: 0; display: inline-block;">
			<label>Característica del inmueble</label>
			<select name="cod_sector" id="selectCaracteristica" style="display:block;">
                <option value="0" selected> Selecciona una característica</option>
                <?php foreach($this->model->listarSector() as $rSector): ?>
                    <option value="<?php echo $rSector->cod_sector;?>"><?php echo $rSector->sector_estado;?></option>
                <?php endforeach; ?>
            </select>
		</div>

		<div class="dimensiones form-group" id="dimensiones" style="padding-top: 1em; margin:0; width:100%;">
			<div class="label-dimensiones">
				<h4>Dimensiones del inmueble</h4>
			</div>
			<!--	Norte	-->
			<div class="form-group" style="width:20%; display: inline-block; margin-left: 1%; margin-right:1%;">
				<label>Norte</label>
				<input type="number" id="norte_longitud" name="norte_longitud" class="form-control" maxlength="5">
			</div>

			<!--	Este	-->
			<div class="form-group" style="width:20%; display: inline-block; margin-left: 1%; margin-right:1%;">
				<label>Este</label>
				<input type="number" id="este_longitud" name="este_longitud" class="form-control" maxlength="5">
			</div>

			<!--	Oeste	-->
			<div class="form-group" style="width:20%; display: inline-block; margin-left: 1%; margin-right:1%;">
				<label>Oeste</label>
				<input type="number" id="oeste_longitud" name="oeste_longitud" class="form-control" maxlength="5">
			</div>

			<!--	Sur		-->
			<div class="form-group" style="width:20%; display: inline-block; margin-left: 1%; margin-right:1%;">
				<label>Sur</label>
				<input type="number" id="sur_longitud" name="sur_longitud" class="form-control" maxlength="5">
			</div>
		</div>
	</div>
	<h2 class="page-header">
		Servicios aplicados al inmueble
	</h2>
	<div class="servicio-data form-group" id="servicio-data">

		<div class="search-section" id="search-section">

			<div class="service-list" id="service-list">
				<table class="table table-bordered table-service" style="display: table; text-align: center; justify-items: top;">
					<thead>
						<tr>
							<th><input type="checkbox" name="activoTodo" id="selectAll"><label for="selectAll">Seleccionar todo</label></th>
							<th>Servicios</th>
							<th>Valor</th>
							<th>Aplicar a</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach($this->modelServicio->Listar_servicios() as $result): ?>
						<tr>
							<td rowspan="4" style="vertical-align: middle;"><center><input type="checkbox" name="chk" class="chequeo" id="<?php echo $result->id_servicio_alcaldia;?>"></center></td>
							<td rowspan="4" style="vertical-align: middle;"><?php echo $result->descripcion_servicio; ?></td>
							<td rowspan="4" style="vertical-align: middle;"><?php echo $result->tarifa_actual; ?></td>
							<td><input type="checkbox" name="chk_norte" id="norte<?php echo $i;?>"> <label for="norte<?php echo $i;?>">Norte</label> <input type="range" class="rg_norte" name="rg_norte" min="1" max="" value="1" id="rg_norte<?php echo $i;?>"> <label for="rg_norte" id="rgl_norte<?php echo $i; ?>"></label></td>
							
							<td rowspan="4" style="vertical-align: middle;" id="resultado"></td>
						</tr>
						<tr><td><input type="checkbox" name="chk_este" id="este<?php echo $i;?>"> <label for="este<?php echo $i;?>">Este</label> <input type="range" class="rg_este" name="rg_este" min="1" max="" value="1" id="rg_este<?php echo $i;?>"> <label for="rg_este" id="rgl_este<?php echo $i; ?>"></label></td></tr>
						<tr><td><input type="checkbox" name="chk_oeste" id="oeste<?php echo $i;?>"> <label for="oeste<?php echo $i;?>">Oeste</label> <input type="range" class="rg_oeste" name="rg_oeste" min="1" max="" value="1" id="rg_oeste<?php echo $i;?>"> <label for="rg_oeste" id="rgl_oeste<?php echo $i; ?>"></label></td></tr>
						<tr><td><input type="checkbox" name="chk_sur" id="sur<?php echo $i;?>"> <label for="sur<?php echo $i;?>">Sur</label> <input type="range" class="rg_sur" name="rg_sur" min="1" max="" value="1" id="rg_sur<?php echo $i;?>"> <label for="rg_sur" id="rgl_sur<?php echo $i; ?>"></label></td></tr>

						<script type="text/javascript">
						var selectAll = document.getElementById("selectAll");
						var north_long = document.getElementById("norte_longitud");
						var east_long = document.getElementById("este_longitud");
						var west_long = document.getElementById("oeste_longitud");
						var south_long = document.getElementById("sur_longitud");

						var rg_norte<?php echo $i;?> = document.getElementById("rg_norte<?php echo $i;?>");
						var rg_este<?php echo $i;?> = document.getElementById("rg_este<?php echo $i;?>");
						var rg_oeste<?php echo $i;?> = document.getElementById("rg_oeste<?php echo $i;?>");
						var rg_sur<?php echo $i;?> = document.getElementById("rg_sur<?php echo $i;?>");

						var rgl_norte<?php echo $i;?> = document.getElementById("rgl_norte<?php echo $i;?>");
						var rgl_este<?php echo $i;?> = document.getElementById("rgl_este<?php echo $i;?>");
						var rgl_oeste<?php echo $i;?> = document.getElementById("rgl_oeste<?php echo $i;?>");
						var rgl_sur<?php echo $i;?> = document.getElementById("rgl_sur<?php echo $i;?>");

						var chk_norte = document.getElementsByName('chk_norte');
						var chk_este = document.getElementsByName('chk_este');
						var chk_oeste = document.getElementsByName('chk_oeste');
						var chk_sur = document.getElementsByName('chk_sur');

						var rg_norte = document.getElementsByName('rg_norte');
						var rg_este = document.getElementsByName('rg_este');
						var rg_oeste = document.getElementsByName('rg_oeste');
						var rg_sur = document.getElementsByName('rg_sur');

						var search_change = document.getElementById("search-servicio");

						var ele = document.getElementsByName('chk');


						north_long.addEventListener('keyup', (e)=>{
							rg_norte<?php echo $i;?>.max = e.target.value;
							rg_norte<?php echo $i;?>.value = e.target.value;
							rgl_norte<?php echo $i;?>.textContent = rg_norte<?php echo $i;?>.value;
							rg_norte<?php echo $i;?>.addEventListener('change', (e)=>{
								rgl_norte<?php echo $i;?>.textContent = e.target.value;
							});
						});
						east_long.addEventListener('keyup', (e)=>{
							rg_este<?php echo $i;?>.max = e.target.value;
							rg_este<?php echo $i;?>.value = e.target.value;
							rgl_este<?php echo $i;?>.textContent = rg_este<?php echo $i;?>.value;
							rg_este<?php echo $i;?>.addEventListener('change', (e)=>{
								rgl_este<?php echo $i;?>.textContent = e.target.value;
							});
						});
						west_long.addEventListener('keyup', (e)=>{
							rg_oeste<?php echo $i;?>.max = e.target.value;
							rg_oeste<?php echo $i;?>.value = e.target.value;
							rgl_oeste<?php echo $i;?>.textContent = rg_oeste<?php echo $i;?>.value;
							rg_oeste<?php echo $i;?>.addEventListener('change', (e)=>{
								rgl_oeste<?php echo $i;?>.textContent = e.target.value;
							});
						});
						south_long.addEventListener('keyup', (e)=>{
							rg_sur<?php echo $i;?>.max = e.target.value;
							rg_sur<?php echo $i;?>.value = e.target.value;
							rgl_sur<?php echo $i;?>.textContent = rg_sur<?php echo $i;?>.value;
							rg_sur<?php echo $i;?>.addEventListener('change', (e)=>{
								rgl_sur<?php echo $i;?>.textContent = e.target.value;
							});
						});

						function chequeo(){
							for (var i = 0; i < ele.length; i++) {
								chk_norte[i].disabled = true;
								chk_este[i].disabled = true;
								chk_oeste[i].disabled = true;
								chk_sur[i].disabled = true;

								rg_norte[i].disabled = true;
								rg_este[i].disabled = true;
								rg_oeste[i].disabled = true;
								rg_sur[i].disabled = true;
								if(ele[i].checked){
									//console.log(ele[i].id);
									console.log('Está habilitado');
									chk_norte[i].disabled = false;
									chk_este[i].disabled = false;
									chk_oeste[i].disabled = false;
									chk_sur[i].disabled = false;

									rg_norte[i].disabled = false;
									rg_este[i].disabled = false;
									rg_oeste[i].disabled = false;
									rg_sur[i].disabled = false;

									/*rg_norte[i].value = ;
									rg_este[i].value = ;
									rg_oeste[i].value = ;
									rg_sur[i].value = ;*/
									/*$.ajax({
										url: 'mvc_contribuyente/gets/getSelected.php?seleccion=' + ele[i].id + '&norte_long=' + north_long.value + '&este_long=' + east_long.value + '&oeste_long=' + west_long.value + '&sur_long=' + south_long.value,
										success: function(data){
											$('#selected-service').html(data);
										}
									})*/
								}
								/*if ((ele[i].type == 'checkbox') && (ele[i].checked == true)) {
									console.log('Está habilitado');
								}*/
								/*else if (ele[i].checked == false){
									console.log('Está inhabilitado');
									chk_norte[i].disabled = true;
									chk_este[i].disabled = true;
									chk_oeste[i].disabled = true;
									chk_sur[i].disabled = true;

									rg_norte[i].disabled = true;
									rg_este[i].disabled = true;
									rg_oeste[i].disabled = true;
									rg_sur[i].disabled = true;
								}*/
								
							}
						}

					</script>
						
						<?php $i++; endforeach; ?>
					</tbody>
				</table>
			</div>
			

			<script type="text/javascript">
				for (var i = 0; i < ele.length; i++) {
					chk_norte[i].disabled = true;
					chk_este[i].disabled = true;
					chk_oeste[i].disabled = true;
					chk_sur[i].disabled = true;

					rg_norte[i].disabled = true;
					rg_este[i].disabled = true;
					rg_oeste[i].disabled = true;
					rg_sur[i].disabled = true;
				}

				
				selectAll.addEventListener("click", ()=>{
					for (var i = 0; i < ele.length; i++) {
						if(ele[i].type == 'checkbox'){
							ele[i].checked = !ele[i].checked;
							console.log(ele[i].id);
						}
					}
				});
				
				

				for (var i = 0; i < ele.length; i++) {
					ele[i].addEventListener("change", chequeo);

				}
			</script>
			
		</div>
		
	</div>
	<!--
		Sección de servicios seleccionados
	-->
	<!--<h2 class="page-header">
		Servicios seleccionados
	</h2>

	<div class="selected-section form-group">
		<table class="table table-bordered" id="selected-service">
			<thead>
				
			</thead>
			<tbody>
				<tr>
					<td><center>Sin selección aún</center></td>
				</tr>
			</tbody>
		</table>
	</div>-->

	<!--
		Fin de la sección de los servicios seleccionados
	-->
	<div class="form-group registrar" id="registrar" style="display:flex; justify-content:center;">
		<button class="btn btn-success" style="padding: .8em; font-size: 20px;">Agregar nuevo registro</button>
	</div>
</form>

