<?php

class Clase
{
	public $idClase;
	public $idUnidad;
	public $objetivo;
	public $duracion;
	public $contenidoConceptual;
	public $contenidoProcedimental;
	public $contenidoActitudinal;
	public $inicio;
	public $desarrollo;
	public $cierre;
	public $tipoEvaluacion;
	public $instrumento;
	public $recursoInicio;
	public $recursoDesarrollo;
	public $recursoCierre;



	function initClass($idClase,$idUnidad,$objetivo,$duracion, $contenidoConceptual,$contenidoProcedimental,$contenidoActitudinal,$inicio,$desarrollo,
						$cierre,$tipoEvaluacion, $instrumento,$recursoInicio, $recursoDesarrollo,$recursoCierre)
	{
		$this->idClase = $idClase;
		$this->idUnidad = $idUnidad;
		$this->objetivo = $objetivo;
		$this->duracion = $duracion;
		$this->contenidoConceptual = $contenidoConceptual;
		$this->contenidoProcedimental = $contenidoProcedimental;
		$this->contenidoActitudinal = $contenidoActitudinal;
		$this->inicio = $inicio;
		$this->desarrollo = $desarrollo;
		$this->cierre = $cierre;
		$this->tipoEvaluacion = $tipoEvaluacion;
		$this->instrumento = $instrumento;
		$this->recursoInicio = $recursoInicio;
		$this->recursoDesarrollo = $recursoDesarrollo;
		$this->recursoCierre = $recursoCierre;
	}
}

?>