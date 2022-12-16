<?php
class Inmueble
{
    private $pdo;
    
    public $id_inmueble;
    public $cod_departamento;
    public $departamento;
    public $cod_municipio;
    public $municipio;
    public $comunidad_inmueble;
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

    public function Listar_Muni()
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM meta_municipio;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Muni2($id_inmueble)
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM inmueble NATURAL JOIN meta_municipio WHERE id_inmueble = ?;");
            $stm->execute(array($id_inmueble));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Departamentos()
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM meta_departamento;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Departamento($id_inmueble)
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM inmueble NATURAL JOIN meta_departamento WHERE id_inmueble = ?;");
            $stm->execute(array($id_inmueble));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
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
                        norte_longitud     = ?,
                        este_longitud        = ?,
                        oeste_longitud            = ?, 
                        sur_longitud = ?
                    WHERE id_inmueble = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->norte_longitud, 
                        $data->este_longitud,
                        $data->oeste_longitud,
                        $data->sur_longitud,
                        $data->id_inmueble,
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
            $this->pdo->beginTransaction();

            $sql = "CALL insertar_caracteristica(?);";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->descripcion_inmueble
                )
            );

            $sql = "CALL insertar_dimension(?, ?, ?, ?);";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->norte_longitud,
                    $data->este_longitud,
                    $data->oeste_longitud,
                    $data->sur_longitud
                )
            );

            $this->id_caracteristica = $this->pdo->prepare("SELECT id_caracteristica FROM meta_caracteristica_inmueble ORDER BY id_caracteristica DESC LIMIT 1;")->execute();

            $this->id_dimension = $this->pdo->prepare("SELECT id_dimension FROM meta_dimension_inmueble ORDER BY id_dimension DESC LIMIT 1;")->execute();

            $sql = "INSERT INTO `inmueble` (cod_departamento, cod_municipio, comunidad_inmueble, direccion_inmueble, correlativo,id_caracteristica, id_dimension) VALUES (?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)->execute(
                    array(
                        $data->cod_departamento, 
                        $data->cod_municipio,
                        $data->comunidad_inmueble,
                        $data->direccion_inmueble,
                        $data->correlativo,
                        $data->id_caracteristica,
                        $data->id_dimension
                    )
                );

            $res1 = $this->pdo->commit();
        } catch (Exception $e) 
        {
            $this->pdo->rollback();
            die($e->getMessage());
        }
    }
}
?>