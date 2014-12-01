<?php
require_once '../bdmysql/MySqlCon.php'; 
require_once '../entidades/pruebas.php';

class ControladoraPruebas
{
	private $SqlQuery;
	private $datos;

	public function insertarPrueba(Pruebas $prueba)
	{
		$conexion = new MySqlCon();

		$nombrePrueba = $prueba->nombrePrueba;
		$fecha = $prueba->fecha;
		$porcentajePrueba = $prueba->porcentajePrueba;
		$idCurso = $prueba->idCurso;
	
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='INSERT INTO pruebas(ID_PRUEBA, ID_CURSO, NOM_PRUEBA, FECHA, PORCENTAJE_PRUEBA) VALUES (NULL,?,?,?,?);';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('issi', $idCurso, $nombrePrueba, $fecha, $porcentajePrueba);
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
         throw new $e("Error al Registrar Prueba");
        }
	}

	public function editarPrueba(Pruebas $prueba)
	{
		$conexion = new MySqlCon();

		$idPrueba = $prueba->idPrueba;
		$nombrePrueba = $prueba->nombrePrueba;
		$fecha = $prueba->fecha;
		$porcentajePrueba = $prueba->porcentajePrueba;
		$idCurso = $prueba->idCurso;

		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='UPDATE pruebas SET ID_CURSO = ?, NOM_PRUEBA = ?, FECHA = ?, PORCENTAJE_PRUEBA = ? WHERE ID_PRUEBA = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('issii', $idCurso, $nombrePrueba, $fecha, $porcentajePrueba, $idPrueba);
	      	if($sentencia->execute())
	      	{
	      		if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Prueba Modificada";
				}
				else
				{
					$conexion->close();
					return "Prueba no Modificada";
				}
			}
			else
			{
				$conexion->close();
	        	return "No modificado error";
	        }
        }
    	catch(Exception $e)
    	{
         return false;
         throw new $e("exception");
        }
	}

	public function eliminarPrueba($idPruebaEliminar)
	{
		$conexion = new MySqlCon();
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='DELETE FROM pruebas WHERE ID_PRUEBA = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('i',$idPruebaEliminar);
	      	if($sentencia->execute())
	      	{
	      		if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Prueba Eliminada";
				}
				else
				{
					$conexion->close();
					return "Prueba no Eliminada";
				}
			}
			else
			{
				$conexion->close();
	        	return "Error al Eliminar Prueba";
	        }
        }
    	catch(Exception $e)
    	{
         return false;
         throw new $e("Error al Eliminar Prueba excepcion");
        }
	}

	public function listarPruebasPorCurso($idCurso)
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "SELECT * FROM pruebas WHERE ID_CURSO = ?";
		   	$sentencia=$conexion->prepare($this->SqlQuery);
		   	$sentencia->bind_param('i',$idCurso);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idPrueba, $idCurso, $nombrePrueba, $fecha, $porcentajePrueba);
				$indice = 0;
				while($sentencia->fetch())
				{
					$prueba = new Pruebas();
					$prueba->initClass($idPrueba, $nombrePrueba, $fecha, $porcentajePrueba, $idCurso, 0, NULL);
        			$this->datos[$indice] = $prueba;
        			
        			$indice++;
				}
      		}
       		$conexion->close();
    	}
    	catch(Exception $e)
    	{
        	throw new $e("Error al listar Pruebas");
        }
        return $this->datos;
	}

	public function listarPruebasPorIdProfe($idProfe)
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "SELECT p.ID_PRUEBA, p.ID_CURSO, p.NOM_PRUEBA, p.FECHA, p.PORCENTAJE_PRUEBA FROM pruebas p, curso c WHERE p.ID_CURSO = c.ID_CURSO AND c.ID_PROFESOR = ?";
		   	$sentencia=$conexion->prepare($this->SqlQuery);
		   	$sentencia->bind_param('i',$idProfe);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idPrueba, $idCurso, $nombrePrueba, $fecha, $porcentajePrueba);
				$indice = 0;
				while($sentencia->fetch())
				{
					$prueba = new Pruebas();
					$prueba->initClass($idPrueba, $nombrePrueba, $fecha, $porcentajePrueba, $idCurso, 0, NULL);
        			$this->datos[$indice] = $prueba;
        			
        			$indice++;
				}
      		}
       		$conexion->close();
    	}
    	catch(Exception $e)
    	{
        	throw new $e("Error al listar Pruebas");
        }
        return $this->datos;
	}
}
?>