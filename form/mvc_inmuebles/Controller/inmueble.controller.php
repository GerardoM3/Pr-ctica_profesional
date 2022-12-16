<?php
require_once 'mvc_inmuebles/Model/inmueble.php';

class InmuebleController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Inmueble();
    }
    
    public function Index(){
        require_once 'mvc_inmuebles/View/header.php';
        require_once 'mvc_inmuebles/View/inmueble.php';
        require_once 'mvc_inmuebles/View/footer.php';
    }
    
    public function Crud(){
        $alm = new Inmueble();
        
        if(isset($_REQUEST['id_inmueble'])){
            $alm = $this->model->getting($_REQUEST['id_inmueble']);
        }
        
        require_once 'mvc_inmuebles/View/header.php';
        require_once 'mvc_inmuebles/View/inmueble-editar.php';
        require_once 'mvc_inmuebles/View/footer.php';
    }
    
    public function Guardar(){
        $alm = new Inmueble();
        
        $alm->id_inmueble = $_REQUEST['id_inmueble'];
        $alm->correlativo = $_REQUEST['correlativo'];
        $alm->comunidad_inmueble = $_REQUEST['comunidad_inmueble'];
        $alm->cod_municipio = $_REQUEST['cod_municipio'];
        $alm->cod_departamento = $_REQUEST['cod_departamento'];
        $alm->direccion_inmueble = $_REQUEST['direccion_inmueble'];
        $alm->descripcion_inmueble = $_REQUEST['descripcion_inmueble'];
        $alm->norte_longitud = $_REQUEST['norte_longitud'];
        $alm->este_longitud = $_REQUEST['este_longitud'];
        $alm->oeste_longitud = $_REQUEST['oeste_longitud'];
        $alm->sur_longitud = $_REQUEST['sur_longitud'];

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->id_inmueble > 0 
           ? $this->model->Actualizar($alm)
           : $this->model->Registrar($alm);

       //EL CÓDIGO ANTERIOR ES EQUIVALENTE A UTILIZAR CONDICIONALES IF, TAL COMO SE MUESTRA EN EL COMENTARIO A CONTINUACIÓN:

        /*if ($alm->idpersona > 0 ) {
            $this->model->Actualizar($alm);
        }
        else{
           $this->model->Registrar($alm); 
        }*/
        
        header('Location: inmuebles.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_inmueble']);
        header('Location: inmuebles.php');
    }
}