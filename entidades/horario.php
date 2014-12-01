<?php
class Horario
{
	public $idHorario;
	public $dia;
	public $horaInicio;
	public $horaTermino;
	public $nombreClase;
	public $idCurso;
	public $numeroCurso;
	public $letraCurso;

	function initClass($idHorario, $dia, $horaInicio, $horaTermino, $nombreClase, $idCurso, $numeroCurso, $letraCurso)
	{
		$this->idHorario = $idHorario;
		$this->dia = $dia;
		$this->horaInicio = $horaInicio;
		$this->horaTermino = $horaTermino;
		$this->nombreClase = $nombreClase;
		$this->idCurso = $idCurso;
		$this->numeroCurso = $numeroCurso;
		$this->letraCurso = $letraCurso;
	}
?>