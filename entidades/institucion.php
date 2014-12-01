<?php

class Institucion
{
	public $idInstitucion;
	public $nombre;
	public $direccion;
	public $descripcion;
	public $telefono;
	public $correo;
	public $contacto;

	function initClass($idInstitucion, $nombre, $direccion, $descripcion, $telefono, $correo, $contacto)
	{
		$this->idInstitucion = $idInstitucion;
		$this->nombre = $nombre;
		$this->direccion = $direccion;
		$this->descripcion = $descripcion;
		$this->telefono = $telefono;
		$this->correo = $correo;
		$this->contacto = $contacto;
	}
}

?>