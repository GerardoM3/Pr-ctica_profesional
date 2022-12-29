<h1 class="page-header">
    <?php echo $alm->id_contribuyente != null && $alm->correlativo != null ? $alm->nombre_contribuyente." ".$alm->apellido_contribuyente : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Contribuyente">Contribuyentes</a></li>
  <li class="active"><?php echo $alm->id_contribuyente !=null && $alm->correlativo != null ? $alm->nombre_contribuyente." ".$alm->apellido_contribuyente : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=Contribuyente&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_contribuyente" value="<?php echo $alm->id_contribuyente; ?>" />
    <input type="hidden" name="correlativo" value="<?php echo $alm->correlativo; ?>" />
    
    <div class="form-group">
        <label>Nombres del contribuyente</label>
        <input type="text" name="nombre_contribuyente" value="<?php echo $alm->nombre_contribuyente; ?>" class="form-control" placeholder="Ingrese nombres del contribuyente" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Apellidos del contribuyente</label>
        <input type="text" name="apellido_contribuyente" value="<?php echo $alm->apellido_contribuyente; ?>" class="form-control" placeholder="Ingrese apellidos del contribuyente" data-validacion-tipo="requerido|min:7" />
    </div>    
    
    <div class="form-group">
        <label>DUI del contribuyente</label>
        <input type="text" name="dui_contribuyente" value="<?php echo $alm->dui_contribuyente; ?>" class="form-control" placeholder="Ingrese DUI del contribuyente" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Teléfono del contribuyente</label>
        <input type="text" name="telefono_contribuyente" value="<?php echo $alm->telefono_contribuyente; ?>" class="form-control" placeholder="Ingrese teléfono del contribuyente" data-validacion-tipo="requerido|min:3" />
    </div>

    <h2>Dirección del contribuyente</h2>

    <div class="form-group">
        <label>Comunidad</label><h6 style="display: inline-block;position: relative;margin-left: 5px;">(barrio, colonia, caserío, cantón)</h6>
        <input type="text" name="comunidad_contribuyente" value="<?php echo $alm->comunidad_contribuyente; ?>" class="form-control" placeholder="Ingrese comunidad (barrio, colonia, caserío, cantón)" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Dirección</label><h6 style="display: inline-block;position: relative;margin-left: 5px;">(detalle)</h6>
        <input type="text" name="direccion_contribuyente" value="<?php echo $alm->direccion_contribuyente; ?>" class="form-control" placeholder="Ingrese su dirección" data-validacion-tipo="requerido|min:8" />
    </div>

    <div class="dropdown">
        <div>
            <label>Municipio</label>
            <select name="cod_municipio" id="cod_municipio" style="display: block;">
                <?php foreach ($this->model->Listar_Muni2($alm->id_contribuyente, $alm->correlativo) as $rM): ?>
                    <option value="<?php echo $alm->id_contribuyente != null && $alm->correlativo != null ? $rM->cod_municipio : 'Seleccione un municipio'; ?>"><?php echo $alm->id_contribuyente != null && $alm->correlativo != null ? $rM->municipio : 'Seleccione un municipio'; ?></option>
                <?php endforeach ?>

                <option value="">Seleccione un municipio</option>

                <?php foreach ($this->model->Listar_Muni() as $r): ?>
                    <option name="cod_municipio" value="<?php echo $r->cod_municipio?>"><?php echo $r->municipio?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div>
            <label>Departamento</label>
            <select name="cod_departamento" id="cod_departamento" style="display: block;">

                <?php foreach ($this->model->Listar_Departamento($alm->id_contribuyente, $alm->correlativo) as $rD): ?>
                    <option value="<?php echo $alm->id_contribuyente != null && $alm->correlativo != null ? $rD->cod_departamento : 'Seleccione un departamento'; ?>"><?php echo $alm->id_contribuyente != null && $alm->correlativo != null ? $rD->departamento : 'Seleccione un departamento'; ?></option>
                <?php endforeach; ?>

                <option value="">Seleccione un departamento</option>
                
                <?php foreach ($this->model->Listar_Departamentos() as $r): ?>

                    <option value="<?php echo $r->cod_departamento?>"><?php echo $r->departamento?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success"><?php echo $alm->id_contribuyente != null && $alm->correlativo != null ? 'Actualizar registro' : 'Agregar Registro'; ?></button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
