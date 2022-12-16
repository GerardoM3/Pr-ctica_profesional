
<?php
require_once 'index.php';
require_once 'mvc_servicios_alcaldia/Model/conexion.php';
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

?>