<?php 
require_once 'index.php';
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
?>