<?php
require_once 'mvc_contribuyente/Model/contribuyente.php';
require_once 'mvc_servicios_alcaldia/Model/servicio_alcaldia.php';
require_once 'mvc_inmuebles/Model/inmueble.php';

class ContribuyenteController{
    
    private $model;
    private $modelServicio;
    
    public function __CONSTRUCT(){
        $this->model = new Contribuyente();
        $this->modelServicio = new Servicio_Alcaldia();
        $this->modelInmueble = new Inmueble();
    }

    public function View(){
        $alm = new Contribuyente();

        if(isset($_REQUEST['id_contribuyente'], $_REQUEST['correlativo'])){
            $alm = $this->model->getting($_REQUEST['id_contribuyente'], $_REQUEST['correlativo']);
        }
        require_once 'mvc_contribuyente/View/header.php';
        require_once 'mvc_contribuyente/View/view-contri.php';
        require_once 'mvc_contribuyente/View/footer.php';
    }

    public function newContribuyente(){
        require_once 'mvc_contribuyente/View/header.php';
        require_once 'mvc_contribuyente/View/newContribuyente.php';
        require_once 'mvc_contribuyente/View/footer.php';
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

    /**/

    public function guardaRegistro(){
        //Instaciamos los objetos a utilizar para guardar registro del contribuyente 
        $contri = new Contribuyente();
        $inmueble = new Inmueble();
        $servi = new Servicio_Alcaldia();

        //Datos del contribuyente a guardar en primer lugar
        $contri->nombre_contribuyente = $_REQUEST['nombre_contribuyente'];
        $contri->apellido_contribuyente = $_REQUEST['apellido_contribuyente'];
        $contri->direccion_contribuyente = $_REQUEST['direccion_contribuyente'];
        $contri->dui_contribuyente = $_REQUEST['dui_contribuyente'];
        $contri->telefono_contribuyente = $_REQUEST['telefono_contribuyente'];
        //Aplicamos el registro del contribuyente, para poder usar el correlativo al agregar el inmueble

        $this->model->Registrar($contri);

        //Datos del inmueble a guardar en segundo lugar
        foreach ($this->model->obtenerCorrelativo2() as $r) {
            $inmueble->correlativo = $r->correlativo;
        }
        $inmueble->cod_zona = $_REQUEST['cod_zona'];
        $inmueble->cod_sector = $_REQUEST['cod_sector'];
        $inmueble->direccion_inmueble = $_REQUEST['direccion_inmueble'];
        $inmueble->norte_longitud = $_REQUEST['norte_longitud'];
        $inmueble->este_longitud = $_REQUEST['este_longitud'];
        $inmueble->oeste_longitud = $_REQUEST['oeste_longitud'];
        $inmueble->sur_longitud = $_REQUEST['sur_longitud'];
        //Aplicamos el registro del inmueble

        $this->modelInmueble->Registrar_dimension($inmueble);
        foreach ($this->modelInmueble->obtener_IDDimension() as $rD) {
            $inmueble->id_dimension = $rD->id_dimension;
        }

        $this->modelInmueble->Registrar_inmueble($inmueble);

        /*Con los datos de las tablas contribuyente e inmueble, se procede a obtener el último ID del contribuyente (correlativo) y 
        el último ID del inmueble para que sea almacenado en la tabla servicio_contribuyente*/


        header('Location: index.php?c=Contribuyente');
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
        $alm->id_inmueble = $_REQUEST['id_inmueble'];
        $alm->cod_zona = $_REQUEST['cod_zona'];
        $alm->cod_sector = $_REQUEST['cod_sector'];
        $alm->id_dimension = $_REQUEST['id_dimension'];
        $alm->direccion_inmueble = $_REQUEST['direccion_inmueble'];
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

        if(($alm->id_contribuyente == null) && ($alm->correlativo == null) && ($alm->id_inmueble == null)  && ($alm->cod_sector == null) && ($alm->cod_zona == null) && ($alm->direccion_inmueble == null) && ($alm->sector_estado == null) && ($alm->norte_longitud == null) && ($alm->este_longitud == null) && ($alm->oeste_longitud == null) && ($alm->sur_longitud == null)){

                $this->model->Registrar($alm);

        }else if(($alm->id_inmueble == null) && ($alm->id_contribuyente > 0) && ($alm->correlativo > 0)  && ($alm->cod_sector != null) && ($alm->cod_zona != null) && ($alm->direccion_inmueble != null) && ($alm->sector_estado != null) && ($alm->norte_longitud != null) && ($alm->este_longitud != null) && ($alm->oeste_longitud != null) && ($alm->sur_longitud != null)){

            foreach ($this->model->obtenerCorrelativo($_REQUEST['correlativo']) as $r3) {
                $alm->correlativo = $r3->correlativo;
            } 
            $this->model->Registrar_dimension($alm);

            
            foreach ($this->model->obtener_IDDimension() as $r2) {
                $alm->id_dimension = $r2->id_dimension;
            }
           $this->model->Registrar_inmueble($alm);

       }else if(($alm->id_contribuyente == null) && ($alm->correlativo == null) && ($alm->id_inmueble == null)){
            $this->model->Registrar($alm);

            $this->model->Registrar_dimension($alm);
            

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