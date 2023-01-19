<?php 
require ('/Model/conexion_contribuyente.php');

$cod_departamento = $_POST['cod_departamento'];

$queryMunicipio = "SELECT cod_municipio, municipio FROM meta_municipio WHERE cod_departamento = '$cod_departamento';";

$resultadoMunicipio = $mysqli->query($queryMunicipio);

$html1 = "<option value='0'>Seleccione un municipio</option>";

while ($rowM = $resultadoMunicipio->fetch_assoc()) {
	$html = "<option value='".$rowM['cod_municipio']."'>".$rowM['municipio']."</option>";
}

/*foreach ($this->model->Listar_Muni($cod_departamento) as $rM) :
	$html = "<option value='". echo $rM->cod_municipio ."'>". echo $rM->municipio."</option>";
endforeach*/
echo $html1;
echo $html;

	/*public function Listar_Muni($cod_departamento)
	{
		try {
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM meta_municipio WHERE cod_departamento = ?;");
			$stm->execute(array($cod_departamento));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}*/
?>