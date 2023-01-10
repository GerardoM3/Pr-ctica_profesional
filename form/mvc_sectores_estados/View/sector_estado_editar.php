<h1 class="page-header">
    <?php echo $alm->cod_sector != null  ? $alm->sector_estado : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Sector">Sectores</a></li>
  <li class="active"><?php echo $alm->cod_sector != null  ? $alm->sector_estado : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=Sector&a=Guardar" method="post" enctype="multipart/form-data">

    
    <div class="form-group">
        <label>CODIGO SECTOR</label>
        <input type="text" name="cod_sector" value="<?php echo $alm->cod_sector; ?>" class="form-control" placeholder="Ingrese un código de sector"/>
    </div>
    
    
    <div class="form-group">
        <label>SECTOR</label>
        <input type="text" name="sector_estado" value="<?php echo $alm->sector_estado; ?>" class="form-control" placeholder="Ingrese sector" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success"><?php echo $alm->cod_sector != null  ? "Actualizar registro" : 'Agregar Registro'; ?></button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
