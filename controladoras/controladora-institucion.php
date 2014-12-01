<?php
require_once '../bdmysql/MySqlCon.php'; 
require_once '../entidades/institucion.php';

 class ControladoraInstitucion
{
	public function insertarInstitucion(Institucion $institucion)
	{
		$conexion = new MySqlCon();
		$nombre = $institucion->nombre;
		$direccion = $institucion->direccion;
		$descripcion = $institucion->descripcion;
		$telefono = $institucion->telefono;
		$correo = $institucion->correo;
		$contacto = $institucion->contacto;
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='INSERT INTO  institucion (ID_INSTITUCION ,NOMBRE ,DIRECCION, DESCRIPCION, TELEFONO, CORREO, CONTACTO) VALUES (NULL, ?, ?, ?, ?, ?, ?);';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('sssiss',$nombre, $direccion, $descripcion, $telefono, $correo, $contacto);
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

	public function listarInstituciones()
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "select * from institucion";
		   	$sentencia=$conexion->prepare($this->SqlQuery);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idInstitucion, $nombre, $direccion, $descripcion, $telefono, $correo, $contacto);
				$indice=0;     
				while($sentencia->fetch())
				{
					$institucion = new Institucion();
					$institucion->initClass($idInstitucion, $nombre, $direccion, $descripcion, $telefono, $correo, $contacto);
        			$this->datos[$indice] = $institucion;
        			
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
	public function listarInstitucionesIdProfesor($idProfesor)
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "SELECT inst.* FROM institucion inst, profesor pro, institucion_profesor inter WHERE inst.ID_INSTITUCION = inter.ID_INSTITUCION AND  inter.ID_PROFESOR = ?";
		   	$sentencia=$conexion->prepare($this->SqlQuery);
		   	$sentencia->bind_param("i",$idProfesor);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idInstitucion, $nombre, $direccion, $descripcion, $telefono, $correo, $contacto);
				$indice=0;     
				while($sentencia->fetch())
				{
					$institucion = new Institucion();
					$institucion->initClass($idInstitucion, $nombre, $direccion, $descripcion, $telefono, $correo, $contacto);
        			$this->datos[$indice] = $institucion;
        			
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

	
	public function editarInstituciones(Institucion $institucion)
	{
		$conexion = new MySqlCon();
		$idInstitucion = $institucion->idInstitucion;
		$nombre = $institucion->nombre;
		$direccion = $institucion->direccion;
		$descripcion = $institucion->descripcion;
		$telefono = $institucion->telefono;
		$correo = $institucion->correo;
		$contacto = $institucion->contacto;
		
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='UPDATE institucion SET NOMBRE = ?, DIRECCION = ?, DESCRIPCION = ?, TELEFONO = ?, CORREO = ?, CONTACTO = ? WHERE ID_INSTITUCION = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('sssissi',$nombre, $direccion, $descripcion, $telefono, $correo, $contacto, $idInstitucion);
	      	if($sentencia->execute())
	      	{
	      		if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Institucion Modificada";
				}
				else
				{
					$conexion->close();
					return "Institucion no Modificada";
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
	public function eliminarInstitucion($idInstitucion)
	{
		$conexion = new MySqlCon();
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='DELETE FROM institucion WHERE ID_INSTITUCION = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('i',$idInstitucion);
	      	if($sentencia->execute())
	      	{
	      		if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Institucion Eliminada";
				}
				else
				{
					$conexion->close();
					return "Institucion no Eliminada";
				}
			}
			else
			{
				$conexion->close();
	        	return "Error al Eliminar Institucion";
	        }
        }
    	catch(Exception $e)
    	{
         return false;
         throw new $e("Error al Eliminar Institucion excepcion");
        }
	}
}