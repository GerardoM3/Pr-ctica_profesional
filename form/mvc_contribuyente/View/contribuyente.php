<h1 class="page-header">Contribuyentes</h1>

<?php 
$agregar = 'Haz click para agregar un nuevo ';
$edit_help = utf8_encode('Haz click aquí para editar los datos de ');
$delete_help = utf8_encode('Haz click aquí para eliminar');


//data-desc="

//"
//data-desc="

//"
//data-desc="
//"
 ?>

<?php //echo utf8_decode($edit_help) . $r->nombre_contribuyente . ' ' . $r->apellido_contribuyente; ?>
<?php //echo utf8_decode($delete_help); ?>
<?php //echo $agregar .  'contribuyente'?>

<div class="well well-sm text-right">
    <a  class="btn btn-primary" href="?c=Contribuyente&a=Crud">Agregar Contribuyente</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Número contribuyente</th>
            <th>Nombre completo del contribuyente</th>
            <th>Dirección completa del contribuyente</th>
            <th>DUI</th>
            <th>NIT</th>
            <th>Teléfono contribuyente</th>
            <th><!--Botón de editar--></th>
            <th><!--Botón de eliminar--></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar2() as $r): ?>
        <tr>
            <td><?php echo $r->id_contribuyente."-".$r->correlativo; ?></td>
            <td><?php echo $r->nombre_contribuyente. " " .$r->apellido_contribuyente; ?></td>
            <td><?php echo $r->comunidad_contribuyente.", ".$r->direccion_contribuyente.", ".$r->municipio.", ".$r->departamento; ?></td>
            <td><?php echo $r->dui_contribuyente; ?></td>
            <td><?php echo $r->telefono_contribuyente; ?></td>
            <td>
                    <i class="glyphicon glyphicon-edit"><a  href="?c=Contribuyente&a=Crud&id_contribuyente=<?php echo $r->id_contribuyente; ?>&correlativo=<?php echo $r->correlativo;?>"> Editar</a></i>
                </td>
                <td>
                    <i class="glyphicon glyphicon-remove"><a  href="?c=Contribuyente&a=Eliminar&id_contribuyente=<?php echo $r->id_contribuyente; ?>&correlativo=<?php echo $r->correlativo;?>"> Eliminar</a></i>
                </td>
            </tr>
    <?php endforeach; ?>

    </tbody>
</table> 
