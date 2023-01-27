<h1 class="page-header" style="color:white;">Servicios</h1>

<?php 
$i=1;
?>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Servicio&a=Crud_Servicio">Agregar Servicio</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>COD 1</th>
            <th>COD 2</th>
            <th>COD 3</th>
            <th>COD 4</th>
            <th>SERVICIO</th>
            <th>SERVICIO (ABREVIADO)</th>
            <th>UNIDAD DE MEDIDA</th>
            <th>TARIFA ACTUAL</th>
            <th>TARIFA ANTERIOR</th>
            <th>PERIODO DE VIGENCIA DE LA TARIFA</th>
            <th>TIPO CONCEPTO</th>
            <th>TIPO COBRO</th>
            <th><!--Botón de editar--></th>
            <th><!--Botón de eliminar--></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->cod1; ?></td>
            <td><?php echo $r->cod2; ?></td>
            <td><?php echo $r->cod3; ?></td>
            <td><?php echo $r->cod4; ?></td>
            <td><?php echo $r->descripcion_servicio; ?></td>
            <td><?php echo $r->descripcion_servicio_abreviado; ?></td>
            <td><?php echo $r->unidad_medida; ?></td>
            <td><?php echo $r->tarifa_actual; ?></td>
            <td><?php echo $r->tarifa_anterior; ?></td>
            <td><?php echo $r->periodo_vigencia_tarifa; ?></td>
            <td><?php echo $r->tipo_concepto; ?></td>
            <td><?php echo $r->tipo_cobro; ?></td>
            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=Servicio&a=Crud_Servicio&cod1=<?php echo $r->cod1; ?>&cod2=<?php echo $r->cod2; ?>&cod3=<?php echo $r->cod3; ?>&cod4=<?php echo $r->cod4; ?>"> Editar</a></i>
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
                                <div class="desc">ID Servicio: </div>
                                <div class="result" style="color:black;"><u><?php echo $r->cod1.'-'.$r->cod2.'-'.$r->cod3.'-'.$r->cod4; ?></u></div>
                            </div>
                            <br>
                            <div style="display:inline-flex;">
                                <div class="desc">Servicio: </div>
                                <div class="result" style="color:black;"><u><?php echo $r->descripcion_servicio; ?></u></div>
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
                                aceptar_eliminar_<?php echo $i;?>.setAttribute('href', `?c=Servicio&a=Eliminar&cod1=<?php echo $r->cod1; ?>&cod2=<?php echo $r->cod2; ?>&cod3=<?php echo $r->cod3; ?>&cod4=<?php echo $r->cod4; ?>`);
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
    <!--<a href="?c=Servicio&a=Eliminar&cod1=<?php //echo $r->cod1; ?>&cod2=<?php //echo $r->cod2; ?>&cod3=<?php //echo $r->cod3; ?>&cod4=<?php //echo $r->cod4; ?>">-->
    </tbody>
</table> 
