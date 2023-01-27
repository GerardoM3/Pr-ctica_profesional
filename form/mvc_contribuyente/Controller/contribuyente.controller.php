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
        $alm->id_inmueble = $_REQUEST['id_inmueble'];
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

        /*$alm->id_contribuyente > 0 && $alm->correlativo > 0
           ? $this->model->Actualizar($alm)
           : $this->model->Registrar($alm);*/

        

       //EL CÓDIGO ANTERIOR ES EQUIVALENTE A UTILIZAR CONDICIONALES IF, TAL COMO SE MUESTRA EN EL COMENTARIO A CONTINUACIÓN:

        if (($alm->id_contribuyente != null) && ($alm->correlativo != null) && ($alm->id_inmueble == null)) {
            $this->model->Actualizar($alm);
            
        }/*else if(($alm->id_inmueble > 0)){
            $this->model->actualizarDimension($alm);
            $this->model->actualizarCaracteristica($alm);
            $this->model->actualizarInmueble($alm);
        }else if(($alm->id_contribuyente > 0) && ($alm->correlativo > 0) && ($alm->id_inmueble > 0)){
            $this->model->Actualizar($alm);
            $this->model->actualizarDimension($alm);
            $this->model->actualizarCaracteristica($alm);
            $this->model->actualizarInmueble($alm);
        }*/

        if(($alm->id_contribuyente == null) && ($alm->correlativo == null) && ($alm->id_inmueble == null) && ($alm->comunidad_inmueble == null) && ($alm->zona_comunidad_inmueble == null) && ($alm->direccion_inmueble == null) && ($alm->descripcion_inmueble == null) && ($alm->norte_longitud == null) && ($alm->este_longitud == null) && ($alm->oeste_longitud == null) && ($alm->sur_longitud == null)){

                $this->model->Registrar($alm);

        }else if(($alm->id_inmueble == null) && ($alm->id_contribuyente > 0) && ($alm->correlativo > 0) && ($alm->comunidad_inmueble != null) && ($alm->zona_comunidad_inmueble != null) && ($alm->direccion_inmueble != null) && ($alm->descripcion_inmueble != null) && ($alm->norte_longitud != null) && ($alm->este_longitud != null) && ($alm->oeste_longitud != null) && ($alm->sur_longitud != null)){

            foreach ($this->model->obtenerCorrelativo($_REQUEST['correlativo']) as $r3) {
                $alm->correlativo = $r3->correlativo;
            }

            $this->model->Registrar_caracteristica($alm); 
            $this->model->Registrar_dimension($alm);

            foreach ($this->model->obtener_IDCaracteristica() as $r1) {
                $alm->id_caracteristica = $r1->id_caracteristica;
            }

            foreach ($this->model->obtener_IDDimension() as $r2) {
                $alm->id_dimension = $r2->id_dimension;
            }
           $this->model->Registrar_inmueble($alm);

       }else if(($alm->id_contribuyente == null) && ($alm->correlativo == null) && ($alm->id_inmueble == null)){
            $this->model->Registrar($alm);

            $this->model->Registrar_caracteristica($alm); 
            $this->model->Registrar_dimension($alm);

            foreach ($this->model->obtener_IDCaracteristica() as $r1) {
                $alm->id_caracteristica = $r1->id_caracteristica;
            }

            foreach ($this->model->obtener_IDDimension() as $r2) {
                $alm->id_dimension = $r2->id_dimension;
            }

            foreach ($this->model->obtenerCorrelativo2() as $r3) {
                $alm->correlativo = $r3->correlativo;
            }
           $this->model->Registrar_inmueble($alm);
        }
        
        
        header('Location: index.php?c=Contribuyente');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_contribuyente'], $_REQUEST['correlativo']);
        header('Location: index.php?c=Contribuyente');
    }
    
}