<?php

class Institucion
{
	public $idNota;
	public $idAlumno;
	public $nomAlumno;
	public $appAlumno;
	public $nota;
	public $concepto;

	function initClass($idNota, $idAlumno, $nomAlumno, $appAlumno, $nota, $concepto)
	{
		$this->idNota = $idNota;
		$this->idAlumno = $idAlumno;
		$this->nomAlumno = $nomAlumno;
		$this->appAlumno = $appAlumno;
		$this->nota = $nota;
		$this->concepto = $concepto;
	}
}

?>