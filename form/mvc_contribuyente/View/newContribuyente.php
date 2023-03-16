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
				<input type="number" name="norte_longitud" class="form-control" maxlength="5">
			</div>

			<!--	Este	-->
			<div class="form-group" style="width:20%; display: inline-block; margin-left: 1%; margin-right:1%;">
				<label>Este</label>
				<input type="number" name="este_longitud" class="form-control" maxlength="5">
			</div>

			<!--	Oeste	-->
			<div class="form-group" style="width:20%; display: inline-block; margin-left: 1%; margin-right:1%;">
				<label>Oeste</label>
				<input type="number" name="oeste_longitud" class="form-control" maxlength="5">
			</div>

			<!--	Sur		-->
			<div class="form-group" style="width:20%; display: inline-block; margin-left: 1%; margin-right:1%;">
				<label>Sur</label>
				<input type="number" name="sur_longitud" class="form-control" maxlength="5">
			</div>
		</div>
	</div>
	<h2 class="page-header">
		Servicios aplicados al inmueble
	</h2>
	<div class="servicio-data form-group" id="servicio-data">
		<div class="search-section" id="search-section">

			<div class="search-bar" id="search-bar" style="display:flex; justify-content: right;">
				<i class="btn btn-primary" style="margin-right: 1em;">Buscar</i>
				<input type="search" id="search-servicio" name="search-servicio" class="form-control" style="width:50%; margin-left: 1em;">
			</div>
			
			
			<div class="search-group form-group" id="search-group" style="display:flex; justify-content:right; margin-top: 1em;">
				<ul>
					<li style="list-style: none;">
						<input type="radio" name="categoria" id="codigo_servicio" value="Código Servicio" style="margin-right:1em;"><label style="color:white;" for="codigo_servicio">Código Servicio</label>
					</li>
					<li style="list-style: none;">
						<input type="radio" name="categoria" id="servicio" value="Nombre del servicio" style="margin-right:1em;" checked><label style="color:white;" for="servicio">Nombre del servicio</label>
					</li>
					<li style="list-style: none;">
						<input type="radio" name="categoria" id="servicio_abreviado" value="Nombre del servicio (abreviado)" style="margin-right:1em;"><label style="color:white;" for="servicio_abreviado">Nombre del servicio (abreviado)</label>
					</li>
				</ul>
			</div>



			<div class="service-list" id="service-list">
				<table class="table table-bordered table-service">
					<thead>
						<tr>
							<th><input type="checkbox" name="activoTodo" id="selectAll"><label for="selectAll">Seleccionar todo</label></th>
							<th>Servicios</th>
							<th>Valor</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach($this->modelServicio->Listar_servicios() as $result): ?>
						<tr>
							<td><center><input type="checkbox" name="chk" class="chequeo" id="<?php echo $i;?>"></center></td>
							<td><?php echo $result->descripcion_servicio; ?></td>
							<td><?php echo $result->tarifa_actual; ?></td>
						</tr>
						<?php $i++; endforeach; ?>
					</tbody>
				</table>
			</div>

			<script type="text/javascript">
				var selectAll = document.getElementById("selectAll");

				var search_change = document.getElementById("search-servicio");

				var ele = document.getElementsByName('chk');

				
				selectAll.addEventListener("click", ()=>{
					for (var i = 0; i < ele.length; i++) {
						if(ele[i].type == 'checkbox'){
							ele[i].checked = !ele[i].checked;
							console.log(ele[i].id);
						}
					}
				});
				
				function chequeo(){
					for (var i = 0; i < ele.length; i++) {
						if(ele[i].checked){
							console.log(ele[i].id);
						}
						
					}
				}

				

				for (var i = 0; i < ele.length; i++) {
					ele[i].addEventListener("change", chequeo);
					if ((ele[i].type == 'checkbox')&& (ele[i].checked == true)) {
						console.log(ele[i].id);
					}
				}
			</script>

			
		</div>
		<div class="form-group registrar" id="registrar" style="display:flex; justify-content:center;">
			<button class="btn btn-success" style="padding: .8em; font-size: 20px;">Agregar nuevo registro</button>
		</div>
	</div>
</form>

