<?php
require_once '../bdmysql/MySqlCon.php'; 
require_once '../entidades/clases.php';

 class ControladoraClase
{
	public function insertarClase(Clase $clases)
	{
		$conexion = new MySqlCon();
		$idUnidad = $clases->idUnidad;
		$objetivo = $clases->objetivo;
		$duracion = $clases->duracion;
		$contenidoConceptual = $clases->contenidoConceptual;
		$contenidoProcedimental = $clases->contenidoProcedimental;
		$contenidoActitudinal = $clases->contenidoActitudinal;
		$inicio = $clases->inicio;
		$desarrollo = $clases->desarrollo;
		$cierre = $clases->cierre;
		$tipoEvaluacion = $clases->tipoEvaluacion;
		$instrumento = $clases->instrumento;
		$recursoInicio = $clases->recursoInicio;
		$recursoDesarrollo = $clases->recursoDesarrollo;
		$recursoCierre = $clases->recursoCierre;
	
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='INSERT INTO clases (ID_CLASE,ID_UNIDAD,OBJETIVO,DURACION,CONTENIDO_CONCEPTUAL,CONTENIDO_PROCEDIMENTALES,'.
	        				'CONTENIDO_ACTITUDINAL,INICIO_CLASE,DESARROLLO_CLASE,CIERRE_CLASE,TIPO_EVALUACION,INSTRUMENTO_EVALUACION,'.
	        				'RECURSO_INICIO,RECURSO_DESARROLLO,RECURSO_CIERRE) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('isisssssssssss',$idUnidad,$objetivo, $duracion, $contenidoConceptual, $contenidoProcedimental, 
	        						$contenidoActitudinal,$inicio,$desarrollo,$cierre,$tipoEvaluacion,$instrumento,$recursoInicio,
	        						$recursoDesarrollo,$recursoCierre);
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

	
	public function listarClasesIdUnidad($idUnidad)
	{
		$conexion = new MySqlCon();
		$this->datos ='';
		try
		{
			$this->SqlQuery = '';
			$this->SqlQuery = "SELECT * FROM clases WHERE ID_UNIDAD = ?";
		   	$sentencia=$conexion->prepare($this->SqlQuery);
		   	$sentencia->bind_param('i',$idUnidad);
        	if($sentencia->execute())
        	{
        		$sentencia->bind_result($idClase,$idUnidad,$objetivo,$duracion, $contenidoConceptual,$contenidoProcedimental,$contenidoActitudinal,$inicio,$desarrollo,
						$cierre,$tipoEvaluacion, $instrumento,$recursoInicio, $recursoDesarrollo,$recursoCierre);
				$indice=0;     
				while($sentencia->fetch())
				{
					$clases = new Clase();
					$clases->initClass($idClase,$idUnidad,$objetivo,$duracion, $contenidoConceptual,$contenidoProcedimental,$contenidoActitudinal,$inicio,$desarrollo,
						$cierre,$tipoEvaluacion, $instrumento,$recursoInicio, $recursoDesarrollo,$recursoCierre);
        			$this->datos[$indice] = $clases;
        			
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
	
	
	public function editarClase(Clase $clases)
	{
		$conexion = new MySqlCon();
		$idClase = $clases->idClase;
		$idUnidad = $clases->idUnidad;
		$objetivo = $clases->objetivo;
		$duracion = $clases->duracion;
		$contenidoConceptual = $clases->contenidoConceptual;
		$contenidoProcedimental = $clases->contenidoProcedimental;
		$contenidoActitudinal = $clases->contenidoActitudinal;
		$inicio = $clases->inicio;
		$desarrollo = $clases->desarrollo;
		$cierre = $clases->cierre;
		$tipoEvaluacion = $clases->tipoEvaluacion;
		$instrumento = $clases->instrumento;
		$recursoInicio = $clases->recursoInicio;
		$recursoDesarrollo = $clases->recursoDesarrollo;
		$recursoCierre = $clases->recursoCierre;


		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='UPDATE clases SET ID_UNIDAD = ?,OBJETIVO = ?,DURACION = ?,CONTENIDO_CONCEPTUAL = ?,CONTENIDO_PROCEDIMENTALES = ?,'.
	        				'CONTENIDO_ACTITUDINAL = ?,INICIO_CLASE = ?,DESARROLLO_CLASE = ?,CIERRE_CLASE = ?,TIPO_EVALUACION = ?,INSTRUMENTO_EVALUACION = ?,'.
	        				'RECURSO_INICIO = ?,RECURSO_DESARROLLO = ?,RECURSO_CIERRE = ? WHERE ID_CLASE = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('isisssssssssssi',$idUnidad,$objetivo, $duracion, $contenidoConceptual, $contenidoProcedimental, 
	        						$contenidoActitudinal,$inicio,$desarrollo,$cierre,$tipoEvaluacion,$instrumento,$recursoInicio,
	        						$recursoDesarrollo,$recursoCierre,$idClase);
	      	if($sentencia->execute())
	      	{
	      		if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Clase Modificada";
				}
				else
				{
					$conexion->close();
					return "Clase no Modificada";
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
	public function eliminarClase($idClase)
	{
		$conexion = new MySqlCon();
		try 
	   	{ 	 
	        $this->SqlQuery='';
	        $this->SqlQuery='DELETE FROM clases WHERE ID_CLASE = ?';
	        $sentencia=$conexion->prepare($this->SqlQuery);
	        $sentencia->bind_param('i',$idClase);
	      	if($sentencia->execute())
	      	{
	      		if($sentencia->affected_rows)
	      		{
		        	$conexion->close();
					return "Clase Eliminada";
				}
				else
				{
					$conexion->close();
					return "Clase no Eliminada";
				}
			}
			else
			{
				$conexion->close();
	        	return "Error al Eliminar Clase";
	        }
        }
    	catch(Exception $e)
    	{
         return false;
         throw new $e("Error al Clase Unidad excepcion");
        }
	}
}
