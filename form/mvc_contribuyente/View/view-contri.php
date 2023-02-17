<?php 
$i = 1;
?>
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
				<span>Dirección completa del contribuyente: </span><?php echo $alm->direccion_contribuyente; ?>
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
			                if($r->zona_inmueble != null){
			                    echo $r->direccion_inmueble . ", Zona: " . $r->zona_inmueble . " (". $r->cod_zona.")";
			                }else{
			                    echo $r->direccion_inmueble;
			                }
			                ?>
						</td>
						<td>
							<?php echo $r->sector_estado; ?>
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
							<i class="glyphicon glyphicon-remove"><a id="eliminar-dato-content-main-<?php echo $i; ?>" href="#"> Eliminar</a></i>
                    <!--
                        A partir de aquí hacia abajo es código HTML del modal personalizado
                    -->
                    <div class="modal" id="modal-eliminar-<?php echo $i; ?>">
                        <div class="modal-eliminar" >
                            <div class="cabecera-modal">
                                <h2 style="padding: 5px;">Mensaje de confirmación</h2>
                            </div>
                            <div class="cuerpo-modal">
                                <h3>¿Está seguro que desea eliminar el siguiente registro?</h3>
                                <div style="display:inline-flex;">
                                    <div class="desc">ID inmueble: </div>
                                    <div class="result" style="color:black;"><u><?php echo $r->id_inmueble; ?></u></div>
                                </div>
                                <br>
                                <div style="display:inline-flex;">
                                    <div class="desc">Contribuyente propietario: </div>
                                    <div class="result" style="color:black;"><u><?php echo $r->nombre_contribuyente." ".$r->apellido_contribuyente; ?></u></div>
                                </div>
                            </div>
                            <div class="footer-modal">
                                <div style="margin-right:15%;">
                                    <input type="checkbox" name="confirm" id="confirm-<?php echo $i;?>"><label for="confirm-<?php echo $i;?>">Confirmar</label>
                                </div>
                                <a href="#" class="btn-modal" type="submit" id="aceptar-<?php echo $i;?>" style="margin-left: 0;margin-right:3%;" disabled>Aceptar</a>
                                <button class="btn-modal not-active" style="margin-left:3%;margin-right:2%;" id="cancelar-<?php echo $i;?>">Cancelar</button>
                            </div>
                        </div>
                    </div>

                    

                    <!--
                        Hasta aquí termina el código HTML del modal personalizado
                    -->

                    <!--
                        Los Scripts JavaScript que ejecuta el modal
                    -->

                    <script>
                        var confirmar_<?php echo $i;?> = document.getElementById('confirm-<?php echo $i;?>');

                        confirmar_<?php echo $i;?>.addEventListener('click', ()=>{
                            var acept_<?php echo $i;?> = document.getElementById('aceptar-<?php echo $i;?>');
                            acept_<?php echo $i;?>.disabled = !acept_<?php echo $i;?>.disabled;
                        });
                    </script>

                    <script>

                        var eliminar_dato_<?php echo $i;?> = document.getElementById('eliminar-dato-content-main-<?php echo $i;?>');
                        var aceptar_eliminar_<?php echo $i;?> = document.getElementById('aceptar-<?php echo $i;?>');
                        var cancelar_eliminar_<?php echo $i;?> = document.getElementById('cancelar-<?php echo $i;?>');
                        var modal_eliminar_<?php echo $i;?> = document.getElementById('modal-eliminar-<?php echo $i;?>');
                        var body = document.getElementsByTagName("body")[0];

                        eliminar_dato_<?php echo $i;?>.addEventListener('click', ()=>{
                            modal_eliminar_<?php echo $i;?>.style.display = "block";

                            body.style.position = "static";
                            body.style.height = "100%";
                            body.style.overflow = "hidden";
                        });
                        cancelar_eliminar_<?php echo $i;?>.addEventListener('click', ()=>{
                            modal_eliminar_<?php echo $i;?>.style.display = "none";
                            aceptar_eliminar_<?php echo $i;?>.disabled = true;
                            confirmar_<?php echo $i;?>.checked = false;

                            body.style.position = "inherit";
                            body.style.height = "auto";
                            body.style.overflow = "visible";
                        });

                        aceptar_eliminar_<?php echo $i;?>.addEventListener('click', ()=>{
                                if(confirmar_<?php echo $i;?>.checked){
                                    aceptar_eliminar_<?php echo $i;?>.setAttribute('href', `?c=Inmueble&a=Eliminar&id_inmueble=<?php echo $r->id_inmueble;?>`);
                                    modal_eliminar_<?php echo $i;?>.style.display = "none";
                                    aceptar_eliminar_<?php echo $i;?>.disabled = true;
                                    confirmar_<?php echo $i;?>.checked = false;
                                }
                                body.style.position = "inherit";
                                body.style.height = "auto";
                                body.style.overflow = "visible";
                            });

                        
                    </script>
                    <!--
                        Fin de scripts JavaScript que ejecuta el modal
                    -->
						</td>
					</tr>
				<?php $i++; endforeach; ?>
			</tbody>
		</table>
	</div>
