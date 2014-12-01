<?php
class Session
{
	public $idSession;
	public $idProfesor;
	public $keySession;
	public $fechaHoraIngreso;
	public $fechaHoraCaducidad;

	function initClass($idSession, $idProfesor, $keySession,$fechaHoraIngreso,$fechaHoraCaducidad)
	{
		$this->idSession = $idSession;
		$this->idProfesor = $idProfesor;
		$this->keySession = $keySession;
		$this->fechaHoraIngreso = $fechaHoraIngreso;
		$this->fechaHoraCaducidad = $fechaHoraCaducidad;
	}
}
?>