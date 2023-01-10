<h1 class="page-header">Sectores</h1>


<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Sector&a=Crud_Sector">Agregar Sector</a>
</div>

<table class="table table-striped">
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
                <i class="glyphicon glyphicon-remove"><a href="?c=Sector&a=Eliminar&cod_sector=<?php echo $r->cod_sector; ?>"> Eliminar</a></i>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 