<?php
class Contribuyente
//modificar..
{
	private $pdo;
    
    public $correlativo;
    public $id_contribuyente;
    public $n_contribuyente;
    public $nombre_contribuyente;
    public $apellido_contribuyente;
    public $cod_departamento;
    public $cod_municipio;
    public $municipio;
    public $departamento;
    public $comunidad_contribuyente;
    public $direccion_contribuyente;
    public $dui_contribuyente;
    public $telefono_contribuyente;
    public $estado_contribuyente;
    public $id_inmueble;
	public $comunidad_inmueble;
	public $zona_comunidad_inmueble;
	public $direccion_inmueble;
	public $id_caracteristica;
	public $descripcion_inmueble;
	public $id_dimension;
	public $norte_longitud;
	public $este_longitud;
	public $oeste_longitud;
	public $sur_longitud;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Conexion_contribuyente::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	/*public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT CONCAT(contribuyente.id_contribuyente, '-', contribuyente.correlativo) AS n_contribuyente, CONCAT(contribuyente.nombre_contribuyente, ' ', contribuyente.apellido_contribuyente) AS nombre_contribuyente, CONCAT(contribuyente.comunidad_contribuyente, ' ', contribuyente.direccion_contribuyente) AS direccion_contribuyente, meta_municipio.municipio, meta_departamento.departamento, contribuyente.dui_contribuyente, contribuyente.telefono_contribuyente FROM contribuyente INNER JOIN meta_municipio ON meta_municipio.cod_municipio = contribuyente.cod_municipio INNER JOIN meta_departamento ON meta_departamento.cod_departamento = contribuyente.cod_departamento WHERE contribuyente.estado_contribuyente = 1;");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}*/

	public function Listar2()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM contribuyente NATURAL JOIN meta_departamento NATURAL JOIN meta_municipio WHERE estado_contribuyente = 1;");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar_Muni($cod_departamento)
	{
		try {
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM meta_municipio WHERE cod_departamento = ?;");
			$stm->execute(array($cod_departamento));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar_Muni2($id_contribuyente, $correlativo)
	{
		try {
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM contribuyente NATURAL JOIN meta_municipio WHERE id_contribuyente = ? AND correlativo = ?;");
			$stm->execute(array($id_contribuyente, $correlativo));

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

	public function Listar_Departamento($id_contribuyente, $correlativo)
	{
		try {
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM contribuyente NATURAL JOIN meta_departamento WHERE id_contribuyente = ? AND correlativo = ?;");
			$stm->execute(array($id_contribuyente, $correlativo));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getting($id_contribuyente, $correlativo)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM contribuyente WHERE id_contribuyente = ? AND correlativo = ?");
			          

			$stm->execute(array($id_contribuyente, $correlativo));

			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_contribuyente, $correlativo)
	{
		try 
		{
			/*$stm = $this->pdo->prepare("DELETE FROM contribuyente WHERE idpersona = ?");*/
			$stm = $this->pdo->prepare("CALL eliminar_contribuyente(?, ?);");

			$stm->execute(array($id_contribuyente, $correlativo));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE contribuyente SET 
						nombre_contribuyente = ?, 
						apellido_contribuyente = ?,
						cod_municipio = ?,
						cod_departamento = ?,
                        direccion_contribuyente        = ?,
						dui_contribuyente            = ?,
						telefono_contribuyente = ?,
						comunidad_contribuyente = ?
				    WHERE id_contribuyente = ? AND correlativo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre_contribuyente, 
                        $data->apellido_contribuyente,
                        $data->cod_municipio,
                        $data->cod_departamento,
                        $data->direccion_contribuyente,
                        $data->dui_contribuyente,
                        $data->telefono_contribuyente,
                        $data->comunidad_contribuyente,
                        $data->id_contribuyente,
                        $data->correlativo
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
		$sql = "INSERT INTO `contribuyente` (nombre_contribuyente,apellido_contribuyente, cod_municipio, cod_departamento,direccion_contribuyente,dui_contribuyente,telefono_contribuyente, comunidad_contribuyente) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre_contribuyente, 
                    $data->apellido_contribuyente,
                    $data->cod_municipio,
                    $data->cod_departamento,
                    $data->direccion_contribuyente,
                    $data->dui_contribuyente,
                    $data->telefono_contribuyente,
                    $data->comunidad_contribuyente                    
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function actualizarDimension($data){
        try {
            $sql = "UPDATE meta_dimension_inmueble SET norte_longitud = ?, este_longitud = ?, oeste_longitud = ?, sur_longitud = ? WHERE id_dimension = ?;";
            $this->pdo->prepare($sql)->execute(array($data->norte_longitud, $data->este_longitud, $data->oeste_longitud, $data->sur_longitud, $data->id_dimension));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarCaracteristica($data){
        try {
            $sql2 = "UPDATE meta_caracteristica_inmueble SET descripcion_inmueble = ? WHERE id_caracteristica = ?;";
            $this->pdo->prepare($sql2)->execute(array($data->descripcion_inmueble, $data->id_caracteristica));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarInmueble($data)
    {
        try 
        {
            $sql3 = "UPDATE inmueble SET comunidad_inmueble = ?, zona_comunidad_inmueble = ?, direccion_inmueble = ? WHERE id_inmueble = ?";
            $this->pdo->prepare($sql3)->execute(array($data->comunidad_inmueble, $data->zona_comunidad_inmueble, $data->direccion_inmueble, $data->id_inmueble));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    /*Sección de registro de inmueble*/

    public function Registrar_caracteristica($data)
    {
        try {
            /*  CREAR UNA FUNCIÓN PARA INSERTAR UNA CARACTERÍSTICA DEL INMUEBLE*/
            $this->pdo->beginTransaction();

            /*
            Instrucción SQL, llamando un procedimiento almacenado para insertar característica del inmueble
            */
            $sql = "CALL insertar_caracteristica(?);";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->descripcion_inmueble
                )
            );
            $res1 = $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollback();
            die($e->getMessage());
        }
    }

    public function Registrar_dimension($data)
    {
        try {
            /*  CREAR UNA FUNCIÓN PARA INSERTAR LAS DIMENSIONES DEL INMUEBLE  */
            $this->pdo->beginTransaction();

            /*
            Instrucción SQL, llamando un procedimiento almacenado para insertar dimensión del inmueble
            */
            $sql = "CALL insertar_dimension(?, ?, ?, ?);";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->norte_longitud,
                    $data->este_longitud,
                    $data->oeste_longitud,
                    $data->sur_longitud
                )
            );
            $res1 = $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollback();
            die($e->getMessage());
        }
    }

    public function obtener_IDCaracteristica()
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT id_caracteristica FROM meta_caracteristica_inmueble ORDER BY id_caracteristica DESC LIMIT 1;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener_IDDimension()
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT id_dimension FROM meta_dimension_inmueble ORDER BY id_dimension DESC LIMIT 1;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar_inmueble($data)
    {
        try 
        {

            /*  CREAR UNA FUNCIÓN PARA INSERTAR UN INMUEBLE, MANDANDO A LLAMAR LOS ID'S DE LA DIMENSION Y CARACTERÍSTICA DEL MISMO  */
            $this->pdo->beginTransaction();

            $sql = "INSERT INTO `inmueble` (comunidad_inmueble, zona_comunidad_inmueble, direccion_inmueble, correlativo,id_caracteristica, id_dimension) VALUES ( ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)->execute(
                    array(
                       
                        $data->comunidad_inmueble,
                        $data->zona_comunidad_inmueble,
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

    public function obtenerCorrelativo($correlativo){
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT correlativo FROM contribuyente WHERE correlativo = ?;");
            $stm->execute(array($correlativo));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerCorrelativo2(){
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT correlativo FROM contribuyente ORDER BY correlativo DESC Limit 1;");
            $stm->execute(array());

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /*public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM inmueble 
			INNER JOIN meta_caracteristica_inmueble ON inmueble.id_caracteristica = meta_caracteristica_inmueble.id_caracteristica 
			INNER JOIN meta_dimension_inmueble ON inmueble.id_dimension = meta_dimension_inmueble.id_dimension 
			INNER JOIN contribuyente ON inmueble.correlativo = contribuyente.correlativo WHERE estado_inmueble = 1;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }*/
}
?>