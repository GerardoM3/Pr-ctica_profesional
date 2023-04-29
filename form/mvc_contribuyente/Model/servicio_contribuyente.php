<?php
class Contribuyente
{
    private $var;
    public function __CONSTRUCT(){
        $this->var = Conexion::StartUp();
    }

    public function mostrarVariable(){
        try {
            //code...
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
}

class Servicios_Contribuyente extends Contribuyente
{
    public function __CONSTRUCT(){
        
    }
    public function mostrarVariable2(){
        $varable = new Contribuyente();
        $varable->mostrarVariable();
    }
}
$variable = new Servicios_Contribuyente();
$variable->mostrarVariable2();

?>