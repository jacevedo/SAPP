<?php
class Apoderado
{
	public $idApoderado;
	public $nombre;
	public $apellido;
	public $relacionEstudiante;
	public $telefonoApoderado;
	public $correoApoderado;
	public $idAlumno;
	public $nombreAlumno;
	public $apellidoAlumno;
	
	function initClass($idApoderado, $nombre, $apellido, $relacionEstudiante, $telefonoApoderado, $correoApoderado, $idAlumno, $nombreAlumno, $apellidoAlumno)
	{
		$this->idApoderado = $idApoderado;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->relacionEstudiante = $relacionEstudiante;
		$this->telefonoApoderado = $telefonoApoderado;
		$this->correoApoderado = $correoApoderado;
		$this->idAlumno = $idAlumno;
		$this->nombreAlumno = $nombreAlumno;
		$this->apellidoAlumno = $apellidoAlumno;
	}
}
?>