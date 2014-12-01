<?php
require_once '../bdmysql/MySqlCon.php'; 
require_once '../entidades/alumno.php';

 class ControladoraAlumno
{
	public function insertarAlumno(Alumno $alumno)
	{
		$conexion = new MySqlCon();
		$idCurso = $alumno->idCurso;
		$nombre =	$alumno->nombre;
		$appPaterno = $alumno->appPaterno;
		$appMaterno = $alumno->appMaterno;
		$rut = $alumno->rut;
		$telefono =  $alumno->telefono;
		$correo = $alumno->correo;
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='INSERT INTO  `alumno` (ID_ALUMNO, ID_CURSO ,NOMBRE ,APP_PATERNO, APP_MATERNO, RUT, TELEFONO, CORREO) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('issssis',$idCurso, $nombre, $appPaterno, $appMaterno, $rut, $telefono, $correo);
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

	public function listarAlumnos()
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "select * from alumno";
		   	$sentencia=$conexion->prepare($this->SqlQuery);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idAlumno, $idCurso, $nombre, $appPaterno, $appMaterno, $rut, $telefono, $correo);
				$indice=0;     
				while($sentencia->fetch())
				{
					$alumno = new Alumno();
					$alumno->initClass($idAlumno, $idCurso, $nombre, $appPaterno, $appMaterno, $rut, $telefono, $correo);
        			$this->datos[$indice] = $alumno;
        			
        			$indice++;
				}
      		}
       		$conexion->close();
    	}
    	catch(Exception $e)
    	{
        	throw new $e("Error al listar Alumnos");
        }
        return $this->datos;
	}

	public function listarAlumnosPorCurso($idCurso)
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "select * from alumno where ID_CURSO = ?";

		   	$sentencia=$conexion->prepare($this->SqlQuery);
		   	$sentencia->bind_param('i',$idCurso);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idAlumno, $idCurso, $nombre, $appPaterno, $appMaterno, $rut, $telefono,$correo);
				$indice=0;     
				while($sentencia->fetch())
				{
					$alumno = new Alumno();
					$alumno->initClass($idAlumno, $idCurso, $nombre, $appPaterno, $appMaterno, $rut, $telefono,$correo);
        			$this->datos[$indice] = $alumno;
        			
        			$indice++;
				}
      		}
       		$conexion->close();
    	}
    	catch(Exception $e)
    	{
        	throw new $e("Error al listar Alumnos");
        }
        return $this->datos;
	}
	public function editarAlumnos(Alumno $alumno)
	{
		$conexion = new MySqlCon();
		$idCurso = $alumno->idCurso;
		$idAlumno = $alumno->idAlumno;
		$nombre =	$alumno->nombre;
		$appPaterno = $alumno->appPaterno;
		$appMaterno = $alumno->appMaterno;
		$rut = $alumno->rut;
		$telefono =  $alumno->telefono;
		$correo = $alumno->correo;
		
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='UPDATE alumno SET ID_CURSO = ?, NOMBRE = ?, APP_PATERNO = ?, APP_MATERNO = ?, RUT = ?, TELEFONO = ?, CORREO = ? WHERE ID_ALUMNO = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('issssisi',$idCurso,$nombre, $appPaterno, $appMaterno, $rut, $telefono, $correo, $idAlumno);
	      	if($sentencia->execute())
	      	{
	      		if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Alumno Modificado";
				}
				else
				{
					$conexion->close();
					return "Alumno no Modificado";
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
         throw new $e("Error al Actualizar Alumnos");
        }
	}
	public function eliminarAlumno($idAlumno)
	{
		$conexion = new MySqlCon();
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='DELETE FROM alumno WHERE ID_ALUMNO = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('i',$idAlumno);
	      	if($sentencia->execute())
	      	{
	      		if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Alumno Eliminado";
				}
				else
				{
					$conexion->close();
					return "Alumno no Eliminado";
				}
			}
			else
			{
				$conexion->close();
	        	return "Error al Eliminadr Alumno";
	        }
        }
    	catch(Exception $e)
    	{
         return false;
         throw new $e("Error al Eliminar Alumno excepcion");
        }
	}
}