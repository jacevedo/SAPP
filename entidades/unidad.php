<?php

class Unidad
{
	public $idUnidad;
	public $idProfesor;
	public $idCurso;
	public $nombre;
	public $cantClases;
	public $fechaInicio;
	public $fechaTermino;
	public $cursos;


	function initClass($idUnidad, $idProfesor, $idCurso, $nombre, $cantClases, $fechaInicio, $fechaTermino)
	{
		$this->idUnidad = $idUnidad;
		$this->idProfesor = $idProfesor;
		$this->idCurso = $idCurso;
		$this->nombre = $nombre;
		$this->cantClases = $cantClases;
		$this->fechaInicio = $fechaInicio;
		$this->fechaTermino = $fechaTermino;
	}
	function initClassCursos($idUnidad, $idProfesor, $idCurso, $nombre, $cantClases, $fechaInicio, $fechaTermino,$cursos)
	{
		$this->idUnidad = $idUnidad;
		$this->idProfesor = $idProfesor;
		$this->idCurso = $idCurso;
		$this->nombre = $nombre;
		$this->cantClases = $cantClases;
		$this->fechaInicio = $fechaInicio;
		$this->fechaTermino = $fechaTermino;
		$this->cursos = $cursos;
	}
}

?>