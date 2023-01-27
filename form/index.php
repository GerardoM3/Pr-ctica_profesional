<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alcaldía Municipal San Rafael Obrajuelo</title>
	<style type="text/css">

		body{
			background-color: lightblue;
			color: black;
		}
		table{
			color: white;
		}

		/* Sección de contenedor principal */
		.container-main{
			width: 100%;
			height: 110px;
			background-color: #BEBEBE;
			display: inline-grid;
			position: relative;
			text-align: center;
			align-items: center;
		}
		/* Sección de navegación principal */
		.container-nav{
			position: relative;
			margin: 0;
			background-color: transparent;
		}

		/*  */
		.option-block{
			color: black;
			padding: 6px;
			display: inline-block;
			margin:  2px;
			border-radius:8px;
			background-color: #4D8EE7;
			transition-property: background-color, color;
			transition-duration: .4s;
		}
		.option-block:hover{
			color: white;
			text-decoration: none;
			background-color: blue;

		}

		/*
        Apertura de la sección CSS del modal
        */
        .modal{
        	display: none;
        	position: fixed;
        	z-index: 1;
        	padding-top: 100px;
        	left: 0;
        	top: 0;
        	width: 100%;
        	height: 100%;
        	overflow: auto;
        	background-color: rgba(0, 0, 0, 0.6);
        }
        .modal-eliminar{
            margin:0;
            padding:0;
            position:absolute;
            top:5%;
            right: 5%;
            width: 35%;
            height: 35%;
            background: #DAD7D7;
            border-radius: 25px;
            box-shadow: 10px 10px 30px 1px black;
        }

        .cabecera-modal, .footer-modal{
            position:absolute;
            width:100%;
        }
        .cabecera-modal{
            color: #FFFFFF;
            margin-top:0;
            padding-top:0;
            top: 0;
            left: 0;
            height:24%;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            background: #FF5454;
        }

        .cuerpo-modal{
            position:absolute;
            top:15%;
            padding:1em;
            display:block;
            align-content: center;
            color:red;
        }
        .footer-modal{
            display: flex;
            align-items: center;
            justify-content: right;
            bottom: 0;
            height: 20%;
            background: #FF5454;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }
        .boton-eliminar{
            width: 200px;
            height:60px;
        }
        .btn-modal{
        	color: black;
            padding: 13px;
            border-radius:27px;
            border: 1px black solid;
            font-size: 20px;
            transition-property: box-shadow;
            transition-duration: 1s;
        }
        a.btn-modal{
        	text-decoration: none;
        	background: lightgrey;
        }
        a.btn-modal:hover,
        a.btn-modal:focus,
        a.btn-modal:link,
        a.btn-modal:visited,
        a.btn-modal:active{
        	background-color: lightgrey;
        	color: black;
        	text-decoration: none;
        }
        .btn-modal:hover{
            cursor: pointer;
            box-shadow: -1px -1px 5px black;
        }
        /*
        Cierre de la sección CSS del modal
        */


		
	</style>
</head>
<body>
	<div class="container-main">
		<div class="container-nav">
			<a href="index.php?c=Contribuyente" class="option-block">
				CONTRIBUYENTE
			</a>
    
            <a href="index.php?c=Inmueble" class="option-block">
				INMUEBLES
			</a>
			<a href="index.php?c=Servicio" class="option-block">
				SERVICIOS DE ALCALDIA
			</a>
			<a href="index.php?c=Sector" class="option-block">
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
