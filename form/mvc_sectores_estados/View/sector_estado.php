<h1 class="page-header" style="color:white;">Sectores</h1>

<?php $i = 1;?>


<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Sector&a=Crud_Sector">Agregar Sector</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>CODIGO SECTOR</th>
            <th>SECTOR / TIPO / ESTADO</th>
            <th><!--Botón de editar--></th>
            <th><!--Botón de eliminar--></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->cod_sector; ?></td>
            <td><?php echo $r->sector_estado; ?></td>
            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=Sector&a=Crud_Sector&cod_sector=<?php echo $r->cod_sector; ?>"> Editar</a></i>
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
                                <div class="desc">COD Sector: </div>
                                <div class="result" style="color:black;"><u><?php echo $r->cod_sector; ?></u></div>
                            </div>
                            <br>
                            <div style="display:inline-flex;">
                                <div class="desc">Sector/Tipo/Estado: </div>
                                <div class="result" style="color:black;"><u><?php echo $r->sector_estado; ?></u></div>
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
                                aceptar_eliminar_<?php echo $i;?>.setAttribute('href', `?c=Sector&a=Eliminar&cod_sector=<?php echo $r->cod_sector; ?>`);
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
    <!--<a href="?c=Sector&a=Eliminar&cod_sector=<?php //echo $r->cod_sector; ?>">-->
    </tbody>
</table> 