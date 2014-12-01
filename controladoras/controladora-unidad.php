<?php
require_once '../bdmysql/MySqlCon.php'; 
require_once 'controladora-clase.php';
require_once '../entidades/unidad.php';
require_once '../entidades/clases.php';

 class ControladoraUnidad
{
	public function insertarUnidad(Unidad $unidad)
	{
		$conexion = new MySqlCon();
		$idProfesor = $unidad->idProfesor;
		$idCurso = $unidad->idCurso;
		$nombre = $unidad->nombre;
		$cantClases = $unidad->cantClases;
		$fechaInicio = $unidad->fechaInicio;
		$fechaTermino = $unidad->fechaTermino;
	
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='INSERT INTO  unidades (ID_UNIDAD, ID_PROFESOR, ID_CURSO, NOMBRE, CANT_CLASES, FECHA_INICIO, FECHA_TERMINO) VALUES (NULL, ?, ?, ?, ?, ?,?);';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('iisiss',$idProfesor,$idCurso, $nombre, $cantClases, $fechaInicio, $fechaTermino);
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
         throw new $e("Error al Registrar Alumno");
        }

	}

	
	public function listarUnidadCursoProfesor($idProfesor,$idCurso)
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "SELECT * FROM unidades WHERE ID_PROFESOR = ? AND ID_CURSO = ?";
		   	$sentencia=$conexion->prepare($this->SqlQuery);
		   	$sentencia->bind_param('ii',$idProfesor, $idCurso);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idUnidad, $idProfesor, $idCurso, $nombre, $cantClases, $fechaInicio, $fechaTermin);
				$indice=0;     
				while($sentencia->fetch())
				{
					$unidad = new Unidad();
					$unidad->initClass($idUnidad, $idProfesor, $idCurso, $nombre, $cantClases, $fechaInicio, $fechaTermin);
        			$this->datos[$indice] = $unidad;
        			
        			$indice++;
				}
      		}
       		$conexion->close();
    	}
    	catch(Exception $e)
    	{
        	throw new $e("Error al listar Instituciones");
        }
        return $this->datos;
	}
	public function listarUnidadCursoProfesorYClases($idProfesor,$idCurso)
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "SELECT * FROM unidades WHERE ID_PROFESOR = ? AND ID_CURSO = ?";
		   	$sentencia=$conexion->prepare($this->SqlQuery);
		   	$sentencia->bind_param('ii',$idProfesor, $idCurso);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idUnidad, $idProfesor, $idCurso, $nombre, $cantClases, $fechaInicio, $fechaTermin);
				$indice=0;     
				while($sentencia->fetch())
				{
					$controladoraClase = new ControladoraClase();
					$unidad = new Unidad();
					$cursos = $controladoraClase->listarClasesIdUnidad($idUnidad);
					$unidad->initClassCursos($idUnidad, $idProfesor, $idCurso, $nombre, $cantClases, $fechaInicio, $fechaTermin,$cursos);
        			$this->datos[$indice] = $unidad;
        			
        			$indice++;
				}
      		}
       		$conexion->close();
    	}
    	catch(Exception $e)
    	{
        	throw new $e("Error al listar Instituciones");
        }
        return $this->datos;
	}
	
	
	public function editarUnidad(Unidad $unidad)
	{
		$conexion = new MySqlCon();
		$idUnidad = $unidad->idUnidad;
		$idProfesor = $unidad->idProfesor;
		$idCurso = $unidad->idCurso;
		$nombre = $unidad->nombre;
		$cantClases = $unidad->cantClases;
		$fechaInicio = $unidad->fechaInicio;
		$fechaTermino = $unidad->fechaTermino;
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='UPDATE unidades SET ID_PROFESOR = ?, ID_CURSO = ?, NOMBRE = ?, CANT_CLASES = ?, FECHA_INICIO = ?, FECHA_TERMINO = ? WHERE ID_UNIDAD = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('iisissi',$idProfesor,$idCurso, $nombre, $cantClases, $fechaInicio, $fechaTermino, $idUnidad);
	      	if($sentencia->execute())
	      	{
	      		if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Unidad Modificada";
				}
				else
				{
					$conexion->close();
					return "Unidad no Modificada";
				}
			}
			else
			{
				$conexion->close();
	        	return "no modificado error";
	        }
        }
    	catch(Exception $e)
    	{
         return false;
         throw new $e("exception");
        }
	}
	public function eliminarUnidad($idUnidad)
	{
		$conexion = new MySqlCon();
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='DELETE FROM unidades WHERE ID_UNIDAD = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('i',$idUnidad);
	      	if($sentencia->execute())
	      	{
	      		if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Unidad Eliminada";
				}
				else
				{
					$conexion->close();
					return "Unidad no Eliminada";
				}
			}
			else
			{
				$conexion->close();
	        	return "Error al Eliminar Unidad";
	        }
        }
    	catch(Exception $e)
    	{
         return false;
         throw new $e("Error al Eliminar Unidad excepcion");
        }
	}

}
