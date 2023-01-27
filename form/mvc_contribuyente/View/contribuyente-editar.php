<?php
    require ('conexion.php');
    
    $query = "SELECT cod_departamento, departamento FROM meta_departamento ORDER BY departamento";
    $resultado=$mysqli->query($query);
?>

<h1 class="page-header">
    <?php echo $alm->id_contribuyente != null && $alm->correlativo != null ? $alm->nombre_contribuyente.' '.$alm->apellido_contribuyente : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Contribuyente">Contribuyentes</a></li>
  <li class="active"><?php echo $alm->id_contribuyente !=null && $alm->correlativo != null ? $alm->nombre_contribuyente.' '.$alm->apellido_contribuyente : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=Contribuyente&a=Guardar" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_contribuyente" placeholder="ID Contribuyente" value="<?php echo $alm->id_contribuyente; ?>" />
    <input type="hidden" name="correlativo" placeholder="Correlativo" value="<?php echo $alm->correlativo; ?>" />
    
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

    <h3>Dirección del contribuyente</h3>

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
            <label>Departamento</label>
            <select class="select-departamento" name="cod_departamento" id="select-departamento" style="display: block;">

                <?php foreach ($this->model->Listar_Departamento($alm->id_contribuyente, $alm->correlativo) as $rD): ?>
                    <option value="<?php echo $alm->id_contribuyente != null && $alm->correlativo != null ? $rD->cod_departamento : 'Seleccione un departamento'; ?>"><?php echo $alm->id_contribuyente != null && $alm->correlativo != null ? $rD->departamento : 'Seleccione un departamento'; ?></option>
                <?php endforeach; ?>

                <option value="">Seleccione un departamento</option>
                
                <?php while($row = $resultado->fetch_assoc()) { ?>
					<option value="<?php echo $row['cod_departamento']; ?>"><?php echo $row['departamento']; ?></option>
				<?php } ?>
            </select>
        </div>

        

        <div>
            <label>Municipio</label>
            <select class="select-muni" name="cod_municipio" id="select-muni" style="display: block;">
            <?php foreach ($this->model->Listar_Muni2($alm->id_contribuyente, $alm->correlativo) as $rM): ?>
                <option value="<?php echo $alm->id_contribuyente != null && $alm->correlativo != null ? $rM->cod_municipio : 'Seleccione un municipio'; ?>"><?php echo $alm->id_contribuyente != null && $alm->correlativo != null ? $rM->municipio : 'Seleccione un municipio'; ?></option>
            <?php endforeach; ?>

            </select>

            
        </div>
    </div>

    <div>
        <h2>Sección de inmueble del contribuyente</h2>
    </div>

    

    <div class="text-center">

        <!--<input type="checkbox" name="checkReset" id="checkReset" onchange="habilitarZona('resetear')" /><label for="checkReset">¿Desea agregar un nuevo inmueble?</label>-->
        <a class="btn btn-primary" name="reseteo" id="resetear">Nuevo inmueble</a>
        
        <!--<script>
            function habilitarZona(campoZona){
                var estadoActual = document.getElementById(campoZona);

                estadoActual.disabled = !estadoActual.disabled;
            };
        </script>-->
    </div>

    

    <div class="form-group" id="guardar_inmueble">
        <input class="inmueble" id="1" type="hidden" placeholder="ID Inmueble" name="id_inmueble"  />
        <input class="inmueble" id="2" type="hidden" placeholder="ID Característica" name="id_caracteristica"  />
        <input class="inmueble" id="3" type="hidden" placeholder="ID Dimensión" name="id_dimension" >

        <div class="form-group">
            <label>Comunidad</label>
            <input type="text" name="comunidad_inmueble" class="form-control inmueble" id="4" placeholder="Ingrese comunidad (barrio, colonia, caserío, cantón)" data-validacion-tipo="requerido|min:3" />
        </div>

        <div class="form-group">
            <label>Zona</label>
            <input type="text" name="zona_comunidad_inmueble" class="form-control inmueble" id="5" placeholder="Ingrese la zona de la comunidad" data-validacion-tipo="requerido|min:8"/>
            
        </div>
        
        <div class="form-group">
            <label>Dirección del inmueble</label>
            <input type="text" name="direccion_inmueble" class="form-control inmueble" id="6" placeholder="Ingrese la dirección del inmueble" data-validacion-tipo="requerido|min:7" />
        </div>

        <div class="form-group">
            <label>Características del inmueble</label>
            <input type="text" name="descripcion_inmueble" class="form-control inmueble" id="7" placeholder="Ingrese las características del inmueble" data-validacion-tipo="requerido|min:3" />
        </div>
        
        <div class="form-group">
            <label>Norte</label>
            <input type="text" name="norte_longitud"  class="form-control inmueble" id="8" placeholder="Ingrese la longitud que tiene el norte del inmueble" data-validacion-tipo="requerido|min:8" />
        </div>

        <div class="form-group">
            <label>Este</label>
            <input type="text" name="este_longitud" class="form-control inmueble" id="9" placeholder="Ingrese la longitud que tiene el este del inmueble" data-validacion-tipo="requerido|min:8" />
        </div>

        <div class="form-group">
            <label>Oeste</label>
            <input type="text" name="oeste_longitud" class="form-control inmueble" id="10" placeholder="Ingrese la longitud que tiene el oeste del inmueble" data-validacion-tipo="requerido|min:8" />
        </div>

        <div class="form-group">
            <label>Sur</label>
            <input type="text" name="sur_longitud" class="form-control inmueble" id="11" placeholder="Ingrese la longitud que tiene el sur del inmueble" data-validacion-tipo="requerido|min:8" />
        </div>
    </div>

    <script type="text/javascript">
        var resetButton = document.getElementById("resetear");
        var campo1 = document.getElementById("1");
        var campo2 = document.getElementById("2");
        var campo3 = document.getElementById("3");
        var campo4 = document.getElementById("4");
        var campo5 = document.getElementById("5");
        var campo6 = document.getElementById("6");
        var campo7 = document.getElementById("7");
        var campo8 = document.getElementById("8");
        var campo9 = document.getElementById("9");
        var campo10 = document.getElementById("10");
        var campo11 = document.getElementById("11");
        resetButton.addEventListener("click", ()=>{
            campo1.value = "";
            campo2.value = "";
            campo3.value = "";
            campo4.value = "";
            campo5.value = "";
            campo6.value = "";
            campo7.value = "";
            campo8.value = "";
            campo9.value = "";
            campo10.value = "";
            campo11.value = "";
        });
    </script>
    
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success"><?php echo $alm->id_contribuyente != null && $alm->correlativo != null ? 'Actualizar registro' : 'Agregar Registro'; ?></button>
    </div>
</form>



