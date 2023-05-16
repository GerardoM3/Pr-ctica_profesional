<?php

/**
 * Clase Servicio_Alcaldia - Modelo.
 * Contiene funciones para listar, registrar, modificar y eliminar datos de la tabla 'meta_servicios_alcaldia'.
 */
class Servicio_Alcaldia
{
	
	private $pdo;

	public $id_servicio_alcaldia;
	public $cod1;
	public $cod2;
	public $cod3;
	public $cod4;
	public $descripcion_servicio;
	public $descripcion_servicio_abreviado;
	public $unidad_medida;
	public $tarifa_actual;
	public $tarifa_anterior;
	public $periodo_vigencia_tarifa;
	public $tipo_concepto;
	public $tipo_cobro;

	
	function __CONSTRUCT()
	{
		try {
			$this->pdo = Conexion::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Listar_servicios.
	 * Es una función que trae todos los datos que estén activos de la tabla meta_servicios_alcaldia.
	 * @return array Retorna un arreglo de datos.
	 */
	public function Listar_servicios(){
		try {
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM meta_servicios_alcaldia WHERE estado_servicios = 1;");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * obtenerServicio.
	 * Es una función para obtener los datos de un registro según el índice de la tabla 'meta_servicios_alcaldia'.
	 * @param mixed $position Variable como parámetro de la función que captura el valor del índice.
	 * @return array Retorna un arreglo de datos.
	 */
	public function obtenerServicio($position){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM `meta_servicios_alcaldia` LIMIT $position, 1;");
			$stm->execute(array());

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * getting (servicio_alcaldia).
	 * Es una función que recoge todos los datos de un registro según los 4 códigos de la tabla 'meta_servicios_alcaldia'.
	 * @param mixed $cod1 Variable como parámetro de la función que captura el valor del campo cod1.
	 * @param mixed $cod2 Variable como parámetro de la función que captura el valor del campo cod2.
	 * @param mixed $cod3 Variable como parámetro de la función que captura el valor del campo cod3.
	 * @param mixed $cod4 Variable como parámetro de la función que captura el valor del campo cod4.
	 * @return mixed Retorna una fila de datos
	 */
	public function getting($cod1, $cod2, $cod3, $cod4){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM meta_servicios_alcaldia WHERE cod1 = ? AND cod2 = ? AND cod3 = ? AND cod4 = ?");
			$stm->execute(array($cod1, $cod2, $cod3, $cod4));

			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Eliminar (servicio_alcaldia).
	 * Es una función que llama a un procedimiento almacenado para "eliminar" un registro según los 4 códigos de la tabla 'meta_servicios_alcaldia' (eliminar entre comillas, pues el procedimiento almacenado lo que hace es cambiar el estado del registro a 0, es decir, descativado. El dato no se muestra en el sistema, pero aún está registrado en la base de datos).
	 * @param mixed $cod1 Variable como parámetro de la función que captura el valor del campo cod1.
	 * @param mixed $cod2 Variable como parámetro de la función que captura el valor del campo cod2.
	 * @param mixed $cod3 Variable como parámetro de la función que captura el valor del campo cod3.
	 * @param mixed $cod4 Variable como parámetro de la función que captura el valor del campo cod4.
	 * @return void No retorna nada, sólo ejecuta.
	 */
	public function Eliminar($cod1, $cod2, $cod3, $cod4){
		try {
			$stm = $this->pdo->prepare("CALL eliminar_servicio_alcaldia(?,?,?,?)");
			$stm->execute(array($cod1, $cod2, $cod3, $cod4));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Actualizar (servicio_alcaldia).
	 * Es una función que actualiza todos los datos de un registro en la tabla 'meta_servicios_alcaldia' según los datos almacenados en el objeto, siempre y cuando ese registro esté activo ('estado_servicios = 1').
	 * @param mixed $data Variable como parámetro de la función que captura los valores del objeto.
	 * 
	 * Se espera que el objeto contengan los siguientes atributos:
	 * - id_servicio_alcaldia.
	 * - cod1.
	 * - cod2.
	 * - cod3.
	 * - cod4.
	 * - descripcion_servicio.
	 * - descripcion_servicio_abreviado.
	 * - unidad_medida.
	 * - tarifa_actual.
	 * - tarifa_anterior.
	 * - periodo_vigencia_tarifa.
	 * - tipo_concepto.
	 * - tipo_cobro
	 * @return void No retorna nada, sólo ejecuta.
	 */
	public function Actualizar($data){
		try {
			$sql = "UPDATE meta_servicios_alcaldia SET cod1=?, cod2=?, cod3=?, cod4=?, descripcion_servicio=?, descripcion_servicio_abreviado=?, unidad_medida=?, tarifa_actual=?, tarifa_anterior=?, periodo_vigencia_tarifa=?, tipo_concepto=?, tipo_cobro=? WHERE estado_servicios = 1 AND cod1 = ? AND cod2 = ? AND cod3 = ? AND cod4 = ?";

			$this->pdo->prepare($sql)->execute(
				array(
					$data->cod1, 
					$data->cod2,
					$data->cod3, 
					$data->cod4,
					$data->descripcion_servicio,
					$data->descripcion_servicio_abreviado,
					$data->unidad_medida,
					$data->tarifa_actual,
					$data->tarifa_anterior,
					$data->periodo_vigencia_tarifa,
					$data->tipo_concepto,
					$data->tipo_cobro
			));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Registrar (servicio_alcaldia).
	 * Es una función que crea un registro de todos los datos en la tabla 'meta_servicios_alcaldia' según los datos almacenados en el objeto.
	 * @param mixed $data Variable como parámetro de la función que captura los valores del objeto.
	 * 
	 * Se espera que el objeto contengan los siguientes atributos:
	 * - cod1.
	 * - cod2.
	 * - cod3.
	 * - cod4.
	 * - descripcion_servicio.
	 * - descripcion_servicio_abreviado.
	 * - unidad_medida.
	 * - tarifa_actual.
	 * - tarifa_anterior.
	 * - periodo_vigencia_tarifa.
	 * - tipo_concepto.
	 * - tipo_cobro
	 * @return void No retorna nada, sólo ejecuta.
	 */
	public function Registrar($data){
		try {
			$sql = "INSERT INTO meta_servicios_alcaldia (cod1, cod2, cod3, cod4, descripcion_servicio, descripcion_servicio_abreviado, unidad_medida, tarifa_actual, tarifa_anterior, periodo_vigencia_tarifa, tipo_concepto, tipo_cobro) VALUES(?,?,?,?,?,?,?,?,?,?,?,?);";

			$this->pdo->prepare($sql)->execute(
				array(
					$data->cod1, 
					$data->cod2,
					$data->cod3, 
					$data->cod4,
					$data->descripcion_servicio,
					$data->descripcion_servicio_abreviado,
					$data->unidad_medida,
					$data->tarifa_actual,
					$data->tarifa_anterior,
					$data->periodo_vigencia_tarifa,
					$data->tipo_concepto,
					$data->tipo_cobro
			));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>