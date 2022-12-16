<?php
require_once 'index.php';
require_once 'mvc_contribuyente/Model/conexion.php';
$controller = 'contribuyente';

//terminar de modificar

// Con esta sección hacemos el Controlador del Frontend
if(!isset($_REQUEST['c']))
{
    require_once "mvc_contribuyente/Controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // buscamos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "mvc_contribuyente/Controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Función para llamar las acciones a ejecutar
    call_user_func( array( $controller, $accion ) );
}
?>