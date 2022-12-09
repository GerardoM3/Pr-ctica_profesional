<?php
class Persona
{
	private $pdo;
    
    public $idpersona;
    public $nombres;
    public $cedula;
    public $fecha_nmto;
    public $direccion;
    public $email;

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

			$stm = $this->pdo->prepare("SELECT * FROM persona");
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
			          ->prepare("SELECT * FROM persona WHERE idpersona = ?");
			          

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
			            ->prepare("DELETE FROM persona WHERE idpersona = ?");			          

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
			$sql = "UPDATE persona SET 
						nombres          = ?, 
						cedula        = ?,
                        fecha_nmto        = ?,
						direccion            = ?, 
						email = ?
				    WHERE idpersona = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombres, 
                        $data->cedula,
                        $data->fecha_nmto,
                        $data->direccion,
                        $data->email,
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
		$sql = "INSERT INTO `persona` (nombres,cedula,fecha_nmto,direccion,email) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombres, 
                    $data->cedula,
                    $data->fecha_nmto,
                    $data->direccion,
                    $data->email                    
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>
