<?php
require_once 'Model/conexion.php';
$controller = 'servicio';

if (!isset($_REQUEST['c'])) {
	require_once "Controller/$controller.controller.php";
	$controller = ucwords($controller) . 'Controller';
	$controller = new $controller;
	$controller->Index_Servicios();
} else {
	$controller = strtolower($_REQUEST['c']);
	$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index_Servicios';

	require_once "Controller/$controller.controller.php";
	$controller = ucwords($controller) . 'Controller';
	$controller = new $controller;

	call_user_func(array($controller, $accion));
}

?>