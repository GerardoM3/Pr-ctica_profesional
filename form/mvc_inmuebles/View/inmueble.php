<h1 class="page-header">Inmuebles</h1>


<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Inmueble&a=Crud">Agregar Inmueble</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID Inmueble</th>
            <th>ID del propietario</th>
            <th>Nombre completo del contribuyente propietario</th>
            <th>Dirección completa del inmueble</th>
            <th>Características del inmueble</th>
            <th>Dimensiones del inmueble (Norte->Este->Oeste->Sur)</th>
            <th><!--Botón de editar--></th>
            <th><!--Botón de eliminar--></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id_inmueble; ?></td>
            <td><?php echo $r->id_contribuyente; ?></td>
            <td><?php echo $r->nombre_contribuyente; ?></td>
            <td><?php echo $r->comunidad_inmueble.", ".$r->direccion_inmueble; ?></td>
            <td><?php echo $r->descripcion_inmueble; ?></td>
            <td><?php echo $r->norte_longitud.", ".$r->este_longitud.", ".$r->oeste_longitud.", ".$r->sur_longitud; ?></td>
            <td>
                    <i class="glyphicon glyphicon-edit"><a href="?c=Inmueble&a=Crud&id_inmueble=<?php echo $r->id_inmueble; ?>"> Editar</a></i>
                </td>
                <td>
                    <i class="glyphicon glyphicon-remove"><a href="?c=Inmueble&a=Eliminar&id_inmueble=<?php echo $r->id_inmueble; ?>"> Eliminar</a></i>
                </td>
            </tr>
    <?php endforeach; ?>

    </tbody>
</table> 
