<?php
class Pruebas
{
	public $idPrueba;
	public $nombrePrueba;
	public $fecha;
	public $porcentajePrueba;
	public $idCurso;
	public $numeroCurso;
	public $letraCurso;

	function initClass($idPrueba, $nombrePrueba, $fecha, $porcentajePrueba, $idCurso, $numeroCurso, $letraCurso)
	{
		$this->idPrueba = $idPrueba;
		$this->nombrePrueba = $nombrePrueba;
		$this->fecha = $fecha;
		$this->porcentajePrueba = $porcentajePrueba;
		$this->idCurso = $idCurso;
		$this->numeroCurso = $numeroCurso;
		$this->letraCurso = $letraCurso;
	}
}
?>