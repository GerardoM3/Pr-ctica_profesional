<?php
require_once 'Model/contribuyente.php';
//modificar 
class ContribuyenteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Contribuyente();
    }
    
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/contribuyente.php';
        require_once 'View/footer.php';
    }
    
    public function Crud(){
        $alm = new Contribuyente();
        
        if(isset($_REQUEST['idpersona'])){
            $alm = $this->model->getting($_REQUEST['idpersona']);
        }
        
        require_once 'View/header.php';
        require_once 'View/contribuyente-editar.php';
        require_once 'View/footer.php';
    }
    
    public function Guardar(){
        $alm = new Contribuyente();
        
        $alm->idpersona = $_REQUEST['idpersona'];
        $alm->nombre_contribuyente = $_REQUEST['nombre_contribuyente'];
        $alm->apellido_contribuyente = $_REQUEST['apellido_contribuyente'];
        $alm->direccion_contribuyente = $_REQUEST['direccion_contribuyente'];
        $alm->dui_contribuyente = $_REQUEST['dui_contribuyente'];
        $alm->telefono_contribuyente = $_REQUEST['telefono_contribuyente'];
        $alm->nit_contribuyente = $_REQUEST['nit_contribuyente'];

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