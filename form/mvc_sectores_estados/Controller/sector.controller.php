<?php 
require_once 'mvc_sectores_estados/Model/sector_estado.php';

class SectorController{
	
	private $model;

	function __CONSTRUCT()
	{
		$this->model = new Sector_Estado();
	}

	public function Index_Sectores(){
		require_once 'mvc_sectores_estados/View/header.php';
		require_once 'mvc_sectores_estados/View/sector_estado.php';
		require_once 'mvc_sectores_estados/View/footer.php';
	}

	public function Crud_Sector(){
		$alm = new Sector_Estado();

		if(isset($_REQUEST['cod_sector'])){
			$alm = $this->model->getting($_REQUEST['cod_sector']);
		}

		require_once 'mvc_sectores_estados/View/header.php';
		require_once 'mvc_sectores_estados/View/sector_estado_editar.php';
		require_once 'mvc_sectores_estados/View/footer.php';
	}

	public function Guardar_Sector(){
		$alm = new Sector_Estado();

		$alm->cod_sector = $_REQUEST['cod_sector'];
		$alm->sector_estado = $_REQUEST['sector_estado'];

		$alm->cod_sector > 0 
		? $this->model->Actualizar($alm) 
		: $this->model->Registrsr($alm);

		header('Location: index.php?c=Sector');
	}

	public function Eliminar(){
		$this->model->Eliminar($_REQUEST['cod_sector']);
		header('Location: sector_estado.php?c=Sector');
	}
}
?>