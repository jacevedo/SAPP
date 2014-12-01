<?php
require_once '../bdmysql/MySqlCon.php'; 
require_once '../entidades/asistencia.php';

class ControladoraAsistencia
{
	public function insertarAsistencia(Asistencia $asistencia)
	{
		$conexion = new MySqlCon();

		$idAlumno = $asistencia->idAlumno;
		$fecha = $asistencia->fecha;
		$hora = $asistencia->hora;
		$asistio = $asistencia->asistio;

		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='INSERT INTO asistencia(ID_ASISTENCIA,ID_ALUMNO,FECHA,ASISTIO) values (null,?,?,?);';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('isi',$idAlumno, $fecha, $asistio);
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
	public function listarAsistenciaAlumno($idAlumno)
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "SELECT * from asistencia WHERE ID_ALUMNO=?";
		   	$sentencia=$conexion->prepare($this->SqlQuery);
		   	$sentencia->bind_param('i',$idAlumno);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idAsistencia, $idAlumno, $fecha, $asistio);
				$indice=0;     
				while($sentencia->fetch())
				{
					$asistencia = new Asistencia();
					$asistencia->initClass($idAsistencia, $idAlumno, null, null, $fecha, $asistio);
        			$this->datos[$indice] = $asistencia;
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

	public function modificarAsistencia(Asistencia $asistencia)
	{
		$conexion = new MySqlCon();
		$idAsistencia = $asistencia->idAsistencia;
		$idAlumno = $asistencia->idAlumno;
		$fecha = $asistencia->fecha;
		$hora = $asistencia->hora;
		$asistio = $asistencia->asistio;
		
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='UPDATE `asistencia` SET `ID_ALUMNO`=?, `FECHA`=?, `HORA`=?, `ASISTIO`=? WHERE `ID_ASISTENCIA`=?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('isiii',$idAlumno, $fecha, $hora, $asistencio, $idAsistencia);
	      	if($sentencia->execute())
	      	{
	        	if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Asistencia Modificada";
				}
				else
				{
					$conexion->close();
					return "Asistencia No Modificado";
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
         throw new $e("Error al Actualizar Asistencia");
        }
	}
	
}
?>