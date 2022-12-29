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

	public function Listar()
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
	}

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
}
?>