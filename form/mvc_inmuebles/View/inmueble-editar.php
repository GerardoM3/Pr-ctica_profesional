<h1 class="page-header">
    <?php echo $alm->id_inmueble != null ? $alm->descripcion_inmueble : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Inmueble">Inmuebles</a></li>
  <li class="active"><?php echo $alm->id_inmueble != null ? $alm->descripcion_inmueble : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=Inmueble&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_inmueble" value="<?php echo $alm->id_inmueble; ?>" />
    
    <div class="form-group">
        <label>Comunidad</label>
        <input type="text" name="comunidad_inmueble" value="<?php echo $alm->comunidad_inmueble; ?>" class="form-control" placeholder="Ingrese comunidad (barrio, colonia, caserío, cantón)" data-validacion-tipo="requerido|min:3" />
    </div>

    <script>

        function habilitarZona(campoZona){
            var estadoActual = document.getElementById(campoZona)

            estadoActual.disabled = !estadoActual.disabled;
        }
    </script>

    <div class="form-group">
        <input type="checkbox" id="cb_zona" name="cb_zona" class="check_zona_input" onclick="habilitarZona('zona_input')"/><label for="cb_zona">¿Existe zonas en la comunidad?</label>
    </div>

    <div class="form-group" id="zona_comunidad_inmueble">
        <label>Zona</label>
        <input type="text" id="zona_input" name="zona_input" value="<?php echo $alm->zona_comunidad_inmueble?>" class="form-control" placeholder="Ingrese la zona de la comunidad" disabled>
        
    </div>
    
    <div class="form-group">
        <label>Dirección del inmueble</label>
        <input type="text" name="direccion_inmueble" value="<?php echo $alm->direccion_inmueble; ?>" class="form-control" placeholder="Ingrese la dirección del inmueble" data-validacion-tipo="requerido|min:7" />
    </div>

    <div class="propietario" style="width:600px; display: inline-block; position: relative; margin-left: 2rem; float: right;">
        <label>Propietario</label><h6 style="display: inline-block;position: relative;margin-left: 5px;">(correlativo)</h6>
        <input type="text" name="correlativo" value="<?php echo $alm->correlativo; ?>" class="form-control" placeholder="Ingrese número correlativo del propietario" data-validacion-tipo="requerido|min:3" style="width: 600px;">
    </div>
    
    <div class="form-group">
        <label>Características del inmueble</label>
        <input type="text" name="descripcion_inmueble" value="<?php echo $alm->descripcion_inmueble; ?>" class="form-control" placeholder="Ingrese las características del inmueble" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Norte</label>
        <input type="text" name="norte_longitud" value="<?php echo $alm->norte_longitud; ?>" class="form-control" placeholder="Ingrese la longitud que tiene el norte del inmueble" data-validacion-tipo="requerido|min:8" />
    </div>

    <div class="form-group">
        <label>Este</label>
        <input type="text" name="este_longitud" value="<?php echo $alm->este_longitud; ?>" class="form-control" placeholder="Ingrese la longitud que tiene el este del inmueble" data-validacion-tipo="requerido|min:8" />
    </div>

    <div class="form-group">
        <label>Oeste</label>
        <input type="text" name="oeste_longitud" value="<?php echo $alm->oeste_longitud; ?>" class="form-control" placeholder="Ingrese la longitud que tiene el oeste del inmueble" data-validacion-tipo="requerido|min:8" />
    </div>

    <div class="form-group">
        <label>Sur</label>
        <input type="text" name="sur_longitud" value="<?php echo $alm->sur_longitud; ?>" class="form-control" placeholder="Ingrese la longitud que tiene el sur del inmueble" data-validacion-tipo="requerido|min:8" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success"><?php echo $alm->id_inmueble != null ? 'Actualizar registro' : 'Agregar registro'; ?></button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
