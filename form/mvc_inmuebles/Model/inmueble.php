<?php
class Inmueble
{
    private $pdo;
    
    public $id_inmueble;
    public $cod_departamento;
    public $departamento;
    public $cod_municipio;
    public $municipio;
    public $colonia_inmueble;
    public $direccion_inmueble;
    public $caracteristica_inmueble;
    public $id_caracteristica;
    public $descripcion_inmueble;
    public $dimension_inmueble;
    public $id_dimension;
    public $norte_longitud;
    public $este_longitud;
    public $oeste_longitud;
    public $sur_longitud;
    public $correlativo;
    public $id_contribuyente;
    public $nombre_contribuyente;
    public $apellido_contribuyente;
    public $direccion_contribuyente;
    public $dui_contribuyente;
    public $nit_contribuyente;
    public $telefono_contribuyente;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Conexion::StartUp();     
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM inmueble NATURAL JOIN meta_municipio NATURAL JOIN meta_departamento NATURAL JOIN meta_caracteristica_inmueble NATURAL JOIN meta_dimension_inmueble NATURAL JOIN contribuyente WHERE estado_inmueble = 1;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function getting($id_inmueble)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM inmueble NATURAL JOIN meta_municipio NATURAL JOIN meta_departamento NATURAL JOIN meta_caracteristica_inmueble NATURAL JOIN meta_dimension_inmueble NATURAL JOIN contribuyente WHERE estado_inmueble = 1 AND WHERE id_inmueble = ?;");
                      

            $stm->execute(array($id_inmueble));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id_inmueble)
    {
        try 
        {
            $stm = $this->pdo
                        ->prepare("CALL eliminar_inmueble(?);");                     

            $stm->execute(array($id_inmueble));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try 
        {
            $sql = "UPDATE inmueble SET 
                        nombres          = ?, 
                        cedula        = ?,
                        fecha_nmto        = ?,
                        direccion            = ?, 
                        email = ?
                    WHERE id_inmueble = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->nombres, 
                        $data->cedula,
                        $data->fecha_nmto,
                        $data->direccion,
                        $data->email,
                        $data->idpersona
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar($data)
    {
        try 
        {
        $sql = "INSERT INTO `persona` (nombres,cedula,fecha_nmto,direccion,email) 
                VALUES (?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->nombres, 
                    $data->cedula,
                    $data->fecha_nmto,
                    $data->direccion,
                    $data->email                    
                )
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>