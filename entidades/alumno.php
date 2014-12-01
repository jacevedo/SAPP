<?php

class Alumno
{
	public $idAlumno;
	public $idCurso;
	public $nombre;
	public $appPaterno;
	public $appMaterno;
	public $rut;
	public $telefono;
	public $correo;

	function initClass($idAlumno, $idCurso, $nombre, $appPaterno, $appMaterno, $rut, $telefono,$correo)
	{
		$this->idAlumno = $idAlumno;
		$this->idCurso = $idCurso;
		$this->nombre = $nombre;
		$this->appPaterno = $appPaterno;
		$this->appMaterno = $appMaterno;
		$this->rut = $rut;
		$this->telefono = $telefono;
		$this->correo = $correo;
	}
}

?>