<?php
require_once '../bdmysql/MySqlCon.php'; 
require_once '../entidades/curso.php';

 class ControladoraCurso
{
	private $SqlQuery;
	private $datos;
	
	public function insertarCurso(Curso $curso)
	{
		$conexion = new MySqlCon();
		$idInstitucion = $curso->idInstitucion;
		$idProfesor = $curso->idProfesor;
		$materia = $curso->materia;
		$nivel = $curso->nivel;
		$numero = $curso->numero;
		$letra = $curso->letra;
	
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='INSERT INTO  curso (ID_CURSO, ID_INSTITUCION, ID_PROFESOR, NIVEL, NUMERO, LETRA, MATERIA) VALUES (NULL, ?, ?, ?, ?, ?,?);';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('iisiss',$idInstitucion, $idProfesor, $nivel, $numero, $letra, $materia);

	        
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

	public function listarCursos()
	{
		
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "SELECT cu.ID_CURSO, cu.ID_INSTITUCION as IDINSTITUCION, cu.ID_PROFESOR as IDPROFESOR,  cu.NIVEL, cu.NUMERO, cu.LETRA, (SELECT NOMBRE FROM institucion WHERE ID_INSTITUCION  = IDINSTITUCION), (SELECT NOMBRE FROM profesor WHERE ID_PROFESOR = IDPROFESOR), (SELECT APP_PATERNO FROM profesor WHERE IDINSTITUCION = ID_INSTITUCION) , cu.MATERIA FROM curso cu";
		   	$sentencia=$conexion->prepare($this->SqlQuery);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idCurso, $idInstitucion, $idProfesor, $nivel, $numero, $letra,
        									$nomInstitucion, $nomProfesor, $appProfesor, $materia);
				$indice=0;     
				while($sentencia->fetch())
				{
					$curso = new Curso();
					$curso->initClass($idCurso, $idInstitucion, $idProfesor, $materia, $nivel, $numero, $letra,
													$nomInstitucion, $nomProfesor, $appProfesor);
        			$this->datos[$indice] = $curso;
        			
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
	public function listarCursosPorInstitucionProfesor($idProfesor,$idInstitucion)
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "SELECT cu.ID_CURSO, cu.ID_INSTITUCION as IDINSTITUCION, cu.ID_PROFESOR as IDPROFESOR,cu.MATERIA,  cu.NIVEL, cu.NUMERO, cu.LETRA, (SELECT NOMBRE FROM institucion WHERE ID_INSTITUCION  = IDINSTITUCION), (SELECT NOMBRE FROM profesor WHERE ID_PROFESOR = IDPROFESOR), (SELECT APP_PATERNO FROM profesor WHERE ID_PROFESOR = IDPROFESOR) , cu.MATERIA FROM curso cu WHERE cu.ID_PROFESOR = ? AND cu.ID_INSTITUCION = ?";
		   	$sentencia=$conexion->prepare($this->SqlQuery);
		   	$sentencia->bind_param('ii',$idProfesor, $idInstitucion);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idCurso, $idInstitucion, $idProfesor, $materia, $nivel, $numero, $letra,
        									$nomInstitucion, $nomProfesor, $appProfesor,$materia);
				$indice=0;     
				while($sentencia->fetch())
				{
					$curso = new Curso();
					$curso->initClass($idCurso, $idInstitucion, $idProfesor, $materia, $nivel, $numero, $letra,
													$nomInstitucion, $nomProfesor, $appProfesor);
        			$this->datos[$indice] = $curso;
        			
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
	public function listarCursosPorProfesor($idProfesor)
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "SELECT cu.ID_CURSO, cu.ID_INSTITUCION as IDINSTITUCION, cu.ID_PROFESOR as IDPROFESOR, cu.MATERIA,  cu.NIVEL, cu.NUMERO, cu.LETRA, (SELECT NOMBRE FROM institucion WHERE ID_INSTITUCION  = IDINSTITUCION), (SELECT NOMBRE FROM profesor WHERE ID_PROFESOR = IDPROFESOR), (SELECT APP_PATERNO FROM profesor WHERE ID_PROFESOR = IDPROFESOR), cu.MATERIA FROM curso cu where cu.ID_PROFESOR = ?";
		   	$sentencia=$conexion->prepare($this->SqlQuery);
			$sentencia->bind_param('i',$idProfesor);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idCurso, $idInstitucion, $idProfesor, $materia, $nivel, $numero, $letra,
        									$nomInstitucion, $nomProfesor, $appProfesor,$materia);
				$indice=0;     
				while($sentencia->fetch())
				{
					$curso = new Curso();
					$curso->initClass($idCurso, $idInstitucion, $idProfesor, $materia, $nivel, $numero, $letra,
													$nomInstitucion, $nomProfesor, $appProfesor);
        			$this->datos[$indice] = $curso;
        			
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
	
	public function editarCurso(Curso $curso)
	{
		$conexion = new MySqlCon();
		$idCurso = $curso->idCurso;
		$idInstitucion = $curso->idInstitucion;
		$idProfesor = $curso->idProfesor;
		$materia = $curso->materia;
		$nivel = $curso->nivel;
		$numero = $curso->numero;
		$letra = $curso->letra;		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='UPDATE curso SET ID_INSTITUCION = ?, ID_PROFESOR = ?, NIVEL = ?, NUMERO = ?, LETRA = ?, MATERIA=? WHERE ID_CURSO = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('iisissi',$idInstitucion, $idProfesor, $nivel, $numero, $letra, $materia, $idCurso);
	      	if($sentencia->execute())
	      	{
	      		if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Curso Modificado";
				}
				else
				{
					$conexion->close();
					return "curso no Modificado";
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
	public function eliminarCurso($idCurso)
	{
		$conexion = new MySqlCon();
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='DELETE FROM curso WHERE ID_CURSO = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('i',$idCurso);
	      	if($sentencia->execute())
	      	{
	      		if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "curso Eliminado";
				}
				else
				{
					$conexion->close();
					return "curso no Eliminado";
				}
			}
			else
			{
				$conexion->close();
	        	return "Error al Eliminar curso";
	        }
        }
    	catch(Exception $e)
    	{
         return false;
         throw new $e("Error al Eliminar curso excepcion");
        }
	}
}
