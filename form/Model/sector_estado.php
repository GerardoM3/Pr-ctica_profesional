<?php 

/**
 * Clase Sector_Estado - Modelo.
 * Contiene funciones para listar, registrar, modificar y eliminar datos de la tabla 'meta_sector estado'.
 */
class Sector_Estado
{

	private $pdo;

	public $cod_sector;
	public $sector_estado;
	public $estado_sector;
	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Conexion::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Listar_caracteristica.
	 * Es una función que trae todos los datos que estén activos de la tabla 'meta_sector_estado'.
	 * @return array Retorna un arreglo de datos.
	 */
	public function Listar_caracteristica(){
		try {
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM meta_sector_estado WHERE estado_sector = 1;");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * getting (sector_estado).
	 * Es una función que recoge todos los datos de un registro segúm el código de la tabla 'meta_sector_estado'.
	 * @param mixed $cod_sector Varaible como parámetro de la función que captura el valor del campo cod_sector.
	 * @return mixed Retorna una fila de datos.
	 */
	public function getting($cod_sector){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM meta_sector_estado WHERE cod_sector = ?;");
			$stm->execute(array($cod_sector));

			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Eliminar (sector_estado).
	 * Es una función que llama a un procedimiento almacenado para "eliminar" un registro según el código de la tabla 'meta_sector_estado' (eliminar entre comillas, pues el procedimiento almacenado lo que hace es cambiar el estado del registro a 0, es decir, desactivado. El datos no se muestra en el sistema, pero aún está registrado en la base de datos).
	 * @param mixed $cod_sector
	 * @return void
	 */
	public function Eliminar($cod_sector){
		try {
			$stm = $this->pdo->prepare("CALL eliminar_sector(?);");
			$stm->execute(array($cod_sector));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Actualizar (sector_estado).
	 * Es una función que actualiza todos los datos de un registro en la tabla 'meta_sector_estado' según los datos almacenados en el objeto, siempre y cuando ese registro esté activo ('estado_sector = 1').
	 * @param mixed $data Variable como parámetro de la función que captura los valores del objeto.
	 * 
	 * Se espera que el objeto contengan los siguientes atributos:
	 * - cod_sector.
	 * - sector_estado.
	 * @return void No retorna nada, sólo ejecuta.
	 */
	public function Actualizar($data){
		try {
			$sql = "UPDATE meta_sector_estado SET 
			cod_sector = ?,
			sector_estado = ? 
			WHERE cod_sector = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->cod_sector,
					$data->sector_estado,
					$data->cod_sector
			));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Registrar (sector_estado).
	 * Es una función que crea un registro de todos los datos en la tabla 'meta_sector_estado' según los datos almacenados en el objeto.
	 * @param mixed $data Variable como parámetro de la función que captura los valores del objeto.
	 * 
	 * Se espera que el objeto contengan los siguientes atributos:
	 * - cod_sector.
	 * - sector_estado.
	 * @return void No retorna nada, sólo ejecuta.
	 */
	public function Registrar($data){
		try {
			$sql = "INSERT INTO `meta_sector_estado`(cod_sector, sector_estado) VALUES (?, ?);";

			$this->pdo->prepare($sql)->execute(array(
					$data->cod_sector,
					$data->sector_estado
				));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>