<?php

/* Importando todos los recursos que hay en Modelo. */
require_once 'mvc_inmuebles/Model/inmueble.php';

class InmuebleController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Inmueble();
    }
    
    /*
    Función para mostrar las vistas de index del inmueble, su cabecera y su pie de página.
    */
    public function Index_inmueble(){
        require_once 'mvc_inmuebles/View/header.php';
        require_once 'mvc_inmuebles/View/inmueble.php';
        require_once 'mvc_inmuebles/View/footer.php';
    }
    
    /*
    Función para mostrar las vistas de index del inmueble (versión para modificar, formulario), su cabecera
    y su pie de página
    */
    public function Crud(){
        $alm = new Inmueble();
        
        if( isset($_REQUEST['id_inmueble'])){
            $alm = $this->model->getting($_REQUEST['id_inmueble']);

        }
        require_once 'mvc_inmuebles/View/header.php';
        require_once 'mvc_inmuebles/View/inmueble-editar.php';
        require_once 'mvc_inmuebles/View/footer.php';
    }

    /*
    Función que Registra o Modifica los datos.

    [~Eliminar las líneas cod_municipio y cod_departamento cuidando siempre la puntuación, en este caso, punto y coma.~]

    */
    
    public function Guardar(){
        $alm = new Inmueble();


        
        $alm->id_inmueble = $_REQUEST['id_inmueble'];
        $alm->correlativo = $_REQUEST['correlativo'];
        $alm->id_caracteristica = $_REQUEST['id_caracteristica'];
        $alm->id_dimension = $_REQUEST['id_dimension'];
        $alm->comunidad_inmueble = $_REQUEST['comunidad_inmueble'];
        $alm->zona_comunidad_inmueble = $_REQUEST['zona_comunidad_inmueble'];
        $alm->direccion_inmueble = $_REQUEST['direccion_inmueble'];
        $alm->descripcion_inmueble = $_REQUEST['descripcion_inmueble'];
        $alm->norte_longitud = $_REQUEST['norte_longitud'];
        $alm->este_longitud = $_REQUEST['este_longitud'];
        $alm->oeste_longitud = $_REQUEST['oeste_longitud'];
        $alm->sur_longitud = $_REQUEST['sur_longitud'];
        
        

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        /*$alm->id_inmueble > 0 
           ? $this->model->Actualizar($alm)
           : $this->model->Registrar($alm);*/

       //EL CÓDIGO ANTERIOR ES EQUIVALENTE A UTILIZAR CONDICIONALES IF, TAL COMO SE MUESTRA EN EL COMENTARIO A CONTINUACIÓN:

        if ($alm->id_inmueble > 0 ) {
            $this->model->actualizarDimension($alm);
            $this->model->actualizarCaracteristica($alm);
            $this->model->actualizarInmueble($alm);
        }
        else{
           $this->model->Registrar_caracteristica($alm); 
           $this->model->Registrar_dimension($alm);
           foreach ($this->model->obtener_IDCaracteristica() as $r1) {
                $alm->id_caracteristica = $r1->id_caracteristica;
            }
            foreach ($this->model->obtener_IDDimension() as $r2) {
                $alm->id_dimension = $r2->id_dimension;
            }
           $this->model->Registrar_inmueble($alm);
        }
        
        header('Location: index.php?c=Inmueble');
    }
    
    /*
    Función para eliminar el registro según el identificador del inmueble
    */
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_inmueble']);
        header('Location: index.php?c=Inmueble');
    }
}