<?php
require_once '../bdmysql/MySqlCon.php'; 
require_once '../entidades/profesor.php';

class ControladoraProfesor
{
	private $SqlQuery;
	private $datos;

	public function insertarProfesor(Profesor $profesor)
	{
		$conexion = new MySqlCon();

		$nombre = $profesor->nombre;
		$appPaterno = $profesor->appPaterno;
		$appMaterno = $profesor->appMaterno;
		$correo = $profesor->correo;
		$pass = $profesor->pass;
		$biografia = $profesor->biografia;
		$telefono = $profesor->telefono;

		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='INSERT INTO profesor(`ID_PROFESOR`,`NOMBRE`,`APP_PATERNO`,`APP_MATERNO`,`CORREO`,`PASS`,`BIOGRAFIA`,`TELEFONO`) values (null,?,?,?,?,?,?,?);';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('ssssssi',$nombre, $appPaterno, $appMaterno, $correo, $pass, $biografia, $telefono);
	      	if($sentencia->execute())
	      	{
	        	$conexion->close();
				return $sentencia->insert_id;
			}
			else
			{
				$conexion->close();
	        	return false;
	        }
        }
    	catch(Exception $e)
    	{
         return false;
         throw new $e("Error al registrar Profesor");
        }
	}

	public function modificarProfesor(Profesor $profesor)
	{
		$conexion = new MySqlCon();
		$idProfesor = $profesor->idProfesor;
		$nombre = $profesor->nombre;
		$appPaterno = $profesor->appPaterno;
		$appMaterno = $profesor->appMaterno;
		$correo = $profesor->correo;
		$biografia = $profesor->biografia;
		$telefono = $profesor->telefono;
		
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='UPDATE `profesor` SET `NOMBRE`=?, `APP_PATERNO`=?, `APP_MATERNO`=?, `CORREO`=?, `BIOGRAFIA`=?, `TELEFONO`=? WHERE `ID_PROFESOR`=?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('sssssii',$nombre, $appPaterno, $appMaterno, $correo,  $biografia, $telefono, $idProfesor);
	      	if($sentencia->execute())
	      	{
	        	if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Profesor Modificado";
				}
				else
				{
					$conexion->close();
					return "Profesor No Modificado";
				}
			}
			else
			{
				$conexion->close();
	        	return "No modifique";
	        }
        }
    	catch(Exception $e)
    	{
         return false;
         throw new $e("Error al Actualizar Profesor");
        }
	}

	public function eliminarProfesor($idProfe)
	{
		$conexion = new MySqlCon();
		
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='DELETE FROM `profesor` WHERE `ID_PROFESOR` = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('i', $idProfe);
	      	if($sentencia->execute())
	      	{
	        	if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Profesor Eliminado";
				}
				else
				{
					$conexion->close();
					return "Profesor No Eliminado";
				}
			}
			else
			{
				$conexion->close();
	        	return "No Elimine";
	        }
        }
    	catch(Exception $e)
    	{
         return false;
         throw new $e("Error al Eliminar Profesor");
        }
	}

	public function buscarProfesorPorID($id)
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "select * from profesor where ID_PROFESOR = ?";

		   	$sentencia=$conexion->prepare($this->SqlQuery);
		   	$sentencia->bind_param('i',$id);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idProfesor, $nombre, $appPaterno, $appMaterno, $correo, $pass, $biografia, $telefono);
				$indice = 0;     
				while($sentencia->fetch())
				{
					$profesor = new Profesor();
					$profesor->initClass($idProfesor, $nombre, $appPaterno, $appMaterno, $correo, $pass, $biografia, $telefono);
        			$this->datos[$indice] = $profesor;
        			
        			$indice++;
				}
      		}
       		$conexion->close();
    	}
    	catch(Exception $e)
    	{
        	throw new $e("Error al listar Profesor");
        }
        return $this->datos;
	}
}
?>