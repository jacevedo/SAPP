<?php

class Asistencia
{
	public $idAsistencia;
	public $idAlumno;
	public $nomAlumno;
	public $appAlumno;
	public $fecha;
	public $asistio;

	function initClass($idAsistencia, $idAlumno, $nomAlumno, $appAlumno, $fecha, $asistio)
	{
		$this->idAsistencia = $idAsistencia;
		$this->idAlumno = $idAlumno;
		$this->nomAlumno = $nomAlumno;
		$this->appAlumno = $appAlumno;
		$this->fecha = $fecha;
		$this->asistio = $asistio;
	}
}

?>