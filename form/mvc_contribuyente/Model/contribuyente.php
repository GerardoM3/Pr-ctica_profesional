<?php
class Contribuyente
//modificar..
{
	private $pdo;
    
    public $idpersona;
    public $nombre_contribuyente;
    public $apellido_contribuyente;
    public $dui_contribuyente;
    public $direccion_contribuyente;
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

			$stm = $this->pdo->prepare("SELECT * FROM contribuyente");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getting($idpersona)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM contribuyente WHERE idpersona = ?");
			          

			$stm->execute(array($idpersona));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idpersona)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM contribuyente WHERE idpersona = ?");			          

			$stm->execute(array($idpersona));
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
						nombre_contribuyente          = ?, 
						apellido_contribuyente        = ?,
                        direccion_contribuyente        = ?,
						dui_contribuyente            = ?,
                        nit_contribuyente            = ?, 
						telefono_contribuyente = ?
				    WHERE idpersona = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre_contribuyente, 
                        $data->apellido_contribuyente,
                        $data->direccion_contribuyente,
                        $data->dui_contribuyente,
                        $data->nit_contribuyente,
                        $data->telefono_contribuyente,
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
		$sql = "INSERT INTO `contribuyente` (nombre_contribuyente,apellido_contribuyente,direccion_contribuyente,dui_contribuyente,nit_contribuyente,telefono_contribuyente) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre_contribuyente, 
                    $data->apellido_contribuyente,
                    $data->direccion_contribuyente,
                    $data->dui_contribuyente,
                    $data->nit_contribuyente,
                    $data->telefono_contribuyente                    
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>