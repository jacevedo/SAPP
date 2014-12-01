<?php

class Anotacion
{
	public $idAnotacion;
	public $idAlumno;
	public $nomAlumno;
	public $appAlumno;
	public $fecha;
	public $hora;
	public $causa;
	public $esPositiva;

	function initClass($idAnotacion, $idAlumno, $nomAlumno, $appAlumno, $fecha, $hora, $causa, $esPositiva)
	{
		$this->idAnotacion = $idAnotacion;
		$this->idAlumno = $idAlumno;
		$this->nomAlumno = $nomAlumno;
		$this->appAlumno = $appAlumno;
		$this->fecha = $fecha;
		$this->hora = $hora;
		$this->causa = $causa;
		$this->esPositiva = $esPositiva;
	}
}

?>