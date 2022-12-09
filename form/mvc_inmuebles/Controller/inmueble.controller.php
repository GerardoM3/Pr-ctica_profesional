<?php
require_once 'Model/inmueble.php';

class InmuebleController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Inmueble();
    }
    
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/inmueble.php';
        require_once 'View/footer.php';
    }
    
    public function Crud(){
        $alm = new Inmueble();
        
        if(isset($_REQUEST['idpersona'])){
            $alm = $this->model->getting($_REQUEST['idpersona']);
        }
        
        require_once 'View/header.php';
        require_once 'View/inmueble-editar.php';
        require_once 'View/footer.php';
    }
    
    public function Guardar(){
        $alm = new Inmueble();
        
        $alm->idpersona = $_REQUEST['idpersona'];
        $alm->norte_logitud = $_REQUEST['Norte_log'];
        $alm->este_logitud = $_REQUEST['Este_log'];
        $alm->oeste_logitud = $_REQUEST['Oeste_log'];
        $alm->sur_logitud = $_REQUEST['Sur_log'];

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->idpersona > 0 
           ? $this->model->Actualizar($alm)
           : $this->model->Registrar($alm);

       //EL CÓDIGO ANTERIOR ES EQUIVALENTE A UTILIZAR CONDICIONALES IF, TAL COMO SE MUESTRA EN EL COMENTARIO A CONTINUACIÓN:

        /*if ($alm->idpersona > 0 ) {
            $this->model->Actualizar($alm);
        }
        else{
           $this->model->Registrar($alm); 
        }*/
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idpersona']);
        header('Location: index.php');
    }
}