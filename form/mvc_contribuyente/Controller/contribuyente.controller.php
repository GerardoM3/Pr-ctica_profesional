<?php
require_once 'mvc_contribuyente/Model/contribuyente.php';
//modificar 
class ContribuyenteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Contribuyente();
    }
    
    public function Index_contribuyente(){
        require_once 'mvc_contribuyente/View/header.php';
        require_once 'mvc_contribuyente/View/contribuyente.php';
        require_once 'mvc_contribuyente/View/footer.php';
    }
    
    public function Crud(){
        $alm = new Contribuyente();
        
        if(isset($_REQUEST['id_contribuyente'], $_REQUEST['correlativo'])){
            $alm = $this->model->getting($_REQUEST['id_contribuyente'], $_REQUEST['correlativo']);
        }
        
        require_once 'mvc_contribuyente/View/header.php';
        require_once 'mvc_contribuyente/View/contribuyente-editar.php';
        require_once 'mvc_contribuyente/View/footer.php';
    }
    
    public function Guardar(){
        $alm = new Contribuyente();
        
        $alm->id_contribuyente = $_REQUEST['id_contribuyente'];
        $alm->correlativo = $_REQUEST['correlativo'];
        $alm->nombre_contribuyente = $_REQUEST['nombre_contribuyente'];
        $alm->apellido_contribuyente = $_REQUEST['apellido_contribuyente'];
        $alm->direccion_contribuyente = $_REQUEST['direccion_contribuyente'];
        $alm->dui_contribuyente = $_REQUEST['dui_contribuyente'];
        $alm->telefono_contribuyente = $_REQUEST['telefono_contribuyente'];
        $alm->comunidad_contribuyente = $_REQUEST['comunidad_contribuyente'];
        $alm->cod_municipio = $_REQUEST['cod_municipio'];
        $alm->cod_departamento = $_REQUEST['cod_departamento'];

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->id_contribuyente > 0 && $alm->correlativo > 0
           ? $this->model->Actualizar($alm)
           : $this->model->Registrar($alm);

       //EL CÓDIGO ANTERIOR ES EQUIVALENTE A UTILIZAR CONDICIONALES IF, TAL COMO SE MUESTRA EN EL COMENTARIO A CONTINUACIÓN:

        /*if ($alm->idpersona > 0 ) {
            $this->model->Actualizar($alm);
        }
        else{
           $this->model->Registrar($alm); 
        }*/
        
        header('Location: contribuyente.php?c=Contribuyente');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_contribuyente'], $_REQUEST['correlativo']);
        header('Location: contribuyente.php?c=Contribuyente');
    }
}