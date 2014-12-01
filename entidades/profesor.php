<?php

class Profesor
{
	public $idProfesor;
	public $nombre;
	public $appPaterno;
	public $appMaterno;
	public $correo;
	public $pass;
	public $biografia;
	public $telefono;

	function initClass($idProfesor, $nombre, $appPaterno, $appMaterno, $correo, $pass, $biografia, $telefono)
	{
		$this->idProfesor = $idProfesor;
		$this->nombre = $nombre;
		$this->appPaterno = $appPaterno;
		$this->appMaterno = $appMaterno;
		$this->correo = $correo;
		$this->pass = $pass;
		$this->biografia = $biografia;
		$this->telefono = $telefono;
	}
}

?>