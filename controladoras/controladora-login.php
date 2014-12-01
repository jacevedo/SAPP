<?php
require '../phpass/PasswordHash.php';
require_once '../bdmysql/MySqlCon.php'; 
require_once '../entidades/session.php';

class ControladoraLogin
{
	private $SqlQuery;
	private $datos;


	public function validarUsusario($correo, $pass)
	{
		$conexion = new MySqlCon();
		$this->datos = '';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "SELECT ID_PROFESOR, NOMBRE, APP_PATERNO, CORREO, PASS FROM profesor WHERE correo = ?";
			
		   	$sentencia=$conexion->prepare($this->SqlQuery);
		   	$sentencia->bind_param("s",$correo);	
        	$sentencia->execute();
		   	$sentencia->bind_result($idProfesor,$nombre, $appPaterno,$correo,$passBD);

        	$hasher = new PasswordHash(8, false);
        	$sentencia->execute();

        	if($sentencia->fetch())
        	{
        		if($hasher->CheckPassword($pass, $passBD))
		        {
		        	$session = new Session();
					date_default_timezone_set('America/Argentina/Buenos_Aires');
		        	$hoy = date("Y-m-d H:i:s",time());
		        	$keyDesencriptada = $idProfesor.$hoy;
		        	$keyHashada = $hasher->HashPassword($keyDesencriptada);
		        	$session->initClass(0, $idProfesor, $keyHashada,$hoy,$hoy);
		        	$datos["key"] = $this->insertSession($session);
		        	$datos["idProfesor"] = $idProfesor;
		        }			
		        else
		        {
		        	$datos = "Usuario o Contrasena no correcta";
		        }    
      		}
      		else
      		{
      			$datos = "Error al hacer la consulta";
      		}

      		$conexion->close();
       		
		}
		catch(Exception $e)
		{
			$datos="excepcion";
			//throw new $e("Error al listar ordenes");
		}
		return $datos;
	}
	private function insertSession(Session $session)
	{

		$conexion = new MySqlCon();
		$idProfesor = $session->idProfesor;
		$keyHashada = $session->keySession;
		$horaFechaIngreso = $session->fechaHoraIngreso;
		$horaFechaCaduco = $session->fechaHoraCaducidad;
		$datos = '';
		try
		{
			$this->SqlQuery='';
	        $this->SqlQuery="INSERT INTO session (ID_SESSION, ID_PROFESOR, KEY_SESSION, FECHA_HORA_INGRESO, FECHA_HORA_CADUCIDAD) VALUES (NULL, ?, ?, ?, ?)";
			$sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('isss', $idProfesor,$keyHashada,$horaFechaIngreso,$horaFechaCaduco);
	      	if($sentencia->execute())
	      	{
	      		$conexion->close();

				if($sentencia->insert_id!=-1)
				{
					$datos = $keyHashada;
				}
				else
				{
					$datos = "Error en el inicio de session";
				}
			}
			else
			{
				$conexion->close();
	        	$datos = "Error en el inicio de session (insert)";
	        }

		}
		catch(Exception $e)
		{
			throw new $e("Error al listar ordenes");
		}
		return $datos;
	}
	public function validarSession($json)
	{
		$conexion = new MySqlCon();
		$data = json_decode($json);
		$keySession = $data->{'key'};
		$this->datos = '';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "SELECT ID_SESSION, ID_PROFESOR, FECHA_HORA_CADUCIDAD FROM session WHERE KEY_SESSION = ?";
			
		   	$sentencia=$conexion->prepare($this->SqlQuery);
		   	$sentencia->bind_param("s",$keySession);
		   	$sentencia->bind_result($idSession,$idProfesor, $fechaHoraCaducidad);	
        	$sentencia->execute();
        	$hasher = new PasswordHash(8, false);	
        	if($sentencia->fetch())
        	{
        		if($idSession!=""&&$idSession!=-1)
        		{
        			$datos = $data->{'indice'};
        		}  
        		else
        		{
        			$datos=-1;
        		}
				
      		}
      		else
      		{
      			$datos = -1;
      		}
       		
		}
		catch(Exception $e)
		{
			throw new $e("Error al listar ordenes");
		}
		return $datos;
	}
}
?>