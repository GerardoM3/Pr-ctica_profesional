<?php

/*  ┌────┬─────────────────────────────────────────────────────────────────────────────────┬────┐  */
/*  |****|   NOTA: En los modelos. Dentro de las funciones, si sólo traerá un registro,    |****|  */
/*  |****|   evitemos utilizar fetchAll, pues nos puede traer errores                      |****|  */
/*  └────┴─────────────────────────────────────────────────────────────────────────────────┴────┘  */

require_once 'Model/servicio_alcaldia.php';

/**
 * Controlador ServicioController
 */
class ServicioController{

	private $model;
	
	function __CONSTRUCT()
	{
		$this->model = new Servicio_Alcaldia();
	}

	/**
	 * Index_Servicios.
	 * Función que ejecuta la vista de cabecera, cuerpo y pie de página.
	 * Esta función muestra como cuerpo la visualización de todos los datos de la tabla 'meta_servicios_alcaldia'.
	 * @return void No retorna nada, sólo ejecuta.
	 */
	public function Index_Servicios(){
		require_once 'View/servicios_alcaldia/header.php';
		require_once 'View/servicios_alcaldia/servicio_alcaldia.php';
		require_once 'View/servicios_alcaldia/footer.php';
	}

	/**
	 * Crud_Servicio.
	 * Función que ejecuta la vista de cabecera, cuerpo y pie de página.
	 * Esta función muestra como cuerpo el formulario, y según la opción que ha seleccionado el usuario, si el formulario está vacío, significa que se registrará nuevos datos. De lo contrario es la edición de los datos que ha sido seleccionado.
	 * @return void No retorna nada, sólo ejecuta.
	 */
	public function Crud_Servicio(){
		$alm = new Servicio_Alcaldia();

		if (isset($_REQUEST['cod1'], $_REQUEST['cod2'], $_REQUEST['cod3'], $_REQUEST['cod4'])) {
			$alm = $this->model->getting($_REQUEST['cod1'], $_REQUEST['cod2'], $_REQUEST['cod3'], $_REQUEST['cod4']);
		}

		require_once 'View/servicios_alcaldia/header.php';
		require_once 'View/servicios_alcaldia/servicio_alcaldia_editar.php';
		require_once 'View/servicios_alcaldia/footer.php';
	}

	/**
	 * Guardar_Servicio.
	 * Función que procesa los datos de los campos del formulario.
	 * Recoge todos los datos del formulario, y según el identificador se determina si mandar a llamar la función para registrar datos o de otro modo actualizar los datos.
	 * Finalmente, sale del formulario y redirecciona a la página principal del Servicio_alcaldia.
	 * @return void No retorna nada, sólo ejecuta.
	 */
	public function Guardar_Servicio()
	{
		$alm = new Servicio_Alcaldia();

		$alm->id_servicio_alcaldia = $_REQUEST['id_servicio_alcaldia'];
		$alm->cod1 = $_REQUEST['cod1'];
		$alm->cod2 = $_REQUEST['cod2'];
		$alm->cod3 = $_REQUEST['cod3'];
		$alm->cod4 = $_REQUEST['cod4'];
		$alm->descripcion_servicio = $_REQUEST['descripcion_servicio'];
		$alm->descripcion_servicio_abreviado = $_REQUEST['descripcion_servicio_abreviado'];
		$alm->unidad_medida = $_REQUEST['unidad_medida'];
		$alm->tarifa_actual = $_REQUEST['tarifa_actual'];
		$alm->tarifa_anterior = $_REQUEST['tarifa_anterior'];
		$alm->periodo_vigencia_tarifa = $_REQUEST['periodo_vigencia_tarifa'];
		$alm->tipo_concepto = $_REQUEST['tipo_concepto'];
		$alm->tipo_cobro = $_REQUEST['tipo_cobro'];

		//$alm->cod1 > 0 AND $alm->cod2 > 0 AND $alm->cod3 > 0 AND $alm->cod4 > 0 ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);

		if ($alm->id_servicio_alcaldia > 0) {
			$this->model->Actualizar($alm);
		} else {
			$this->model->Registrar($alm);
		}

		header('Location: index.php?c=Servicio');

	}

	/**
	 * Eliminar.
	 * Función que lo único que hace es que llama una función del modelo con los parámetros correspondientes, y finalmente, redirecciona a la página principal del Servicio_alcaldia.
	 * @return void No retorna nada, sólo ejecuta
	 */
	public function Eliminar(){
		$this->model->Eliminar($_REQUEST['cod1'], $_REQUEST['cod2'], $_REQUEST['cod3'], $_REQUEST['cod4']);
		header('Location: index.php?c=Servicio');
	}
}
?>