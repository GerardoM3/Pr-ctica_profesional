<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Barra de navegación</title>
	<style type="text/css">
		/* Sección de contenedor principal */
		.container-main{
			width: 100%;
			background-color: transparent;
			float: left;
			display: inline-block;
			position: relative;
		}
		/* Sección de navegación principal */
		.container-nav{
			margin: 1rem;
			width: 75%;
			background-color: transparent;
			float: right;
			text-align: center;
		}

		/*  */
		.option-block{
			padding: 6px;
			display: inline-block;
			margin:  2px;
			border-radius:10px;
			background-color: lightblue;
			
		}
		.option-block:hover .suboption-block{
			display: block;

		}
		.suboption-block{
			display: none;
		}

		.suboption-block:hover .suboption-block2{
			display: block;
		}

		.suboption-block2{
			display: none;
		}

		.primary-form{
			display: inline-block;
			position: absolute;
		}

		.campo-user{
			border-right: none;
			border-left: none;
			border-top: none;
			border-bottom-color: red;
			background-color: lightblue;
			border-radius: 2px;
		}
		.campo-user:focus{
			outline: none;
			border-color: green;
			background-color: lightgreen;
		}
	</style>
</head>
<body>
    <background-color: lightblue;>
	<div class="container-main">
		<div class="container-nav">
			<a href="contribuyente.php?c=Contribuyente" class="option-block">
				CONTRIBUYENTE
			</a>
    
            <a href="inmuebles.php?c=Inmueble" class="option-block">
				INMUEBLES
			</a>
			<a href="servicios_alcaldia.php?c=Servicio" class="option-block">
				SERVIVIOS DE ALCALDIA
			</a>
			<a href="sector_estado.php?c=Sector" class="option-block">
				SECTORES / TIPOS / ESTADOS
			</a>
		</div>
		
	</div>	
	
</body>
</html>

<?php
	
	if(!isset($_REQUEST['c']) || $_REQUEST['c'] == "Contribuyente"){
		require_once 'mvc_contribuyente/Model/conexion_contribuyente.php';
		$controller = 'contribuyente';

		//terminar de modificar

		// Con esta sección hacemos el Controlador del Frontend
		if(!isset($_REQUEST['c']))
		{
		    require_once "mvc_contribuyente/Controller/$controller.controller.php";
		    $controller = ucwords($controller) . 'Controller';
		    $controller = new $controller;
		    $controller->Index_contribuyente();    
		}
		else
		{
		    // buscamos el controlador que queremos cargar
		    $controller = strtolower($_REQUEST['c']);
		    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index_contribuyente';
		    
		    // Instanciamos el controlador
		    require_once "mvc_contribuyente/Controller/$controller.controller.php";
		    $controller = ucwords($controller) . 'Controller';
		    $controller = new $controller;
		    
		    // Función para llamar las acciones a ejecutar
		    call_user_func( array( $controller, $accion ) );
		}
	}else if($_REQUEST['c'] == "Inmueble"){
		require_once 'mvc_inmuebles/Model/conexion_inmueble.php';
		$controller = 'inmueble';

		// Con esta sección hacemos el Controlador del Frontend
		if(!isset($_REQUEST['c']))
		{
		    require_once "mvc_inmuebles/Controller/$controller.controller.php";
		    $controller = ucwords($controller) . 'Controller';
		    $controller = new $controller;
		    $controller->Index_inmueble();    
		}
		else
		{
		    // buscamos el controlador que queremos cargar
		    $controller = strtolower($_REQUEST['c']);
		    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index_inmueble';
		    
		    // Instanciamos el controlador
		    require_once "mvc_inmuebles/Controller/$controller.controller.php";
		    $controller = ucwords($controller) . 'Controller';
		    $controller = new $controller;
		    
		    // Función para llamar las acciones a ejecutar
		    call_user_func( array( $controller, $accion ) );
		}
	}else if($_REQUEST['c'] == "Servicio"){
		require_once 'mvc_servicios_alcaldia/Model/conexion_servicios.php';
		$controller = 'servicio';

		if (!isset($_REQUEST['c'])) {
			require_once "mvc_servicios_alcaldia/Controller/$controller.controller.php";
			$controller = ucwords($controller) . 'Controller';
			$controller = new $controller;
			$controller->Index_Servicios();
		} else {
			$controller = strtolower($_REQUEST['c']);
			$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index_Servicios';

			require_once "mvc_servicios_alcaldia/Controller/$controller.controller.php";
			$controller = ucwords($controller) . 'Controller';
			$controller = new $controller;

			call_user_func(array($controller, $accion));
		}
	}else if ($_REQUEST['c'] == "Sector") {
		require_once 'mvc_sectores_estados/Model/conexion_sector.php';
		$controller = 'sector';

		if(!isset($_REQUEST['c'])){
			require_once "mvc_sectores_estados/Controller/$controller.controller.php";
			$controller = ucwords($controller) . 'Controller';
			$controller = new $controller;
			$controller->Index_Sectores();
		}else{
			$controller = strtolower($_REQUEST['c']);
			$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index_Sectores';

			require_once "mvc_sectores_estados/Controller/$controller.controller.php";
			$controller = ucwords($controller) . 'Controller';
			$controller = new $controller;

			call_user_func(array($controller, $accion));
		}
	}
?>
