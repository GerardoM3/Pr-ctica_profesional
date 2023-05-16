<?php 

/*  ┌────┬─────────────────────────────────────────────────────────────────────────────────┬────┐  */
/*  |****|   NOTA: En los modelos. Dentro de las funciones, si sólo traerá un registro,    |****|  */
/*  |****|   evitemos utilizar fetchAll, pues nos puede traer errores                      |****|  */
/*  └────┴─────────────────────────────────────────────────────────────────────────────────┴────┘  */

require_once 'Model/sector_estado.php';
/**
 * Controlador SectorController
 */
class SectorController{
	
	private $model;

	function __CONSTRUCT()
	{
		$this->model = new Sector_Estado();
	}

	/**
	 * Index_Sectores.
	 * Función que ejecuta la vista de cabecera, cuerpo y pie de página.
	 * Esta función muestra como cuerpo la visualización de todos los datos de la tabla 'meta_sector_estado'.
	 * @return void No retorna nada, sólo ejecuta.
	 */
	public function Index_Sectores(){
		require_once 'View/sectores_estados/header.php';
		require_once 'View/sectores_estados/sector_estado.php';
		require_once 'View/sectores_estados/footer.php';
	}

	/**
	 * Crud_Sector.
	 * Función que ejecuta la vista de cabecera, cuerpo y pie de página.
	 * Esta función muestra como cuerpo el formulario, y según la opción que ha seleccionado el usuario, si el formulario está vacío, significa que se registrará nuevos datos. De lo contrario, es la edición de los datos que ha sido seleccionado.
	 * @return void No retorna nada, sólo ejecuta.
	 */
	public function Crud_Sector(){
		$alm_crud = new Sector_Estado();

		if(isset($_REQUEST['cod_sector'])){
			$alm_crud = $this->model->getting($_REQUEST['cod_sector']);
		}

		require_once 'View/sectores_estados/header.php';
		require_once 'View/sectores_estados/sector_estado_editar.php';
		require_once 'View/sectores_estados/footer.php';
	}

	/**
	 * Guardar_Sector.
	 * Función que procesa los datos de los campos del formulario.
	 * Recoge todos los datos del formulario, y se manda a llamar la función Registrar del modelo con todos los datos recolectados y guardados en el objeto $alm.
	 * Finalmente, sale del formulario y redirecciona a la página principal del Sector_Estado.
	 * @return void No retorna nada, sólo ejecuta.
	 */
	public function Guardar_Sector(){
		$alm = new Sector_Estado();
		$alm->cod_sector = $_REQUEST['cod_sector'];
		$alm->sector_estado = $_REQUEST['sector_estado'];

		/*$alm->cod_sector != null
		? $this->model->Actualizar($alm) 
		: $this->model->Registrar($alm);*/
		$this->model->Registrar($alm);

		header('Location: index.php?c=Sector');
	}

	/**
	 * Actualizar_Sector.
	 * Función que procesa los datos de los campos del formulario.
	 * Recoge todos los datos del formulario, y se manda a llamar la función Actualizar del modelo con todos los datos recolectados y guardados en el objeto $alm.
	 * Finalmente, sale del formulario y redirecciona a la página principal del Sector_Estado.
	 * @return void
	 */
	public function Actualizar_Sector(){
		$alm = new Sector_Estado;
		$alm->cod_sector = $_REQUEST['cod_sector'];
		$alm->sector_estado = $_REQUEST['sector_estado'];

		$this->model->Actualizar($alm);

		header('Location: index.php?c=Sector');
	}

	/**
	 * Eliminar.
	 * Función que lo único que hace es que llama a una función del modelo con los parámetros correspondientes, y finalmente, redirecciona a la página principal del Sector_estado.
	 * @return void No retorna nada, sólo ejecuta.
	 */
	public function Eliminar(){
		$this->model->Eliminar($_REQUEST['cod_sector']);
		header('Location: index.php?c=Sector');
	}
}
?>