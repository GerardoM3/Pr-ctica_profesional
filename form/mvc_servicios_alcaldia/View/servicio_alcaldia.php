<h1 class="page-header">Servicios</h1>


<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Persona&a=Crud">Agregar Servicio</a>
</div>

<table class="table table-striped">
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
                <i class="glyphicon glyphicon-edit"><a href="?c=Servicio&a=Crud_Servicio&cod1=<?php echo $r->cod1; ?>&cod3=<?php echo $r->cod2; ?>&cod3=<?php echo $r->cod3; ?>&cod4=<?php echo $r->cod4; ?>"> Editar</a></i>
            </td>
            <td>
                <i class="glyphicon glyphicon-remove"><a href="?c=Servicio&a=Eliminar&cod1=<?php echo $r->cod1; ?>&cod3=<?php echo $r->cod2; ?>&cod3=<?php echo $r->cod3; ?>&cod4=<?php echo $r->cod4; ?>"> Eliminar</a></i>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
