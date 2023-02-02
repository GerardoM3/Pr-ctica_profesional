
	<div class="header-page">
		<div class="image-alcaldia">
			
		</div>
		<div class="datos-generales-contribuyente">
			<h2 style="color:white;">Datos generales del contribuyente</h2>
			<p style="float: right;font-size: 19px;">
				<b>
					<span>N° Contribuyente: </span><?php echo $alm->id_contribuyente."-".$alm->correlativo; ?>
				</b>
			</p>
			<p>
				<span>Nombre completo del contribuyente: </span><?php echo $alm->nombre_contribuyente . ' ' . $alm->apellido_contribuyente;?>
			</p>
			<p>
				<span>Dirección completa del contribuyente: </span><?php echo $alm->comunidad_contribuyente.", ".$alm->direccion_contribuyente.", ".$alm->municipio.", ".$alm->departamento; ?>
			</p>
			<p>
				<span>DUI del contribuyente: </span><?php echo $alm->dui_contribuyente; ?>
			</p>
			<p>
				<span>Teléfono de contacto: </span><?php echo $alm->telefono_contribuyente; ?>
			</p>
			
		</div>
	</div>
	<div class="tabla-inmuebles">
		<table class="table table-bordered">
			<caption style="color:white;">
				<h2>Inmuebles del contribuyente</h2>
			</caption>
			<thead>
				<tr>
					<th>
						ID inmueble
					</th>
					<th>
						Dirección completa del inmueble
					</th>
					<th>
						Características del inmueble
					</th>
					<th>
						Dimensiones del inmueble (Norte->Este->Oeste->Sur)
					</th>
					<th>
						<!--Botón de agregar servicios-->
					</th>
					<th>
						<!--Botón de editar-->
					</th>
					<th>
						<!--Botón de eliminar-->
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($this->model->ListarInmuebleContri($_REQUEST['correlativo']) as $r): ?>
					<tr>
						<td>
							<?php echo $r->id_inmueble; ?>
						</td>
						<td>
							<?php 
			                if($r->zona_comunidad_inmueble != null){
			                    echo $r->comunidad_inmueble.", " . $r->zona_comunidad_inmueble . ", " . $r->direccion_inmueble;
			                }else{
			                    echo $r->comunidad_inmueble.", ".$r->direccion_inmueble;
			                }
			                ?>
						</td>
						<td>
							<?php echo $r->descripcion_inmueble; ?>
						</td>
						<td>
							<?php echo $r->norte_longitud.", ".$r->este_longitud.", ".$r->oeste_longitud.", ".$r->sur_longitud; ?>
						</td>
						<td>
							<a href="">Agregar servicios</a>
						</td>
						<td>
							<i class="glyphicon glyphicon-edit"><a href="?c=Inmueble&a=Crud&id_inmueble=<?php echo $r->id_inmueble; ?>">Editar</a></i>
						</td>
						<td>
							<i class="glyphicon glyphicon-remove"><a href="">Eliminar</a></i>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
